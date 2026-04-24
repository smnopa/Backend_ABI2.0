<?php

namespace App\Http\Controllers\Formats;

use App\Http\Controllers\Controller;
use App\Models\IdeasEstudiante;
use Illuminate\Http\Request;

/**
 * MÓDULO: Formato de Ideas de Estudiante
 * RESPONSABLE: Estudiante 2
 *
 * TODO: Completar todos los métodos con la lógica de negocio correspondiente.
 * TODO: Analizar el formato físico para definir los campos exactos.
 * TODO: Revisar si el formato se vincula a un proyecto existente o es previo al proyecto.
 */
class FormatoIdeasEstudianteController extends Controller
{
    public function index()
    {
        // TODO: Filtrar ideas por el estudiante autenticado o por programa
        $ideas = IdeasEstudiante::latest()->paginate(10);

        return view('formats.ideas-estudiante.index', compact('ideas'));
    }

    public function create()
    {
        // TODO: Pasar al view datos de programas, líneas de investigación, etc.
        return view('formats.ideas-estudiante.create');
    }

    public function store(Request $request)
    {
        // TODO: Validar y persistir la idea
        $validated = $request->validate([
            // TODO: Ajustar según los campos del formato físico
            'titulo_idea'       => 'required|string|max:255',
            'descripcion'       => 'required|string',
            'justificacion'     => 'required|string',
            'objetivos'         => 'required|string',
            'fecha_presentacion'=> 'required|date',
        ]);

        // TODO: Asociar el student_id del usuario autenticado
        IdeasEstudiante::create($validated);

        return redirect()->route('formatos.ideas-estudiante.index')
            ->with('success', 'Idea registrada exitosamente.');
    }

    public function show(IdeasEstudiante $ideasEstudiante)
    {
        return view('formats.ideas-estudiante.show', compact('ideasEstudiante'));
    }

    public function edit(IdeasEstudiante $ideasEstudiante)
    {
        return view('formats.ideas-estudiante.edit', compact('ideasEstudiante'));
    }

    public function update(Request $request, IdeasEstudiante $ideasEstudiante)
    {
        $validated = $request->validate([
            'titulo_idea'        => 'required|string|max:255',
            'descripcion'        => 'required|string',
            'justificacion'      => 'required|string',
            'objetivos'          => 'required|string',
            'fecha_presentacion' => 'required|date',
        ]);

        $ideasEstudiante->update($validated);

        return redirect()->route('formatos.ideas-estudiante.index')
            ->with('success', 'Idea actualizada exitosamente.');
    }

    public function destroy(IdeasEstudiante $ideasEstudiante)
    {
        $ideasEstudiante->delete();

        return redirect()->route('formatos.ideas-estudiante.index')
            ->with('success', 'Idea eliminada.');
    }
}
