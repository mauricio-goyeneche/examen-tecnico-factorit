<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Profesor;

class HomeController extends Controller
{
    public function getAlumnos()
    {
        $alumnos = Alumno::orderBy('id', 'asc')->paginate(5, ['*'], 'alumnos');
        return $alumnos;
    }

    public function getAsignaturas()
    {
        $asignaturas = Asignatura::orderBy('id', 'asc')->paginate(5, ['*'], 'asignaturas');
        return $asignaturas;
    }

    public function getProfesores()
    {
        $profesores = Profesor::orderBy('id', 'asc')->paginate(5, ['*'], 'profesores');
        return $profesores;
    }

    public function getAllData()
    {
        return view('home')
            ->with('alumnos', $this->getAlumnos())
            ->with('asignaturas', $this->getAsignaturas())
            ->with('profesores', $this->getProfesores());
    }
}
