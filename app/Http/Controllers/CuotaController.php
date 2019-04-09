<?php

namespace App\Http\Controllers;

use App\Cuota;
use Illuminate\Http\Request;

class CuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $cuotas= Cuota::orderBy('id')
            ->paginate();
        
        return view('cuotas.index',compact('cuotas');  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('cuotas.create',compact('cuotas');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuota = Cuota::create($request->all());

        $cuota->save();

        return redirect()->route('cuotas.index',$cuota->id)
            ->with('info','Cuota creada con éxito');    
        }
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

        return view('cuotas.show',compact('cuota'));        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuota  $cuota
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuota $cuota)
    {
        $cuota= Cliente::find($cuota->id);
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
    }
}
