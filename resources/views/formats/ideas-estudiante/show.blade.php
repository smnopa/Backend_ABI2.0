@extends('tablar::page')

@section('title', 'Idea de Proyecto #' . $ideasEstudiante->id)

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
                <h2 class="page-title">{{ $ideasEstudiante->titulo_idea }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('formatos.ideas-estudiante.edit', $ideasEstudiante) }}" class="btn btn-secondary">
                    <i class="ti ti-edit me-1"></i> Editar
                </a>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalle de la Idea</h3>
                <div class="card-options">
                    @php
                        $badgeClass = match($ideasEstudiante->estado) {
                            'aprobada'  => 'bg-success',
                            'rechazada' => 'bg-danger',
                            default     => 'bg-warning text-dark',
                        };
                    @endphp
                    <span class="badge {{ $badgeClass }} fs-5">{{ ucfirst($ideasEstudiante->estado) }}</span>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Título</dt>
                    <dd class="col-sm-9">{{ $ideasEstudiante->titulo_idea }}</dd>

                    <dt class="col-sm-3">Fecha de Presentación</dt>
                    <dd class="col-sm-9">{{ $ideasEstudiante->fecha_presentacion?->format('d/m/Y') ?? '—' }}</dd>

                    <dt class="col-sm-3">Descripción</dt>
                    <dd class="col-sm-9">{{ $ideasEstudiante->descripcion }}</dd>

                    <dt class="col-sm-3">Justificación</dt>
                    <dd class="col-sm-9">{{ $ideasEstudiante->justificacion }}</dd>

                    <dt class="col-sm-3">Objetivos</dt>
                    <dd class="col-sm-9">{{ $ideasEstudiante->objetivos }}</dd>

                    {{-- TODO: Mostrar campos adicionales del formato físico --}}
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
