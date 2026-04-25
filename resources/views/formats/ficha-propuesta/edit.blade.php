@extends('tablar::page')

@section('title', 'Editar Ficha de Propuesta #' . $fichaPropuesta->id)

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">

            <div class="col-auto">
                <a href="{{ route('formatos.ficha-propuesta.show', $fichaPropuesta) }}" class="btn btn-ghost-secondary">
                    <i class="ti ti-arrow-left me-1"></i>
                    Volver
                </a>
            </div>

            <div class="col">
                <h2 class="page-title">
                    Editar Ficha #{{ $fichaPropuesta->id }}
                </h2>
            </div>

        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">

        <form action="{{ route('formatos.ficha-propuesta.update', $fichaPropuesta) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Sección 1: Información General --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">1. Información General del Tema</h3>
                </div>
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
                            <label class="form-label">Ciudad</label>
                            <input type="text"
                                   name="ciudad"
                                   class="form-control @error('ciudad') is-invalid @enderror"
                                   value="{{ old('ciudad', $fichaPropuesta->ciudad) }}"
                                   placeholder="Ciudad donde se ejecuta el proyecto"
                                   required>
                            @error('ciudad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Fecha de Propuesta</label>
                            <input type="date"
                                   name="fecha_propuesta"
                                   class="form-control @error('fecha_propuesta') is-invalid @enderror"
                                   value="{{ old('fecha_propuesta', $fichaPropuesta->fecha_propuesta?->format('Y-m-d')) }}"
                                   required>
                            @error('fecha_propuesta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Cantidad de Estudiantes</label>
                            <input type="number"
                                   name="cantidad_estudiantes"
                                   class="form-control @error('cantidad_estudiantes') is-invalid @enderror"
                                   value="{{ old('cantidad_estudiantes', $fichaPropuesta->cantidad_estudiantes) }}"
                                   min="1"
                                   required>
                            @error('cantidad_estudiantes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tiempo de Ejecución (meses)</label>
                            <input type="number"
                                   name="tiempo_ejecucion_meses"
                                   class="form-control @error('tiempo_ejecucion_meses') is-invalid @enderror"
                                   value="{{ old('tiempo_ejecucion_meses', $fichaPropuesta->tiempo_ejecucion_meses) }}"
                                   min="1"
                                   required>
                            @error('tiempo_ejecucion_meses')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sección 2: Datos del Tema --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">2. Datos del Tema</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Título del Proyecto</label>
                            <input type="text"
                                   name="titulo_propuesta"
                                   class="form-control @error('titulo_propuesta') is-invalid @enderror"
                                   value="{{ old('titulo_propuesta', $fichaPropuesta->titulo_propuesta) }}"
                                   placeholder="Título claro y conciso del proyecto"
                                   required>
                            @error('titulo_propuesta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tipo de Investigación</label>
                            <select name="tipo_investigacion"
                                    class="form-select @error('tipo_investigacion') is-invalid @enderror"
                                    required>
                                <option value="">Seleccione un tipo...</option>
                                <option value="documental" {{ old('tipo_investigacion', $fichaPropuesta->tipo_investigacion) == 'documental' ? 'selected' : '' }}>Documental</option>
                                <option value="experimental" {{ old('tipo_investigacion', $fichaPropuesta->tipo_investigacion) == 'experimental' ? 'selected' : '' }}>Experimental</option>
                                <option value="campo" {{ old('tipo_investigacion', $fichaPropuesta->tipo_investigacion) == 'campo' ? 'selected' : '' }}>De Campo</option>
                            </select>
                            @error('tipo_investigacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Línea de Investigación</label>
                            <select name="linea_investigacion_id"
                                    class="form-select @error('linea_investigacion_id') is-invalid @enderror"
                                    required>
                                <option value="">Seleccione una línea...</option>
                                @foreach ($lineas as $linea)
                                    <option value="{{ $linea->id }}"
                                            {{ old('linea_investigacion_id', $fichaPropuesta->linea_investigacion_id) == $linea->id ? 'selected' : '' }}>
                                        {{ $linea->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('linea_investigacion_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Área Temática</label>
                            <select name="area_tematica_id"
                                    class="form-select @error('area_tematica_id') is-invalid @enderror"
                                    required>
                                <option value="">Seleccione un área...</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}"
                                            {{ old('area_tematica_id', $fichaPropuesta->area_tematica_id) == $area->id ? 'selected' : '' }}>
                                        {{ $area->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('area_tematica_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sección 3: Objetivos --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">3. Objetivos</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Objetivo General Tentativo</label>
                            <textarea name="objetivo_general"
                                      rows="3"
                                      class="form-control @error('objetivo_general') is-invalid @enderror"
                                      placeholder="Describa el objetivo general del proyecto"
                                      required>{{ old('objetivo_general', $fichaPropuesta->objetivo_general) }}</textarea>
                            @error('objetivo_general')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Objetivo Específico 1</label>
                            <textarea name="objetivo_especifico_1"
                                      rows="3"
                                      class="form-control @error('objetivo_especifico_1') is-invalid @enderror"
                                      placeholder="Describa el primer objetivo específico"
                                      required>{{ old('objetivo_especifico_1', $fichaPropuesta->objetivo_especifico_1) }}</textarea>
                            @error('objetivo_especifico_1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Objetivo Específico 2 <span class="text-muted">(opcional)</span></label>
                            <textarea name="objetivo_especifico_2"
                                      rows="3"
                                      class="form-control @error('objetivo_especifico_2') is-invalid @enderror"
                                      placeholder="Describa el segundo objetivo específico">{{ old('objetivo_especifico_2', $fichaPropuesta->objetivo_especifico_2) }}</textarea>
                            @error('objetivo_especifico_2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Objetivo Específico 3 <span class="text-muted">(opcional)</span></label>
                            <textarea name="objetivo_especifico_3"
                                      rows="3"
                                      class="form-control @error('objetivo_especifico_3') is-invalid @enderror"
                                      placeholder="Describa el tercer objetivo específico">{{ old('objetivo_especifico_3', $fichaPropuesta->objetivo_especifico_3) }}</textarea>
                            @error('objetivo_especifico_3')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sección 4: Pertinencia y Viabilidad --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">4. Pertinencia, Viabilidad y Recursos</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Pertinencia con el Grupo de Investigación y Programa</label>
                            <textarea name="pertinencia_grupo_investigacion"
                                      rows="3"
                                      class="form-control @error('pertinencia_grupo_investigacion') is-invalid @enderror"
                                      placeholder="Describa cómo el proyecto aporta a la línea de investigación y al programa"
                                      required>{{ old('pertinencia_grupo_investigacion', $fichaPropuesta->pertinencia_grupo_investigacion) }}</textarea>
                            @error('pertinencia_grupo_investigacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Disponibilidad de Docentes para Dirección y Calificación</label>
                            <textarea name="disponibilidad_docentes"
                                      rows="3"
                                      class="form-control @error('disponibilidad_docentes') is-invalid @enderror"
                                      placeholder="Indique disponibilidad de docentes con conocimiento en la temática"
                                      required>{{ old('disponibilidad_docentes', $fichaPropuesta->disponibilidad_docentes) }}</textarea>
                            @error('disponibilidad_docentes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Calidad y Correspondencia entre Título y Objetivos</label>
                            <textarea name="calidad_correspondencia_titulo_objetivos"
                                      rows="3"
                                      class="form-control @error('calidad_correspondencia_titulo_objetivos') is-invalid @enderror"
                                      placeholder="Describa cómo los objetivos formulados permitirán lograr el resultado anticipado en el título"
                                      required>{{ old('calidad_correspondencia_titulo_objetivos', $fichaPropuesta->calidad_correspondencia_titulo_objetivos) }}</textarea>
                            @error('calidad_correspondencia_titulo_objetivos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Recursos Requeridos para el Desarrollo del Proyecto</label>
                            <textarea name="recursos_requeridos"
                                      rows="3"
                                      class="form-control @error('recursos_requeridos') is-invalid @enderror"
                                      placeholder="Indique insumos, equipos, laboratorios, información, acceso a comunidades, etc."
                                      required>{{ old('recursos_requeridos', $fichaPropuesta->recursos_requeridos) }}</textarea>
                            @error('recursos_requeridos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sección 5: Descripción y Contexto --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">5. Descripción y Contexto del Tema</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Descripción del Tema</label>
                            <textarea name="descripcion"
                                      rows="4"
                                      class="form-control @error('descripcion') is-invalid @enderror"
                                      placeholder="Breve explicación del proyecto. Responda: ¿Qué?, ¿Cómo?, ¿Por qué?, ¿Para qué?, ¿Quién se beneficia?"
                                      required>{{ old('descripcion', $fichaPropuesta->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Objetivos de Desarrollo Sostenible (ODS) <span class="text-muted">(opcional)</span></label>
                            <textarea name="ods_objetivos_desarrollo_sostenible"
                                      rows="2"
                                      class="form-control @error('ods_objetivos_desarrollo_sostenible') is-invalid @enderror"
                                      placeholder="ODS relacionados con el proyecto">{{ old('ods_objetivos_desarrollo_sostenible', $fichaPropuesta->ods_objetivos_desarrollo_sostenible) }}</textarea>
                            @error('ods_objetivos_desarrollo_sostenible')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Plan de Desarrollo Nacional/Departamental/Municipal <span class="text-muted">(opcional)</span></label>
                            <textarea name="plan_desarrollo_nacional_departamental_municipal"
                                      rows="2"
                                      class="form-control @error('plan_desarrollo_nacional_departamental_municipal') is-invalid @enderror"
                                      placeholder="Línea o propósito del Plan de Desarrollo al que apunta el proyecto">{{ old('plan_desarrollo_nacional_departamental_municipal', $fichaPropuesta->plan_desarrollo_nacional_departamental_municipal) }}</textarea>
                            @error('plan_desarrollo_nacional_departamental_municipal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Botones --}}
            <div class="card">
                <div class="card-footer text-end">
                    <a href="{{ route('formatos.ficha-propuesta.show', $fichaPropuesta) }}" class="btn btn-secondary me-2">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-device-floppy me-1"></i>
                        Actualizar Ficha
                    </button>
                </div>
            </div>

        </form>

    </div>
</div>

@endsection
