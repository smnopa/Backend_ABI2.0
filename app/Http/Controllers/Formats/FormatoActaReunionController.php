<?php

namespace App\Http\Controllers\Formats;

use App\Http\Controllers\Controller;
use App\Models\ActaReunion;
use Illuminate\Http\Request;

/**
 * MÓDULO: Acta de Reunión
 * RESPONSABLE: Estudiante 1
 *
 * TODO: Completar todos los métodos con la lógica de negocio correspondiente.
 * TODO: Analizar el formato físico del acta para definir los campos exactos.
 * TODO: Usar role-scoped models si el rol lo requiere (ver app/Models/Professor/).
 */
class FormatoActaReunionController extends Controller
{
    public function index()
    {
        // TODO: Obtener actas paginadas del usuario autenticado o de su programa
        $actas = ActaReunion::latest()->paginate(10);

        return view('formats.acta-reunion.index', compact('actas'));
    }

    public function create()
    {
        // TODO: Pasar al view los datos necesarios (proyectos, usuarios, etc.)
        return view('formats.acta-reunion.create');
    }

    public function store(Request $request)
    {
        // TODO: Validar y persistir el acta
        $validated = $request->validate([
            // TODO: Definir reglas de validación según los campos del formato físico
            'fecha_reunion'    => 'required|date',
            'lugar'            => 'required|string|max:255',
            'asistentes'       => 'required|string',
            'temas_tratados'   => 'required|string',
            'acuerdos'         => 'required|string',
            'compromisos'      => 'nullable|string',
            'proxima_reunion'  => 'nullable|date',
        ]);

        ActaReunion::create($validated);

        return redirect()->route('formatos.acta-reunion.index')
            ->with('success', 'Acta de reunión creada exitosamente.');
    }

    public function show(ActaReunion $actaReunion)
    {
        return view('formats.acta-reunion.show', compact('actaReunion'));
    }

    public function edit(ActaReunion $actaReunion)
    {
        return view('formats.acta-reunion.edit', compact('actaReunion'));
    }

    public function update(Request $request, ActaReunion $actaReunion)
    {
        // TODO: Validar y actualizar
        $validated = $request->validate([
            'fecha_reunion'   => 'required|date',
            'lugar'           => 'required|string|max:255',
            'asistentes'      => 'required|string',
            'temas_tratados'  => 'required|string',
            'acuerdos'        => 'required|string',
            'compromisos'     => 'nullable|string',
            'proxima_reunion' => 'nullable|date',
        ]);

        $actaReunion->update($validated);

        return redirect()->route('formatos.acta-reunion.index')
            ->with('success', 'Acta de reunión actualizada.');
    }

    public function destroy(ActaReunion $actaReunion)
    {
        $actaReunion->delete();

        return redirect()->route('formatos.acta-reunion.index')
            ->with('success', 'Acta de reunión eliminada.');
    }
}
