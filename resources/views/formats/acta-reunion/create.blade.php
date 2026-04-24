@extends('tablar::page')

@section('title', 'Nueva Acta de Reunión')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <a href="{{ route('formatos.acta-reunion.index') }}" class="btn btn-ghost-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Volver
                </a>
            </div>
            <div class="col">
                <h2 class="page-title">Nueva Acta de Reunión</h2>
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
            <form action="{{ route('formatos.acta-reunion.store') }}" method="POST">
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

                    {{-- TODO: Agregar campo de selección de proyecto --}}

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label required">Fecha de Reunión</label>
                            <input type="date"
                                   name="fecha_reunion"
                                   class="form-control @error('fecha_reunion') is-invalid @enderror"
                                   value="{{ old('fecha_reunion') }}"
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
                                   value="{{ old('lugar') }}"
                                   placeholder="Ej. Sala de reuniones, virtual, etc.">
                            @error('lugar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label required">Asistentes</label>
                            <textarea name="asistentes"
                                      rows="3"
                                      class="form-control @error('asistentes') is-invalid @enderror"
                                      placeholder="Lista de personas que asistieron a la reunión">{{ old('asistentes') }}</textarea>
                            @error('asistentes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label required">Temas Tratados</label>
                            <textarea name="temas_tratados"
                                      rows="4"
                                      class="form-control @error('temas_tratados') is-invalid @enderror"
                                      placeholder="Describe los temas discutidos en la reunión">{{ old('temas_tratados') }}</textarea>
                            @error('temas_tratados')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label required">Acuerdos</label>
                            <textarea name="acuerdos"
                                      rows="4"
                                      class="form-control @error('acuerdos') is-invalid @enderror"
                                      placeholder="Acuerdos establecidos en la reunión">{{ old('acuerdos') }}</textarea>
                            @error('acuerdos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Compromisos</label>
                            <textarea name="compromisos"
                                      rows="3"
                                      class="form-control @error('compromisos') is-invalid @enderror"
                                      placeholder="Compromisos y responsables">{{ old('compromisos') }}</textarea>
                            @error('compromisos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Próxima Reunión</label>
                            <input type="date"
                                   name="proxima_reunion"
                                   class="form-control @error('proxima_reunion') is-invalid @enderror"
                                   value="{{ old('proxima_reunion') }}">
                            @error('proxima_reunion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- TODO: Agregar campos adicionales del formato físico --}}
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('formatos.acta-reunion.index') }}" class="btn btn-ghost-secondary me-2">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-device-floppy me-1"></i> Guardar Acta
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
