<?php

namespace App\Http\Controllers;

use App\Cuota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CuotaController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','role:ADMIN']);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $busqueda = $request->get('busqueda');

        $cuotas= Cuota::orderBy('anio')
            ->paginate();
        
        return view('cuotas.index',compact('cuotas','busqueda'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('cuotas.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(
            $request->importe <=0 || is_nan($request->importe) || 
            $request->importe2 <=0 || is_nan($request->importe2) || 
            $request->importe3 <=0 || is_nan($request->importe3) )
        {
             return redirect()->route('cuotas.create')
                        ->with('info','Importe debe ser numero mayor que 0');    
        }

        DB::beginTransaction();
        $cuota = Cuota::create($request->all());

        $cuota->save();

        $sql = "insert into cuotas_clientes (id_cliente,id_cuota,id_recibo,importe,saldo,created_at,updated_at)(select id,$cuota->id,0,$cuota->importe,$cuota->importe,now(),now() from clientes where tipo_cuota='TIPO1')";
        DB::statement($sql);

        $sql = "insert into cuotas_clientes (id_cliente,id_cuota,id_recibo,importe,saldo,created_at,updated_at)(select id,$cuota->id,0,$cuota->importe2,$cuota->importe2,now(),now() from clientes where tipo_cuota='TIPO2')";
        DB::statement($sql);

        $sql = "insert into cuotas_clientes (id_cliente,id_cuota,id_recibo,importe,saldo,created_at,updated_at)(select id,$cuota->id,0,$cuota->importe3,$cuota->importe3,now(),now() from clientes where tipo_cuota='TIPO3')";
        DB::statement($sql);


        DB::commit();

        return redirect()->route('cuotas.index',$cuota->id)
            ->with('info','Cuota creada con éxito');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function show(Cuota $cuota)
    {
        $cuota= Cuota::find($cuota->id);

        return view('cuotas.show',compact('cuota'));       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuota $cuota)
    {
        $cuota= Cuota::find($cuota->id);
        //$this->authorize('pass',$cuota);


        //$categories = Category::orderBy('name','ASC')->get();
        return view('cuotas.edit',compact('cuota'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuota $cuota)
    {
        $cuota = Cuota::find($cuota->id);
        $cuota->fill($request->all());
        $cuota->save();

        DB::beginTransaction();

        //$sql = "insert into cuotas_clientes (id_cliente,id_cuota,id_recibo,importe,saldo,created_at,updated_at)(select id,$cuota->id,0,$cuota->importe,$cuota->importe,now(),now() from clientes)";
        //DB::statement($sql);

        $sql = "update cuotas_clientes set importe=$cuota->importe,saldo=$cuota->importe, updated_at = now() where saldo=importe and id_cuota=$cuota->id ";
        DB::statement($sql);

        DB::commit();

         return redirect()->route('cuotas.index',$cuota->id)
            ->with('info','Cuota actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuota $cuota)
    {
        //
        try
        {
            Cuota::find($cuota->id)->delete();
        }
        catch(\Illuminate\Database\QueryException $e)
        {
             return back()->with('error','Error al borrar');
        }

        return back()->with('info','Cuota eliminado');
    }
}
