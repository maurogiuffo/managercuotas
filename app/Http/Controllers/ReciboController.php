<?php

namespace App\Http\Controllers;

use App\Recibo;
use App\Cliente;
use App\CuotaCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $busqueda = $request->get('busqueda');

        $recibos= Recibo::with('cliente')
            ->orderBy('id','desc')
           // ->nombre($nombre)
            ->paginate();
        return view('recibos.index',compact('recibos','busqueda'));  
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
                    ->get()
                    ->where('saldo', '>', 0)
                    ->where('id_cliente',$idcliente);                    
        
        return view('recibos.create',compact('cliente','cuotas'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
     	$recibo = new Recibo;
        $recibo->id_cliente = $request->id_cliente;
        $recibo->id_user=Auth::user()->id;  
        $recibo->importe=0;  

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
        //
        /*
        try
        {
            Recibo::find($recibo->id)->delete();
        }
        catch(\Illuminate\Database\QueryException $e)
        {
             return back()->with('error','Error al borrar');
        }*/

       // return back()->with('info','Recibo eliminado');
    }
}
