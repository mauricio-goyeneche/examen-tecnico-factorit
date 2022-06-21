@extends('layouts.head')

@section('title', 'Mostrar Profesor - FactorIT Proyecto Técnico')

@section('content')
    <div class="row text-center bg-light p-3">
        <p class="fs-2 mb-4 border-bottom border-dark">Profesor/a: {{ $profesor->nombre }} {{ $profesor->apellido }}</p>
        <div class="col-12">
            <p class="fs-5 text-start text-decoration-underline">Asignaturas que actualmente dicta: </p>
            @if (!$asignaturas->isEmpty())
                <ul class="list-group list-group-flash">
                    @foreach ($asignaturas as $asignatura)
                        <li class="list-group-item mb-3">
                            <h4 class="m-1">{{ $asignatura->descripcion }}</h4>
                        </li>
                    @endforeach
                @else
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>No estas dictando en ninguna materia actualmente.</strong>
                    </div>
            @endif

            <div class="mt-2">
                <a class="btn btn-info border border-dark" href="{{ route('home') }}">Volver al listado</a>
            </div>
        </div>
    </div>
@endsection
