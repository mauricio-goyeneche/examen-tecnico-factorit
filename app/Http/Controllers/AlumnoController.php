<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::orderBy('id', 'desc')->paginate(5);
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturas = Asignatura::all();
        return view("alumno.alumno_create", compact("asignaturas"));
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
            'nombre' => 'required|regex:/^[a-zA-Z\s]*$/',
            'apellido' => 'required|regex:/^[a-zA-Z\s]*$/',
        ], [
            'nombre.required' => 'El campo "nombre" es requerido.',
            'nombre.regex' => 'El campo "nombre" solo puede conterner letras y espacios.',
            'apellido.required' => 'El campo "apellido" es requerido.',
            'apellido.regex' => 'El campo "apellido" solo puede conterer letras y espacios.',
        ]);
        $alumno = new Alumno($request->input());
        $alumno->saveOrFail();

        $asignaturasInput = $request->input('asignaturas');
        if (!is_null($asignaturasInput)) {
            foreach ($asignaturasInput as $key => $value) {
                $asignatura = Asignatura::find($value);
                $alumno->asignaturas()->attach($asignatura);
            }
        }
        return redirect()->route("home")->with('success', 'Alumno creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view("alumno.alumno_show", ['alumno' => $alumno, 'asignaturas' => $alumno->asignaturas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
