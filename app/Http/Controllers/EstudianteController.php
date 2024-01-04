<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estudiante;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Estudiante::all();
        
        return view('incioNuevo',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function create(){
        return view('guardarAPI');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiante = new Estudiante();
        $estudiante->est_cedula = $request->est_cedula;
        $estudiante->est_nombre = $request->est_nombre;
        $estudiante->est_apellido = $request->est_cedula;
        $estudiante->est_direccion = $request->est_direccion;
        $estudiante->est_telefono = $request->est_telefono;

        $estudiante->save();
        return redirect()->route('pag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $estudianteid)
    {
        $estudiante = Estudiante::findOrFail($estudianteid);
        $estudiante->est_cedula = $request->est_cedula;
        $estudiante->est_nombre = $request->est_nombre;
        $estudiante->est_apellido = $request->est_apellido;
        $estudiante->est_direccion = $request->est_direccion;
        $estudiante->est_telefono = $request->est_telefono;

        $estudiante->save();

        return redirect()->route('pag.index');
    }

        public function createupapi($cedula,$nombre,$apellido,$telefono,$direccion){
        return view('editarApi',compact('cedula','nombre','apellido','telefono','direccion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($estudianteid)
    {
      $estudiante = Estudiante::destroy($estudianteid);
       return redirect()->route('pag.index');
    }
}
