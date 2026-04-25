@extends('tablar::page')

@section('title', 'Registrar Idea de Proyecto')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <a href="{{ route('formatos.ideas-estudiante.index') }}" class="btn btn-ghost-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Volver
                </a>
            </div>
            <div class="col">
                <h2 class="page-title">Registrar Idea de Proyecto</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Datos de la Idea</h3>
            </div>

            <form action="{{ route('formatos.ideas-estudiante.store') }}" method="POST">
                @csrf

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- 🔥 IMPORTANTE: ahora usamos el form reutilizable --}}
                    @include('formats.ideas-estudiante.form', ['idea' => null])

                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('formatos.ideas-estudiante.index') }}" class="btn btn-ghost-secondary me-2">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="ti ti-device-floppy me-1"></i> Guardar Idea
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection