<?php

namespace App\Http\Controllers;

use App\Recibo;
use Illuminate\Http\Request;

class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $busqueda = $request->get('busqueda');

        //$nombre = $request->get('nombre');

        $recibos= Recibo::orderBy('id','desc')
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
    	$idcliente = $request->get('idcliente');
        $cliente= Cliente::find($idcliente);
        $cuotas= Cuota::orderBy('anio',desc);

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
     	$recibo = Recibo::create($request->all());

        $recibo->save();

        return redirect()->route('recibos.index',$recibo->id)
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

        return view('recibos.show',compact('recibo'));       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function edit(Recibo $recibo)
    {
        $recibo= Recibo::find($recibo->id);
        //$this->authorize('pass',$recibo);


        //$categories = Category::orderBy('name','ASC')->get();
        return view('recibos.edit',compact('recibo'));    
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
        $recibo = Recibo::find($recibo->id);
        $recibo->fill($request->all());
        $recibo->save();

         return redirect()->route('recibos.index',$recibo->id)
            ->with('info','Recibo creado con éxito');
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
        try
        {
            Recibo::find($recibo->id)->delete();
        }
        catch(\Illuminate\Database\QueryException $e)
        {
             return back()->with('error','Error al borrar');
        }

        return back()->with('info','Recibo eliminado');
    }
}
