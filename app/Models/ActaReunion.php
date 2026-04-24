<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * MÓDULO: Acta de Reunión — Estudiante 1
 *
 * TODO: Ajustar $fillable con los campos reales del formato físico.
 * TODO: Agregar relaciones con Project, User (elaborado_por), etc.
 */
class ActaReunion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'actas_reunion';

    protected $fillable = [
        // TODO: Completar con todos los campos del formato físico
        'project_id',
        'elaborado_por',
        'fecha_reunion',
        'lugar',
        'asistentes',
        'temas_tratados',
        'acuerdos',
        'compromisos',
        'proxima_reunion',
    ];

    protected $casts = [
        'fecha_reunion'   => 'date',
        'proxima_reunion' => 'date',
    ];

    // TODO: Descomentar y ajustar relaciones según el diseño final
    // public function project()
    // {
    //     return $this->belongsTo(Project::class);
    // }

    // public function elaboradoPor()
    // {
    //     return $this->belongsTo(User::class, 'elaborado_por');
    // }
}
