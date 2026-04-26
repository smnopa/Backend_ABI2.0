<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FOR-INV-006 - Ficha de Propuesta</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            margin: 35px;
            line-height: 1.4;
        }

        .center { text-align: center; }
        .bold { font-weight: bold; }

        .title {
            font-size: 15px;
            font-weight: bold;
        }

        .subtitle {
            font-size: 13px;
            font-weight: bold;
        }

        .mb-20 { margin-bottom: 20px; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        .section {
            background: #f7f7f7;
            font-weight: bold;
        }

        .tall { height: 70px; }
    </style>
</head>
<body>

    <div class="center mb-20">
        <div class="title">FICHA DE PROPUESTA DE TEMA AL BANCO DE PROYECTOS DOCENTES</div>
        <div class="subtitle">FOR-INV-006</div>
    </div>

    <table class="mb-20">

        {{-- Sección 1: Información General --}}
        <tr>
            <td colspan="4" class="section">1. Información General</td>
        </tr>

        <tr>
            <td colspan="2">
                <strong>Ciudad:</strong><br>
                {{ $fichaPropuesta->ciudad ?? '—' }}
            </td>
            <td colspan="2">
                <strong>Fecha de Propuesta:</strong><br>
                {{ $fichaPropuesta->fecha_propuesta?->format('d/m/Y') ?? '—' }}
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <strong>Cantidad de Estudiantes:</strong><br>
                {{ $fichaPropuesta->cantidad_estudiantes ?? '—' }}
            </td>
            <td colspan="2">
                <strong>Tiempo de Ejecución:</strong><br>
                {{ $fichaPropuesta->tiempo_ejecucion_meses ?? '—' }} meses
            </td>
        </tr>

        @if ($fichaPropuesta->professor)
            <tr>
                <td colspan="4">
                    <strong>Profesor Proponente:</strong><br>
                    {{ $fichaPropuesta->professor->name }} {{ $fichaPropuesta->professor->last_name }}
                </td>
            </tr>
        @endif

        {{-- Sección 2: Datos del Tema --}}
        <tr>
            <td colspan="4" class="section">2. Datos del Tema</td>
        </tr>

        <tr>
            <td colspan="4">
                <strong>Título del Proyecto:</strong><br>
                {{ $fichaPropuesta->titulo_propuesta }}
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <strong>Tipo de Investigación:</strong><br>
                @switch($fichaPropuesta->tipo_investigacion)
                    @case('documental') Documental @break
                    @case('experimental') Experimental @break
                    @case('campo') De Campo @break
                    @default —
                @endswitch
            </td>
            <td>
                <strong>Línea de Investigación:</strong><br>
                {{ $fichaPropuesta->lineaInvestigacion?->name ?? '—' }}
            </td>
            <td>
                <strong>Área Temática:</strong><br>
                {{ $fichaPropuesta->areaTematica?->name ?? '—' }}
            </td>
        </tr>

        {{-- Sección 3: Objetivos --}}
        <tr>
            <td colspan="4" class="section">3. Objetivos</td>
        </tr>

        <tr>
            <td colspan="4">
                <strong>Objetivo General:</strong><br>
                {{ $fichaPropuesta->objetivo_general ?? '—' }}
            </td>
        </tr>

        <tr>
            <td colspan="4">
                <strong>Objetivo Específico 1:</strong><br>
                {{ $fichaPropuesta->objetivo_especifico_1 ?? '—' }}
            </td>
        </tr>

        @if ($fichaPropuesta->objetivo_especifico_2)
            <tr>
                <td colspan="4">
                    <strong>Objetivo Específico 2:</strong><br>
                    {{ $fichaPropuesta->objetivo_especifico_2 }}
                </td>
            </tr>
        @endif

        @if ($fichaPropuesta->objetivo_especifico_3)
            <tr>
                <td colspan="4">
                    <strong>Objetivo Específico 3:</strong><br>
                    {{ $fichaPropuesta->objetivo_especifico_3 }}
                </td>
            </tr>
        @endif

        {{-- Sección 4: Pertinencia y Viabilidad --}}
        <tr>
            <td colspan="4" class="section">4. Pertinencia, Viabilidad y Recursos</td>
        </tr>

        <tr>
            <td colspan="4">
                <strong>Pertinencia con el Grupo de Investigación y Programa:</strong><br>
                {{ $fichaPropuesta->pertinencia_grupo_investigacion ?? '—' }}
            </td>
        </tr>

        <tr>
            <td colspan="4">
                <strong>Disponibilidad de Docentes:</strong><br>
                {{ $fichaPropuesta->disponibilidad_docentes ?? '—' }}
            </td>
        </tr>

        <tr>
            <td colspan="4">
                <strong>Calidad y Correspondencia Título-Objetivos:</strong><br>
                {{ $fichaPropuesta->calidad_correspondencia_titulo_objetivos ?? '—' }}
            </td>
        </tr>

        <tr>
            <td colspan="4">
                <strong>Recursos Requeridos:</strong><br>
                {{ $fichaPropuesta->recursos_requeridos ?? '—' }}
            </td>
        </tr>

        {{-- Sección 5: Descripción y Contexto --}}
        <tr>
            <td colspan="4" class="section">5. Descripción y Contexto del Tema</td>
        </tr>

        <tr>
            <td colspan="4">
                <strong>Descripción del Tema:</strong><br>
                {{ $fichaPropuesta->descripcion ?? '—' }}
            </td>
        </tr>

        @if ($fichaPropuesta->ods_objetivos_desarrollo_sostenible)
            <tr>
                <td colspan="4">
                    <strong>ODS:</strong><br>
                    {{ $fichaPropuesta->ods_objetivos_desarrollo_sostenible }}
                </td>
            </tr>
        @endif

        @if ($fichaPropuesta->plan_desarrollo_nacional_departamental_municipal)
            <tr>
                <td colspan="4">
                    <strong>Plan de Desarrollo:</strong><br>
                    {{ $fichaPropuesta->plan_desarrollo_nacional_departamental_municipal }}
                </td>
            </tr>
        @endif

        {{-- Estado --}}
        <tr>
            <td colspan="4">
                <strong>Estado:</strong>
                {{ ucfirst($fichaPropuesta->estado ?? 'pendiente') }}
            </td>
        </tr>

    </table>

</body>
</html>
