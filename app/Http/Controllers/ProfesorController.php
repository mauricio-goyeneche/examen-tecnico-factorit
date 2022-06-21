<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class ProfesorController extends Controller
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
        $asignaturas = Asignatura::where('profesor_id', null)->get();
        return view('profesor.profesor_create', compact('asignaturas'));
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
            'nombre' => "required|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
            'apellido' => "required|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
        ], [
            'nombre.required' => 'El campo "nombre" es requerido.',
            'nombre.regex' => 'El campo "nombre" solo puede conterner letras y espacios.',
            'apellido.required' => 'El campo "apellido" es requerido.',
            'apellido.regex' => 'El campo "apellido" solo puede conterer letras y espacios.',
        ]);
        $profesor = new Profesor($request->input());
        $profesor->nombre = ucwords($profesor->nombre);
        $profesor->apellido = ucwords($profesor->apellido);
        $profesor->saveOrFail();

        $asiganturaInput = $request->input('asignaturas');
        if (!is_null($asiganturaInput)) {
            foreach ($asiganturaInput as $key => $value) {
                $asignatura = Asignatura::find($value);
                $profesor->asignaturas()->save($asignatura);
            }
        }

        return redirect()->route("home")->with('success', 'Profesor creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        $asignaturas = $profesor->asignaturas;
        return view('profesor.profesor_show', ['profesor' => $profesor, 'asignaturas' => $asignaturas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesor)
    {
        //
    }
}
