<?php

namespace App\Http\Controllers\Formats;

use App\Helpers\AuthUserHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Formats\Concerns\GeneratesPdf;
use App\Models\FichaPropuesta;
use App\Models\InvestigationLine;
use App\Models\ThematicArea;
use Illuminate\Http\Request;

class FormatoFichaPropuestaController extends Controller
{
    use GeneratesPdf;
    public function index()
    {
        $profesor = AuthUserHelper::fullUser()->professor;

        if (! $profesor) {
            abort(403);
        }

        $fichas = FichaPropuesta::where('professor_id', $profesor->id)
            ->latest()
            ->paginate(10);

        return view('formats.ficha-propuesta.index', compact('fichas'));
    }

    public function create()
    {
        $lineas = InvestigationLine::all();
        $areas = ThematicArea::all();

        return view('formats.ficha-propuesta.create', compact('lineas', 'areas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Información General
            'ciudad'                  => 'required|string|max:255',
            'fecha_propuesta'         => 'required|date',
            'cantidad_estudiantes'    => 'required|integer|min:1',
            'tiempo_ejecucion_meses'  => 'required|integer|min:1',

            // Datos del Tema
            'titulo_propuesta'        => 'required|string|max:255',
            'tipo_investigacion'      => 'required|in:documental,experimental,campo',
            'linea_investigacion_id'  => 'required|exists:investigation_lines,id',
            'area_tematica_id'        => 'required|exists:thematic_areas,id',

            // Objetivos
            'objetivo_general'        => 'required|string',
            'objetivo_especifico_1'   => 'required|string',
            'objetivo_especifico_2'   => 'nullable|string',
            'objetivo_especifico_3'   => 'nullable|string',

            // Pertinencia y Viabilidad
            'pertinencia_grupo_investigacion' => 'required|string',
            'disponibilidad_docentes'        => 'required|string',
            'calidad_correspondencia_titulo_objetivos' => 'required|string',
            'recursos_requeridos'            => 'required|string',

            // Descripción y Contexto
            'descripcion'                    => 'required|string',
            'ods_objetivos_desarrollo_sostenible' => 'nullable|string',
            'plan_desarrollo_nacional_departamental_municipal' => 'nullable|string',
        ]);

        $profesor = AuthUserHelper::fullUser()->professor;

        if (! $profesor) {
            abort(403);
        }

        $validated['professor_id'] = $profesor->id;

        FichaPropuesta::create($validated);

        return redirect()->route('formatos.ficha-propuesta.index')
            ->with('success', 'Ficha de propuesta creada exitosamente.');
    }

    public function show(FichaPropuesta $fichaPropuesta)
    {
        return view('formats.ficha-propuesta.show', compact('fichaPropuesta'));
    }

    public function edit(FichaPropuesta $fichaPropuesta)
    {
        $lineas = InvestigationLine::all();
        $areas = ThematicArea::all();

        return view('formats.ficha-propuesta.edit', compact('fichaPropuesta', 'lineas', 'areas'));
    }

    public function update(Request $request, FichaPropuesta $fichaPropuesta)
    {
        $validated = $request->validate([
            // Información General
            'ciudad'                  => 'required|string|max:255',
            'fecha_propuesta'         => 'required|date',
            'cantidad_estudiantes'    => 'required|integer|min:1',
            'tiempo_ejecucion_meses'  => 'required|integer|min:1',

            // Datos del Tema
            'titulo_propuesta'        => 'required|string|max:255',
            'tipo_investigacion'      => 'required|in:documental,experimental,campo',
            'linea_investigacion_id'  => 'required|exists:investigation_lines,id',
            'area_tematica_id'        => 'required|exists:thematic_areas,id',

            // Objetivos
            'objetivo_general'        => 'required|string',
            'objetivo_especifico_1'   => 'required|string',
            'objetivo_especifico_2'   => 'nullable|string',
            'objetivo_especifico_3'   => 'nullable|string',

            // Pertinencia y Viabilidad
            'pertinencia_grupo_investigacion' => 'required|string',
            'disponibilidad_docentes'        => 'required|string',
            'calidad_correspondencia_titulo_objetivos' => 'required|string',
            'recursos_requeridos'            => 'required|string',

            // Descripción y Contexto
            'descripcion'                    => 'required|string',
            'ods_objetivos_desarrollo_sostenible' => 'nullable|string',
            'plan_desarrollo_nacional_departamental_municipal' => 'nullable|string',
        ]);

        $fichaPropuesta->update($validated);

        return redirect()->route('formatos.ficha-propuesta.show', $fichaPropuesta)
            ->with('success', 'Ficha de propuesta actualizada exitosamente.');
    }

    public function destroy(FichaPropuesta $fichaPropuesta)
    {
        $fichaPropuesta->delete();

        return redirect()->route('formatos.ficha-propuesta.index')
            ->with('success', 'Ficha de propuesta eliminada.');
    }

    public function exportPdf(FichaPropuesta $fichaPropuesta)
    {
        return $this->generarPdf(
            'formats.ficha-propuesta.pdf',
            compact('fichaPropuesta'),
            'ficha_propuesta_' . $fichaPropuesta->id . '.pdf'
        );
    }
}
