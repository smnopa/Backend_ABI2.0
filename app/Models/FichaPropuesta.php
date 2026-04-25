<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * MÓDULO: Ficha de Propuesta de Tema al Banco de Proyectos Docentes — Estudiante 3
 *
 * Campos del formulario organizados en 5 secciones:
 * 1. Información General: ciudad, fecha_propuesta, cantidad_estudiantes, tiempo_ejecucion_meses
 * 2. Datos del Tema: titulo_propuesta, tipo_investigacion, linea_investigacion_id, area_tematica_id
 * 3. Objetivos: objetivo_general, objetivo_especifico_1/2/3
 * 4. Pertinencia y Viabilidad: pertinencia_grupo_investigacion, disponibilidad_docentes, etc.
 * 5. Descripción: descripcion, ods_objetivos_desarrollo_sostenible, plan_desarrollo_nacional_departamental_municipal
 */
class FichaPropuesta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fichas_propuesta';

    protected $fillable = [
        // Información General
        'professor_id',
        'programa_id',
        'ciudad',
        'fecha_propuesta',
        'cantidad_estudiantes',
        'tiempo_ejecucion_meses',
        
        // Datos del Tema
        'titulo_propuesta',
        'tipo_investigacion',
        'linea_investigacion_id',
        'area_tematica_id',
        
        // Objetivos
        'objetivo_general',
        'objetivo_especifico_1',
        'objetivo_especifico_2',
        'objetivo_especifico_3',
        
        // Pertinencia y Viabilidad
        'pertinencia_grupo_investigacion',
        'disponibilidad_docentes',
        'calidad_correspondencia_titulo_objetivos',
        'recursos_requeridos',
        
        // Descripción y Contexto
        'descripcion',
        'ods_objetivos_desarrollo_sostenible',
        'plan_desarrollo_nacional_departamental_municipal',
        
        // Estado
        'estado',
    ];

    protected $casts = [
        'fecha_propuesta' => 'date',
    ];

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function programa()
    {
        return $this->belongsTo(Program::class, 'programa_id');
    }

    public function lineaInvestigacion()
    {
        return $this->belongsTo(InvestigationLine::class, 'linea_investigacion_id');
    }

    public function areaTematica()
    {
        return $this->belongsTo(ThematicArea::class, 'area_tematica_id');
    }
}
