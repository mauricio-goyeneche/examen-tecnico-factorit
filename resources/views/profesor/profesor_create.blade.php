@extends('layouts.head')

@section('title', 'Crear Profesor - FactorIT Proyecto Técnico')

@section('content')
    <div class="row bg-light p-3">
        <p class="fs-2 text-center mb-4 border-bottom border-dark">Crear Profesor</p>

        @if ($errors->any())
            <div class="alert alert-danger text-center m-0">
                <ul class="list-unstyled m-0">
                    @foreach ($errors->all() as $error)
                        <li>
                            <strong>{{ $error }}</strong>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-12">
            <form action="{{ route('profesor.store') }}" method="post" class="col-6 m-auto">
                @csrf
                <div class="form-group d-flex align-items-center m-2">
                    <label class="label me-3">Nombre: </label>
                    <input required autocomplete="off" name="nombre" class="form-control" type="text"
                        placeholder="Nombre">
                </div>
                <div class="form-group d-flex align-items-center m-2">
                    <label class="label me-3">Apellido: </label>
                    <input required autocomplete="off" name="apellido" class="form-control" type="text"
                        placeholder="Apellido">
                </div>
                <div class="mt-3">
                    <h4>Lista de asignaturas: </h4>
                    @if (!$asignaturas->isEmpty())
                        @foreach ($asignaturas as $asignatura)
                            <div class="form-check">
                                <label class="form-check-label text-start" for="{{ $asignatura->descripcion }}">
                                    {{ $asignatura->descripcion }}
                                </label>
                                <input class="form-check-input" type="checkbox" name="asignaturas[]"
                                    id="{{ $asignatura->descripcion }}" value="{{ $asignatura->id }}">
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                            No hay asignaturas disponibles para seleccionar.
                        </div>
                    @endif
                </div>

                <div class="mt-2 text-center">
                    <button class="btn btn-info" type="submit">Guardar profesor</button>
                    <a class="btn btn-info" href="{{ route('home') }}">Volver al listado</a>
                </div>
            </form>
        </div>
    </div>
@endsection
