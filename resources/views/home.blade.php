@extends('layouts.head')

@section('title', 'Home Page - FactorIT Proyecto Técnico')

@section('content')

    @include('show_message')

    <table class="table table-striped table-hover table-bordered text-center bg-light border border-1 border-dark">
        <thead>
            <tr>
                <th colspan="4" class="fs-4">Listado de Alumnos</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @if (!$alumnos->isEmpty())
                @foreach ($alumnos as $alumno)
                    <tr>
                        <th class="align-middle w-25">{{ $alumno->id }}</th>
                        <td class="align-middle w-25">{{ $alumno->nombre }}</td>
                        <td class="align-middle w-25">{{ $alumno->apellido }}</td>
                        <td class="align-middle w-25"><a class="btn btn-info" href="{{ route('alumnos.show', $alumno) }}">Ver
                                más</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="align-middle w-100">No hay alumnos cargados actualmente.</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $alumnos->appends(['asignaturas' => $asignaturas->currentPage(), 'profesores' => $profesores->currentPage()])->links() }}


    <table class="table table-striped table-hover table-bordered text-center bg-light border border-1 border-dark">
        <thead>
            <tr>
                <th colspan="3" class="fs-4">Listado de Asignaturas</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @if (!$asignaturas->isEmpty())
                @foreach ($asignaturas as $asignatura)
                    <tr>
                        <th class="align-middle w-25">{{ $asignatura->id }}</th>
                        <td class="align-middle w-50">{{ $asignatura->descripcion }}</td>
                        <td class="align-middle w-25"><a class="btn btn-info"
                                href="{{ route('asignatura.show', $asignatura) }}">Ver más</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="align-middle w-100">No hay asignaturas cargadas actualmente.</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $asignaturas->appends(['alumnos' => $alumnos->currentPage(), 'profesores' => $profesores->currentPage()])->links() }}

    <table class="table table-striped table-hover table-bordered text-center bg-light border border-1 border-dark">
        <thead>
            <tr>
                <th colspan="4" class="fs-4">Listado de Profesores</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @if (!$profesores->isEmpty())
                @foreach ($profesores as $profesor)
                    <tr>
                        <th class="align-middle w-25">{{ $profesor->id }}</th>
                        <td class="align-middle w-25">{{ $profesor->nombre }}</td>
                        <td class="align-middle w-25">{{ $profesor->apellido }}</td>
                        <td class="align-middle w-25"><a class="btn btn-info"
                                href="{{ route('profesor.show', $profesor) }}">Ver más</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="align-middle w-100">No hay profesores cargados actualmente.</td>
                </tr>
            @endif

        </tbody>
    </table>
    {{ $profesores->appends(['alumnos' => $alumnos->currentPage(), 'asignaturas' => $asignaturas->currentPage()])->links() }}

    <div class="d-flex justify-content-center">
        <a class="btn btn-info border border-1 border-dark m-2" href="{{ route('alumnos.create') }}">Crear Alumno</a>
        <a class="btn btn-info border border-1 border-dark m-2" href="{{ route('asignatura.create') }}">Crear
            Asignatura</a>
        <a class="btn btn-info border border-1 border-dark m-2" href="{{ route('profesor.create') }}">Crear
            Profesor</a>
    </div>

@endsection
