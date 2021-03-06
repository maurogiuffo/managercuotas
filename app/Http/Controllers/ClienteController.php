<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Recibo;
use App\CuotaCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $nombre = $request->get('nombre');

        $clientes= Cliente::
            orderBy('apellido')
            ->orderBy('nombre')
            ->nombre($nombre)
            ->paginate();
        
        return view('clientes.index',compact('clientes','nombre'));    
    }

  
    public function create()
    {
        //$cat = Cliente::orderBy('nombre','ASC')->pluck('nombre','id');

        if(Auth::user()->isAdmin())
            return view('clientes.create');
        else
            return back()->with('error','No tiene permiso para crear clientes.');
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

        $sql ="";
       

        $cliente = Cliente::find($cliente->id);

        if($request->tipo_cuota != $cliente->tipo_cuota)
        {
            $id=$cliente->id;

            $numero ="";

            if($request->tipo_cuota =="TIPO2")
            {
                $numero ="2";
            }

            if($request->tipo_cuota =="TIPO3")
            {
                $numero ="3";
            }

            if($request->tipo_cuota =="TIPO4")
            {
                $numero ="4";
            }

            if($request->tipo_cuota =="TIPO5")
            {
                $numero ="5";
            }

            if($request->tipo_cuota =="TIPO6")
            {
                $numero ="6";
            }

           $sql = "update cuotas_clientes inner join cuotas on cuotas_clientes.id_cuota=cuotas.id set cuotas_clientes.importe= cuotas.importe$numero, cuotas_clientes.saldo = cuotas.importe$numero where cuotas_clientes.id_cliente = $id  and cuotas_clientes.saldo = cuotas_clientes.importe and cuotas_clientes.saldo > 0";

        }


        $cliente->fill($request->all());
        $cliente->save();

        if($sql !="")
        {
            DB::beginTransaction();
            DB::statement($sql);

            DB::commit();
        }

         return redirect()->route('clientes.edit',$cliente->id)
            ->with('info','Cliente actualizado con éxito');    
        }

 
    public function destroy(Cliente $cliente)
    {
        try
        {

            if(Recibo::where('id_cliente','=',$cliente->id)
                ->get()
                ->isNotEmpty())
            {
                return back()->with('info','Cliente con recibos. No se puede eliminar.');
            }

            CuotaCliente::where('id_cliente','=',$cliente->id)->delete();
            Cliente::find($cliente->id)->delete();
        }
        catch(\Illuminate\Database\QueryException $e)
        {
             return back()->with('error','Error al borrar');
        }

        return back()->with('info','Cliente eliminado');
    }

   

}
