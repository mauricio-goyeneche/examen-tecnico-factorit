@extends('layouts.head')

@section('title', 'Crear Asignatura - FactorIT Proyecto Técnico')

@section('content')
    <div class="row bg-light p-3">
        <p class="fs-2 text-center mb-4 border-bottom border-dark">Crear Asignatura</p>

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
            <form action="{{ route('asignatura.store') }}" method="post" class="col-6 m-auto">
                @csrf
                <div class="form-group d-flex align-items-center m-2">
                    <label class="label me-3">Descripción: </label>
                    <input required autocomplete="off" name="descripcion" class="form-control" type="text"
                        placeholder="Nombre">
                </div>

                <div class="mt-2 text-center">
                    <button class="btn btn-info" type="submit">Guardar asignatura</button>
                    <a class="btn btn-info" href="{{ route('home') }}">Volver al listado</a>
                </div>
            </form>
        </div>
    </div>
@endsection
