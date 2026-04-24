@extends('tablar::page')

@section('title', 'Editar Idea #' . $ideasEstudiante->id)

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <a href="{{ route('formatos.ideas-estudiante.show', $ideasEstudiante) }}" class="btn btn-ghost-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Volver
                </a>
            </div>
            <div class="col">
                <h2 class="page-title">Editar Idea #{{ $ideasEstudiante->id }}</h2>
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
            <form action="{{ route('formatos.ideas-estudiante.update', $ideasEstudiante) }}" method="POST">
                @csrf
                @method('PUT')
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

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label required">Título de la Idea</label>
                            <input type="text"
                                   name="titulo_idea"
                                   class="form-control @error('titulo_idea') is-invalid @enderror"
                                   value="{{ old('titulo_idea', $ideasEstudiante->titulo_idea) }}"
                                   required>
                            @error('titulo_idea')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label required">Descripción</label>
                            <textarea name="descripcion"
                                      rows="4"
                                      class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $ideasEstudiante->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label required">Justificación</label>
                            <textarea name="justificacion"
                                      rows="4"
                                      class="form-control @error('justificacion') is-invalid @enderror">{{ old('justificacion', $ideasEstudiante->justificacion) }}</textarea>
                            @error('justificacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label required">Objetivos</label>
                            <textarea name="objetivos"
                                      rows="4"
                                      class="form-control @error('objetivos') is-invalid @enderror">{{ old('objetivos', $ideasEstudiante->objetivos) }}</textarea>
                            @error('objetivos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label required">Fecha de Presentación</label>
                            <input type="date"
                                   name="fecha_presentacion"
                                   class="form-control @error('fecha_presentacion') is-invalid @enderror"
                                   value="{{ old('fecha_presentacion', $ideasEstudiante->fecha_presentacion?->format('Y-m-d')) }}"
                                   required>
                            @error('fecha_presentacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- TODO: Agregar campos adicionales del formato físico --}}
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('formatos.ideas-estudiante.show', $ideasEstudiante) }}" class="btn btn-ghost-secondary me-2">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="ti ti-device-floppy me-1"></i> Actualizar Idea
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
