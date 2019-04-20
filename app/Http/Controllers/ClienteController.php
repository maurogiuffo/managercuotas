<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $nombre = $request->get('nombre');

        $clientes= Cliente::orderBy('nombre')
            ->nombre($nombre)
            ->paginate();
        
        return view('clientes.index',compact('clientes','nombre'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$cat = Cliente::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('clientes.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());

        $cliente->save();

        return redirect()->route('clientes.edit',$cliente->id)
            ->with('info','Cliente creado con éxito');    
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $cliente= Cliente::find($cliente->id);

        return view('clientes.show',compact('cliente'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $cliente= Cliente::find($cliente->id);
        //$this->authorize('pass',$cliente);


        //$categories = Category::orderBy('name','ASC')->get();
        return view('clientes.edit',compact('cliente'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {

        $cliente = Cliente::find($cliente->id);
        $cliente->fill($request->all());
        $cliente->save();

         return redirect()->route('clientes.edit',$cliente->id)
            ->with('info','Cliente actualizado con éxito');    
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        try
        {
            Cliente::find($cliente->id)->delete();
        }
        catch(\Illuminate\Database\QueryException $e)
        {
             return back()->with('error','Error al borrar');
        }

        return back()->with('info','Cliente eliminado');
    }

   

}
