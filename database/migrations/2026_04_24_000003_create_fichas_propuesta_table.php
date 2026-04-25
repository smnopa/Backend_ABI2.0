<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * MÓDULO: Ficha de Propuesta de Tema al Banco de Proyectos Docentes — Estudiante 3
 *
 * Campos organizados según 5 secciones del formato físico:
 * 1. Información General
 * 2. Datos del Tema
 * 3. Objetivos
 * 4. Pertinencia, Viabilidad y Recursos
 * 5. Descripción y Contexto
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fichas_propuesta', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->foreignId('professor_id')->nullable()->constrained('professors')->nullOnDelete();
            $table->foreignId('programa_id')->nullable()->constrained('programs')->nullOnDelete();
            $table->foreignId('linea_investigacion_id')->nullable()->constrained('investigation_lines')->nullOnDelete();
            $table->foreignId('area_tematica_id')->nullable()->constrained('thematic_areas')->nullOnDelete();

            // Sección 1: Información General
            $table->string('ciudad')->comment('Ciudad donde se ejecuta el proyecto');
            $table->date('fecha_propuesta')->comment('Fecha de propuesta del tema');
            $table->integer('cantidad_estudiantes')->comment('Cantidad de estudiantes que trabajarán en el proyecto');
            $table->integer('tiempo_ejecucion_meses')->comment('Tiempo estimado de ejecución en meses');

            // Sección 2: Datos del Tema
            $table->string('titulo_propuesta')->comment('Título del proyecto o tema propuesto');
            $table->enum('tipo_investigacion', ['documental', 'experimental', 'campo'])->comment('Tipo de investigación a realizar');

            // Sección 3: Objetivos
            $table->text('objetivo_general')->comment('Objetivo general del proyecto');
            $table->text('objetivo_especifico_1')->comment('Primer objetivo específico (requerido)');
            $table->text('objetivo_especifico_2')->nullable()->comment('Segundo objetivo específico (opcional)');
            $table->text('objetivo_especifico_3')->nullable()->comment('Tercer objetivo específico (opcional)');

            // Sección 4: Pertinencia, Viabilidad y Recursos
            $table->text('pertinencia_grupo_investigacion')->comment('Pertinencia con el grupo de investigación y programa');
            $table->text('disponibilidad_docentes')->comment('Disponibilidad de docentes para dirección y calificación');
            $table->text('calidad_correspondencia_titulo_objetivos')->comment('Calidad y correspondencia entre título y objetivos');
            $table->text('recursos_requeridos')->comment('Recursos requeridos para desarrollo del proyecto');

            // Sección 5: Descripción y Contexto
            $table->text('descripcion')->comment('Descripción breve del tema');
            $table->text('ods_objetivos_desarrollo_sostenible')->nullable()->comment('Objetivos de Desarrollo Sostenible relacionados');
            $table->text('plan_desarrollo_nacional_departamental_municipal')->nullable()->comment('Relación con planes de desarrollo');

            // Estado
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada'])->default('pendiente')->comment('Estado de la propuesta');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fichas_propuesta');
    }
};
