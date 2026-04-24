<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * MÓDULO: Formato de Ideas de Estudiante — Estudiante 2
 *
 * TODO: Ajustar $fillable con los campos reales del formato físico.
 * TODO: Agregar relaciones con Student, Project, Program, etc.
 */
class IdeasEstudiante extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ideas_estudiante';

    protected $fillable = [
        // TODO: Completar con todos los campos del formato físico
        'student_id',
        'project_id',
        'titulo_idea',
        'descripcion',
        'justificacion',
        'objetivos',
        'fecha_presentacion',
        'estado',
    ];

    protected $casts = [
        'fecha_presentacion' => 'date',
    ];

    // TODO: Descomentar y ajustar relaciones según el diseño final
    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }

    // public function project()
    // {
    //     return $this->belongsTo(Project::class);
    // }
}
