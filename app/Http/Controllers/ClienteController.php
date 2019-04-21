<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {

        $nombre = $request->get('nombre');

        $clientes= Cliente::orderBy('nombre')
            ->nombre($nombre)
            ->paginate();
        
        return view('clientes.index',compact('clientes','nombre'));    
    }

  
    public function create()
    {
        //$cat = Cliente::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('clientes.create');    
    }

  
    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());

        $cliente->save();

        return redirect()->route('clientes.edit',$cliente->id)
            ->with('info','Cliente creado con éxito');    
        }

   
    public function show(Cliente $cliente)
    {
        $cliente= Cliente::find($cliente->id);

        return view('clientes.show',compact('cliente'));    
    }

   
    public function edit(Cliente $cliente)
    {
        $cliente= Cliente::find($cliente->id);
        //$this->authorize('pass',$cliente);

        //$categories = Category::orderBy('name','ASC')->get();
        return view('clientes.edit',compact('cliente'));    
    }

    public function update(Request $request, Cliente $cliente)
    {

        $cliente = Cliente::find($cliente->id);
        $cliente->fill($request->all());
        $cliente->save();

         return redirect()->route('clientes.edit',$cliente->id)
            ->with('info','Cliente actualizado con éxito');    
        }

 
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
