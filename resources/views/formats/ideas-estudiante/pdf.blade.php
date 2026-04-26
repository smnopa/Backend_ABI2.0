<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FOR-INV-005 - Ideas de Estudiante</title>

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

        .check { text-align: center; }
    </style>
</head>
<body>

    <div class="center mb-20">
        <div class="title">FORMATO DE IDEAS DE ESTUDIANTE</div>
        <div class="subtitle">FOR-INV-005</div>
    </div>

    <table class="mb-20">

        {{-- Sección 1: Información Básica --}}
        <tr>
            <td colspan="3" class="section">1. Información Básica</td>
        </tr>

        <tr>
            <td colspan="3">
                <strong>Título de la Idea:</strong><br>
                {{ $ideasEstudiante->titulo }}
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <strong>Docente:</strong><br>
                {{ $ideasEstudiante->docente ?? '—' }}
            </td>
            <td>
                <strong>Fecha de registro:</strong><br>
                {{ $ideasEstudiante->created_at?->format('d/m/Y') ?? '—' }}
            </td>
        </tr>

        {{-- Sección 2: Criterios de Evaluación --}}
        <tr>
            <td colspan="3" class="section">2. Criterios de Evaluación</td>
        </tr>

        <tr>
            <th>Criterio</th>
            <th class="check">Sí</th>
            <th class="check">No</th>
        </tr>

        <tr>
            <td>Viabilidad</td>
            <td class="check">{{ $ideasEstudiante->viabilidad ? '✓' : '' }}</td>
            <td class="check">{{ !$ideasEstudiante->viabilidad ? '✓' : '' }}</td>
        </tr>

        <tr>
            <td>Pertinencia con el Programa</td>
            <td class="check">{{ $ideasEstudiante->pertinencia ? '✓' : '' }}</td>
            <td class="check">{{ !$ideasEstudiante->pertinencia ? '✓' : '' }}</td>
        </tr>

        <tr>
            <td>Disponibilidad de Docentes</td>
            <td class="check">{{ $ideasEstudiante->disponibilidad_docentes ? '✓' : '' }}</td>
            <td class="check">{{ !$ideasEstudiante->disponibilidad_docentes ? '✓' : '' }}</td>
        </tr>

        <tr>
            <td>Calidad Título vs Objetivos</td>
            <td class="check">{{ $ideasEstudiante->calidad_titulo_objetivos ? '✓' : '' }}</td>
            <td class="check">{{ !$ideasEstudiante->calidad_titulo_objetivos ? '✓' : '' }}</td>
        </tr>

        {{-- Sección 3: Concepto --}}
        <tr>
            <td colspan="3" class="section">3. Concepto</td>
        </tr>

        <tr>
            <td>
                <strong>Concepto:</strong><br>
                @if ($ideasEstudiante->concepto === 'aprobada')
                    Aprobada
                @elseif ($ideasEstudiante->concepto === 'no_aprobada')
                    No Aprobada
                @else
                    Sin definir
                @endif
            </td>
            <td colspan="2">
                <strong>N° Acta:</strong><br>
                {{ $ideasEstudiante->numero_acta ?? '—' }}
            </td>
        </tr>

        {{-- Sección 4: Observaciones --}}
        <tr>
            <td colspan="3" class="section">4. Observaciones</td>
        </tr>

        <tr>
            <td colspan="3" style="height: 80px;">
                {{ $ideasEstudiante->observaciones ?? '' }}
            </td>
        </tr>

        {{-- Sección 5: VoBo --}}
        <tr>
            <td colspan="3" class="section">5. VoBo. Dirección de Investigaciones</td>
        </tr>

        <tr>
            <td colspan="3" style="height: 60px;">
                {{ $ideasEstudiante->vobo ?? '' }}
            </td>
        </tr>

    </table>

</body>
</html>
