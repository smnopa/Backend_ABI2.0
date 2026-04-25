@extends('tablar::page')

@section('title', 'Detalle Idea #' . $ideasEstudiante->id)

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
                <h2 class="page-title">Detalle de Idea de Proyecto</h2>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('formatos.ideas-estudiante.edit', $ideasEstudiante) }}" class="btn btn-warning">
                    <i class="ti ti-edit me-1"></i> Editar
                </a>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">

        <div class="card">

            {{-- ENCABEZADO --}}
            <div class="card-header">
                <h3 class="card-title">Formato de Ideas de Estudiante</h3>
            </div>

            <div class="card-body">

                {{-- INFORMACIÓN BÁSICA --}}
                <h4 class="mb-3">Información Básica</h4>

                <div class="mb-2">
                    <strong>Título:</strong><br>
                    {{ $ideasEstudiante->titulo }}
                </div>

                <div class="mb-4">
                    <strong>Docente:</strong><br>
                    {{ $ideasEstudiante->docente ?? '—' }}
                </div>

                <hr>

                {{-- CONCEPTO --}}
                <h4 class="mb-3">Concepto de Evaluación</h4>

                <div class="mb-4">
                    @if($ideasEstudiante->concepto === 'aprobada')
                        <span class="badge bg-success fs-4">APROBADA</span>
                    @elseif($ideasEstudiante->concepto === 'no_aprobada')
                        <span class="badge bg-danger fs-4">NO APROBADA</span>
                    @else
                        <span class="badge bg-secondary fs-4">SIN DEFINIR</span>
                    @endif
                </div>

                <hr>

                {{-- CRITERIOS --}}
                <h4 class="mb-3">Criterios de Evaluación</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Criterio</th>
                                <th class="text-center">Cumple</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Viabilidad</td>
                                <td class="text-center">
                                    {!! $ideasEstudiante->viabilidad ? '✔️' : '✘' !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Pertinencia con el Programa</td>
                                <td class="text-center">
                                    {!! $ideasEstudiante->pertinencia ? '✔️' : '✘' !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Disponibilidad de Docentes</td>
                                <td class="text-center">
                                    {!! $ideasEstudiante->disponibilidad_docentes ? '✔️' : '✘' !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Calidad Título vs Objetivos</td>
                                <td class="text-center">
                                    {!! $ideasEstudiante->calidad_titulo_objetivos ? '✔️' : '✘' !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr>

                {{-- OBSERVACIONES --}}
                <h4 class="mb-3">Observaciones</h4>

                <div class="mb-4">
                    {{ $ideasEstudiante->observaciones ?? 'Sin observaciones' }}
                </div>

                {{-- REGISTRO --}}
                <h4 class="mb-3">Registro y Seguimiento</h4>

                <div class="row">
                    <div class="col-md-6">
                        <strong>N° Acta:</strong><br>
                        {{ $ideasEstudiante->numero_acta ?? '—' }}
                    </div>

                    <div class="col-md-6">
                        <strong>VoBo. Dirección de Investigaciones:</strong><br>
                        {{ $ideasEstudiante->vobo ?? '—' }}
                    </div>
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="card-footer text-end">
                <a href="{{ route('formatos.ideas-estudiante.index') }}" class="btn btn-secondary">
                    Volver al listado
                </a>
            </div>

        </div>

    </div>
</div>

@endsection