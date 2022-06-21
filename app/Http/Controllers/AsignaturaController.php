<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Profesor;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asignatura.asignatura_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required|regex:/^[a-zA-Z\s]*$/',
        ], [
            'descripcion.required' => 'El campo "descripcion" es requerido.',
            'descripcion.regex' => 'El nombre de la asignatura solo puede conterner letras y espacios.'
        ]);
        $asignatura = new Asignatura($request->input());
        $asignatura->saveOrFail();
        return redirect()->route("home")->with('success', 'Asignatura creada con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        $alumnos = $asignatura->alumnos()->paginate(10);
        $profesor = $asignatura->profesor;
        return view('asignatura.asignatura_show', ['asignatura' => $asignatura, 'alumnos' => $alumnos, 'profesor' => $profesor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        //
    }
}
