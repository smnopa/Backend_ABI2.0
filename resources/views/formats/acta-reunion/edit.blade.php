@extends('tablar::page')

@section('title', 'Editar Acta de Reunión #' . $actaReunion->id)

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <a href="{{ route('formatos.acta-reunion.show', $actaReunion) }}" class="btn btn-ghost-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Volver
                </a>
            </div>
            <div class="col">
                <h2 class="page-title">Editar Acta #{{ $actaReunion->id }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Datos del Acta</h3>
            </div>
            <form action="{{ route('formatos.acta-reunion.update', $actaReunion) }}" method="POST">
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
                        <div class="col-md-6">
                            <label class="form-label required">Fecha de Reunión</label>
                            <input type="date"
                                   name="fecha_reunion"
                                   class="form-control @error('fecha_reunion') is-invalid @enderror"
                                   value="{{ old('fecha_reunion', $actaReunion->fecha_reunion?->format('Y-m-d')) }}"
                                   required>
                            @error('fecha_reunion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Lugar</label>
                            <input type="text"
                                   name="lugar"
                                   class="form-control @error('lugar') is-invalid @enderror"
                                   value="{{ old('lugar', $actaReunion->lugar) }}">
                            @error('lugar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label required">Asistentes</label>
                            <textarea name="asistentes"
                                      rows="3"
                                      class="form-control @error('asistentes') is-invalid @enderror">{{ old('asistentes', $actaReunion->asistentes) }}</textarea>
                            @error('asistentes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label required">Temas Tratados</label>
                            <textarea name="temas_tratados"
                                      rows="4"
                                      class="form-control @error('temas_tratados') is-invalid @enderror">{{ old('temas_tratados', $actaReunion->temas_tratados) }}</textarea>
                            @error('temas_tratados')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label required">Acuerdos</label>
                            <textarea name="acuerdos"
                                      rows="4"
                                      class="form-control @error('acuerdos') is-invalid @enderror">{{ old('acuerdos', $actaReunion->acuerdos) }}</textarea>
                            @error('acuerdos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Compromisos</label>
                            <textarea name="compromisos"
                                      rows="3"
                                      class="form-control @error('compromisos') is-invalid @enderror">{{ old('compromisos', $actaReunion->compromisos) }}</textarea>
                            @error('compromisos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Próxima Reunión</label>
                            <input type="date"
                                   name="proxima_reunion"
                                   class="form-control @error('proxima_reunion') is-invalid @enderror"
                                   value="{{ old('proxima_reunion', $actaReunion->proxima_reunion?->format('Y-m-d')) }}">
                            @error('proxima_reunion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- TODO: Agregar campos adicionales del formato físico --}}
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('formatos.acta-reunion.show', $actaReunion) }}" class="btn btn-ghost-secondary me-2">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-device-floppy me-1"></i> Actualizar Acta
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
