@extends('tablar::page')

@section('title', 'Ficha de Propuesta #' . $fichaPropuesta->id)

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <a href="{{ route('formatos.ficha-propuesta.index') }}" class="btn btn-ghost-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Volver
                </a>
            </div>
            <div class="col">
                <h2 class="page-title">{{ $fichaPropuesta->titulo_propuesta }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('formatos.ficha-propuesta.edit', $fichaPropuesta) }}" class="btn btn-secondary">
                    <i class="ti ti-edit me-1"></i> Editar
                </a>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- Estado -->
        <div class="row mb-3">
            <div class="col-12">
                @php
                    $badgeClass = match($fichaPropuesta->estado) {
                        'aprobada'  => 'bg-success',
                        'rechazada' => 'bg-danger',
                        default     => 'bg-warning text-dark',
                    };
                @endphp
                <span class="badge {{ $badgeClass }} fs-5">{{ ucfirst($fichaPropuesta->estado) }}</span>
            </div>
        </div>

        <!-- Sección 1: Información General -->
        <div class="card mb-3">
            <div class="card-header bg-light">
                <h3 class="card-title">1. Información General</h3>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Ciudad</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->ciudad ?? '—' }}</dd>

                    <dt class="col-sm-3">Fecha de Propuesta</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->fecha_propuesta?->format('d/m/Y') ?? '—' }}</dd>

                    <dt class="col-sm-3">Cantidad de Estudiantes</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->cantidad_estudiantes ?? '—' }}</dd>

                    <dt class="col-sm-3">Tiempo de Ejecución</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->tiempo_ejecucion_meses ?? '—' }} meses</dd>

                    @if ($fichaPropuesta->professor)
                        <dt class="col-sm-3">Profesor Proponente</dt>
                        <dd class="col-sm-9">{{ $fichaPropuesta->professor->name }} {{ $fichaPropuesta->professor->last_name }}</dd>
                    @endif
                </dl>
            </div>
        </div>

        <!-- Sección 2: Datos del Tema -->
        <div class="card mb-3">
            <div class="card-header bg-light">
                <h3 class="card-title">2. Datos del Tema</h3>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Título del Proyecto</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->titulo_propuesta }}</dd>

                    <dt class="col-sm-3">Tipo de Investigación</dt>
                    <dd class="col-sm-9">
                        @switch($fichaPropuesta->tipo_investigacion)
                            @case('documental')
                                Documental
                                @break
                            @case('experimental')
                                Experimental
                                @break
                            @case('campo')
                                De Campo
                                @break
                            @default
                                —
                        @endswitch
                    </dd>

                    <dt class="col-sm-3">Línea de Investigación</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->lineaInvestigacion?->name ?? '—' }}</dd>

                    <dt class="col-sm-3">Área Temática</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->areaTematica?->name ?? '—' }}</dd>
                </dl>
            </div>
        </div>

        <!-- Sección 3: Objetivos -->
        <div class="card mb-3">
            <div class="card-header bg-light">
                <h3 class="card-title">3. Objetivos</h3>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Objetivo General</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->objetivo_general ?? '—' }}</dd>

                    <dt class="col-sm-3">Objetivo Específico 1</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->objetivo_especifico_1 ?? '—' }}</dd>

                    @if ($fichaPropuesta->objetivo_especifico_2)
                        <dt class="col-sm-3">Objetivo Específico 2</dt>
                        <dd class="col-sm-9">{{ $fichaPropuesta->objetivo_especifico_2 }}</dd>
                    @endif

                    @if ($fichaPropuesta->objetivo_especifico_3)
                        <dt class="col-sm-3">Objetivo Específico 3</dt>
                        <dd class="col-sm-9">{{ $fichaPropuesta->objetivo_especifico_3 }}</dd>
                    @endif
                </dl>
            </div>
        </div>

        <!-- Sección 4: Pertinencia y Viabilidad -->
        <div class="card mb-3">
            <div class="card-header bg-light">
                <h3 class="card-title">4. Pertinencia, Viabilidad y Recursos</h3>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Pertinencia con el Grupo de Investigación y Programa</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->pertinencia_grupo_investigacion ?? '—' }}</dd>

                    <dt class="col-sm-3">Disponibilidad de Docentes</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->disponibilidad_docentes ?? '—' }}</dd>

                    <dt class="col-sm-3">Calidad y Correspondencia Título-Objetivos</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->calidad_correspondencia_titulo_objetivos ?? '—' }}</dd>

                    <dt class="col-sm-3">Recursos Requeridos</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->recursos_requeridos ?? '—' }}</dd>
                </dl>
            </div>
        </div>

        <!-- Sección 5: Descripción y Contexto -->
        <div class="card mb-3">
            <div class="card-header bg-light">
                <h3 class="card-title">5. Descripción y Contexto</h3>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Descripción del Tema</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->descripcion ?? '—' }}</dd>

                    @if ($fichaPropuesta->ods_objetivos_desarrollo_sostenible)
                        <dt class="col-sm-3">Objetivos de Desarrollo Sostenible (ODS)</dt>
                        <dd class="col-sm-9">{{ $fichaPropuesta->ods_objetivos_desarrollo_sostenible }}</dd>
                    @endif

                    @if ($fichaPropuesta->plan_desarrollo_nacional_departamental_municipal)
                        <dt class="col-sm-3">Plan de Desarrollo</dt>
                        <dd class="col-sm-9">{{ $fichaPropuesta->plan_desarrollo_nacional_departamental_municipal }}</dd>
                    @endif
                </dl>
            </div>
        </div>

        <!-- Fecha de Creación -->
        <div class="card">
            <div class="card-body text-muted">
                <small>
                    <strong>Creada:</strong> {{ $fichaPropuesta->created_at?->format('d/m/Y H:i') ?? '—' }}
                    @if ($fichaPropuesta->updated_at && $fichaPropuesta->updated_at != $fichaPropuesta->created_at)
                        | <strong>Última actualización:</strong> {{ $fichaPropuesta->updated_at?->format('d/m/Y H:i') ?? '—' }}
                    @endif
                </small>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('tablar::page')

@section('title', 'Ficha de Propuesta #' . $fichaPropuesta->id)

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <a href="{{ route('formatos.ficha-propuesta.index') }}" class="btn btn-ghost-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Volver
                </a>
            </div>
            <div class="col">
                <h2 class="page-title">{{ $fichaPropuesta->titulo_propuesta }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('formatos.ficha-propuesta.edit', $fichaPropuesta) }}" class="btn btn-secondary">
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
                <h3 class="card-title">Detalle de la Ficha</h3>
                <div class="card-options">
                    @php
                        $badgeClass = match($fichaPropuesta->estado) {
                            'aprobada'  => 'bg-success',
                            'rechazada' => 'bg-danger',
                            default     => 'bg-warning text-dark',
                        };
                    @endphp
                    <span class="badge {{ $badgeClass }} fs-5">{{ ucfirst($fichaPropuesta->estado) }}</span>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Título de la Propuesta</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->titulo_propuesta }}</dd>

                    <dt class="col-sm-3">Fecha de Propuesta</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->fecha_propuesta?->format('d/m/Y') ?? '—' }}</dd>

                    <dt class="col-sm-3">Descripción</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->descripcion }}</dd>

                    <dt class="col-sm-3">Objetivos</dt>
                    <dd class="col-sm-9">{{ $fichaPropuesta->objetivos }}</dd>

                    {{-- TODO: Mostrar línea de investigación, área temática, programa --}}
                    {{-- TODO: Mostrar campos adicionales del formato físico --}}
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
