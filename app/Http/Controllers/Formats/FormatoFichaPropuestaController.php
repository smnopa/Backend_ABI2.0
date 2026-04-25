<?php

namespace App\Http\Controllers\Formats;

use App\Helpers\AuthUserHelper;
use App\Http\Controllers\Controller;
use App\Models\FichaPropuesta;
use App\Models\InvestigationLine;
use App\Models\ThematicArea;
use Illuminate\Http\Request;

/**
 * MÓDULO: Ficha de Propuesta de Tema al Banco de Proyectos Docentes
 * RESPONSABLE: Estudiante 3
 *
 * Gestión completa de fichas de propuesta de temas con 5 secciones:
 * 1. Información General
 * 2. Datos del Tema
 * 3. Objetivos
 * 4. Pertinencia y Viabilidad
 * 5. Descripción y Contexto
 */
class FormatoFichaPropuestaController extends Controller
{
    /**
     * Listar todas las fichas del profesor autenticado
     */
    public function index()
    {
        $profesor = AuthUserHelper::fullUser()->professor;
        $fichas = FichaPropuesta::where('professor_id', $profesor->id)
            ->latest()
            ->paginate(10);

        return view('formats.ficha-propuesta.index', compact('fichas'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        $lineas = InvestigationLine::all();
        $areas = ThematicArea::all();

        return view('formats.ficha-propuesta.create', compact('lineas', 'areas'));
    }

    /**
     * Guardar nueva ficha con validación completa de todos los campos
     */
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

        // Asignar automáticamente el profesor autenticado
        $validated['professor_id'] = AuthUserHelper::fullUser()->professor->id;

        FichaPropuesta::create($validated);

        return redirect()->route('formatos.ficha-propuesta.index')
            ->with('success', 'Ficha de propuesta creada exitosamente.');
    }

    /**
     * Mostrar detalle de una ficha
     */
    public function show(FichaPropuesta $fichaPropuesta)
    {
        return view('formats.ficha-propuesta.show', compact('fichaPropuesta'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(FichaPropuesta $fichaPropuesta)
    {
        $lineas = InvestigationLine::all();
        $areas = ThematicArea::all();

        return view('formats.ficha-propuesta.edit', compact('fichaPropuesta', 'lineas', 'areas'));
    }

    /**
     * Actualizar ficha con validación completa
     */
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

    /**
     * Eliminar ficha (soft delete)
     */
    public function destroy(FichaPropuesta $fichaPropuesta)
    {
        $fichaPropuesta->delete();

        return redirect()->route('formatos.ficha-propuesta.index')
            ->with('success', 'Ficha de propuesta eliminada.');
    }
}
