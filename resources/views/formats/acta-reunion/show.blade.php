@extends('tablar::page')

@section('title', 'Acta de Reunión #' . $actaReunion->id)

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
                <h2 class="page-title">Acta de Reunión #{{ $actaReunion->id }}</h2>
                <p class="text-muted mb-0">{{ $actaReunion->fecha_reunion?->format('d/m/Y') }}</p>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('formatos.acta-reunion.edit', $actaReunion) }}" class="btn btn-secondary">
                    <i class="ti ti-edit me-1"></i> Editar
                </a>
                {{-- TODO: Agregar botón de exportar a PDF --}}
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalle del Acta</h3>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Fecha de Reunión</dt>
                    <dd class="col-sm-9">{{ $actaReunion->fecha_reunion?->format('d/m/Y') ?? '—' }}</dd>

                    <dt class="col-sm-3">Lugar</dt>
                    <dd class="col-sm-9">{{ $actaReunion->lugar ?? '—' }}</dd>

                    <dt class="col-sm-3">Asistentes</dt>
                    <dd class="col-sm-9">{{ $actaReunion->asistentes ?? '—' }}</dd>

                    <dt class="col-sm-3">Temas Tratados</dt>
                    <dd class="col-sm-9">{{ $actaReunion->temas_tratados ?? '—' }}</dd>

                    <dt class="col-sm-3">Acuerdos</dt>
                    <dd class="col-sm-9">{{ $actaReunion->acuerdos ?? '—' }}</dd>

                    <dt class="col-sm-3">Compromisos</dt>
                    <dd class="col-sm-9">{{ $actaReunion->compromisos ?? '—' }}</dd>

                    <dt class="col-sm-3">Próxima Reunión</dt>
                    <dd class="col-sm-9">{{ $actaReunion->proxima_reunion?->format('d/m/Y') ?? '—' }}</dd>

                    {{-- TODO: Mostrar campos adicionales del formato físico --}}
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
