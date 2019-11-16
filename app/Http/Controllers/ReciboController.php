<?php

namespace App\Http\Controllers;

use App\Recibo;
use App\Cliente;
use App\CuotaCliente;
use App\Cuota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use PDF;

class ReciboController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // eliminamos validaciones innecesarias y ponemos la fecha de hoy por defecto en ambas variables
        $fechaInicial = date('Y-m-d');
        $fechaFinal = date('Y-m-d');

        if(! is_null($request->fechaInicial) && ! empty($request->fechaInicial) && ! is_null($request->fechaFinal) || ! empty($request->fechaFinal))
        {
            $fechaInicial = $request->fechaInicial;
            $fechaFinal = $request->fechaFinal;
        }

        $forma_pago = $request->get('forma_pago');

        if(Auth::user()->isAdmin())
        {
            $id_usuario = $request->get('id_usuario');
        }
        else
        {
            $id_usuario = Auth::user()->id;
        }

        

        $recibos= Recibo::with('cliente')->with('user')
            ->orderBy('id','desc')
            ->whereBetween('created_at', [$fechaInicial, $fechaFinal.' 23:59:59']);

        $total= Recibo::
            whereBetween('created_at', [$fechaInicial, $fechaFinal.' 23:59:59']);

        if($forma_pago != 'TODOS')
        {
            $recibos = $recibos->where('forma_pago','like',"%$forma_pago%");
            $total = $total->where('forma_pago','like',"%$forma_pago%");
        }

        if($id_usuario != '')
        {
            $recibos = $recibos->where('id_user','=',$id_usuario);
            $total = $total->where('id_user','=',$id_usuario);
        }

        $recibos = $recibos->paginate(1000);
        $total = $total->sum('importe');

        return view('recibos.index',compact('recibos','fechaInicial','fechaFinal','forma_pago','id_usuario','total'));  
    }


   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	$idcliente = $request->get('id');
        $cliente= Cliente::find($idcliente);

        $cuotas= CuotaCliente::with('cuota')
                    ->where('saldo', '>', 0)
                    ->where('id_cliente',$idcliente)
                    ->orderBy('created_at','desc')
                    ->get();

        $cuotasacrear = Cuota::orderBy('anio','desc')->orderBy('mes','desc')->get();                        

        return view('recibos.create',compact('cliente','cuotas','cuotasacrear'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->generarnueva =="0")
        {
            if($request->id_cuota == null)
                return back()->with('error','Error al grabar recibo.');
                
            DB::beginTransaction();
            $recibo = new Recibo;
            $recibo->id_cliente = $request->id_cliente;
            $recibo->id_user=Auth::user()->id;  
            $recibo->importe=0;  
            $recibo->forma_pago=$request->forma_pago;  

            $recibo->save();

            $importe=0;

            foreach($request->id_cuota as $id) 
            {
                $cuota=CuotaCliente::find($id);
                $cuota->id_recibo = $recibo->id;
                $cuota->saldo=0;
                $importe += $cuota->importe;

                $cuota->save();
            }

            $recibo->importe = $importe;
            
            $recibo->save();

            DB::commit();
       

            return redirect()->route('recibos.show',$recibo)
                ->with('info','Recibo creado con éxito');    
        }
        else
        {

            if($request->id_cuota !="-1")
            {

                try
                {
                    $cliente=Cliente::find($request->id_cliente);
                    $cuota=Cuota::find( $request->id_cuota);
                    $cuotacliente = new CuotaCliente;
                    $cuotacliente->id_cliente = $request->id_cliente;
                    $cuotacliente->id_cuota = $request->id_cuota;
                    $cuotacliente->id_recibo = 0;
                   

                    if($cliente->tipo_cuota == 'TIPO1')
                        $cuotacliente->importe = $cuota->importe;
                    if($cliente->tipo_cuota == 'TIPO2')
                        $cuotacliente->importe = $cuota->importe2;
                    if($cliente->tipo_cuota == 'TIPO3')
                        $cuotacliente->importe = $cuota->importe3;
                     if($cliente->tipo_cuota == 'TIPO4')
                        $cuotacliente->importe = $cuota->importe4;
                     if($cliente->tipo_cuota == 'TIPO5')
                        $cuotacliente->importe = $cuota->importe5;
                     if($cliente->tipo_cuota == 'TIPO6')
                        $cuotacliente->importe = $cuota->importe6;

                     $cuotacliente->saldo = $cuotacliente->importe;

                    $cuotacliente->save();
                }
                catch(\Illuminate\Database\QueryException $e)
                {
                     return back()->with('error','Error al generar Cuota. Ya existe.');
                }

               
            }

            return redirect()->route('recibos.create',["id=$request->id_cliente"]);

        }

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function show(Recibo $recibo)
    {
        $recibo= Recibo::find($recibo->id);

        $cliente= Cliente::find($recibo->id_cliente);

        $cuotas= CuotaCliente::with('cuota')
                    ->get()
                    ->where('id_recibo',$recibo->id);                    
                    
        return view('recibos.show',compact('recibo','cliente','cuotas'));       
        //return view('recibos.pdf_view',compact('recibo','cliente','cuotas'));       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function edit(Recibo $recibo)
    {
        //$recibo= Recibo::find($recibo->id);
        //$this->authorize('pass',$recibo);


        //$categories = Category::orderBy('name','ASC')->get();
       // return view('recibos.edit',compact('recibo'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recibo $recibo)
    {
        /*
        $recibo = Recibo::find($recibo->id);
        $recibo->fill($request->all());
        $recibo->save();

         return redirect()->route('recibos.index',$recibo->id)
            ->with('info','Recibo creado con éxito');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recibo $recibo)
    {
       
        try
        {
            DB::beginTransaction();
            DB::statement("update cuotas_clientes set id_recibo=0,saldo=importe where id_recibo=".$recibo->id);
            Recibo::find($recibo->id)->delete();
            DB::commit();
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            DB::rollBack();
             return back()->with('error','Error al borrar');
        }

        return back()->with('info','Recibo eliminado');
    }

    public function imprimir_recibo(Request $recibo)
    {
        /*
        $data = [ 'title' => 'Recibo Nº '.$recibo->id, 
                  'heading' => 'Recibo Nº '.$recibo->id,          
                  'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'        
            ];
        */

        $recibo= Recibo::find($recibo->id);

        $cliente= Cliente::find($recibo->id_cliente);

        $cuotas= CuotaCliente::with('cuota')
                    ->get()
                    ->where('id_recibo',$recibo->id);                    

        $pdf = PDF::loadView('recibos.pdf_view_recibo', compact('recibo','cliente','cuotas'));  
        return $pdf
            ->download('recibo'.$recibo->id.'.pdf');
    }


    public function imprimir_lista(Request $request)
    {
         // eliminamos validaciones innecesarias y ponemos la fecha de hoy por defecto en ambas variables
        $fechaInicial = date('Y-m-d');
        $fechaFinal = date('Y-m-d');

        if(! is_null($request->fechaInicial_impresion) && ! empty($request->fechaInicial_impresion) && ! is_null($request->fechaFinal_impresion) || ! empty($request->fechaFinal_impresion))
        {
            $fechaInicial = $request->fechaInicial_impresion;
            $fechaFinal = $request->fechaFinal_impresion;
        }

       
        $forma_pago = $request->get('forma_pago_impresion');

        if(Auth::user()->isAdmin())
        {
            $id_usuario = $request->get('id_usuario_impresion');
        }
        else
        {
            $id_usuario = Auth::user()->id;
        }

        

        $recibos= Recibo::with('cliente')
            ->orderBy('id','desc')
            ->whereBetween('created_at', [$fechaInicial, $fechaFinal.' 23:59:59']);

        $total= Recibo::
            whereBetween('created_at', [$fechaInicial, $fechaFinal.' 23:59:59']);

        if($forma_pago != 'TODOS')
        {
            $recibos = $recibos->where('forma_pago','like',"%$forma_pago%");
            $total = $total->where('forma_pago','like',"%$forma_pago%");
        }

        if($id_usuario != '')
        {
            $recibos = $recibos->where('id_user','=',$id_usuario);
            $total = $total->where('id_user','=',$id_usuario);
        }

        $recibos = $recibos->paginate(1000);
        $total = $total->sum('importe');

        $pdf = PDF::loadView('recibos.pdf_view_lista', compact('recibos','fechaInicial','fechaFinal','forma_pago','total'));  
        return $pdf
            ->download('lista_recibos.pdf');
    }




    public function createcuota($idcliente)
    {
        //$idcliente = $request->get('id');
        $cliente= Cliente::find($idcliente);
        

        $cuotasacrear = Cuota::orderBy('anio','desc')->orderBy('mes','desc')->get();

        
        return $cuotasacrear;
        return view('recibos.createcuota',compact('cliente','cuotas','cuotasacrear'));  
    }
}
