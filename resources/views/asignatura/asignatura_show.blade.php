@extends('layouts.head')

@section('title', 'Mostrar Asignatura - FactorIT Proyecto Técnico')

@section('content')
    <div class="row text-center bg-light p-3">
        <p class="fs-2 mb-4 border-bottom border-dark">Asignatura: {{ $asignatura->descripcion }}.</p>
        <div class="col-12">
            @if ($profesor)
                <p class="fs-5 text-start">Profesor/a: <strong class="fs-4">{{ $profesor->nombre }}
                        {{ $profesor->apellido }}. </strong> </p>
            @else
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Ningun profesor dicta esta asignatura actualmente.</strong>
                </div>
            @endif
            @if (!$alumnos->isEmpty())
                <p class="fs-5 text-start text-decoration-underline">Listado de alumnos inscriptos: </p>
                <table
                    class="table table-striped table-hover table-bordered text-center bg-light border border-1 border-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr>
                                <th class="align-middle w-25">{{ $alumno->id }}</th>
                                <td class="align-middle w-25">{{ $alumno->nombre }}</td>
                                <td class="align-middle w-25">{{ $alumno->apellido }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $alumnos->links() }}
            @else
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Ningún alumno se encuentra inscripto a esta asignatua actualmente.</strong>
                </div>
            @endif

            <div class="mt-2">
                <a class="btn btn-info border border-dark" href="{{ route('home') }}">Volver al listado</a>
            </div>
        </div>
    </div>
@endsection
