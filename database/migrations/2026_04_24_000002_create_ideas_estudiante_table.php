<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * MÓDULO: Formato de Ideas de Estudiante — Estudiante 2
 *
 * TODO: Completar las columnas con los campos reales del formato físico.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ideas_estudiante', function (Blueprint $table) {
            $table->id();

            // Relaciones — ajustar según el diseño definitivo
            $table->foreignId('student_id')->nullable()->constrained('students')->nullOnDelete();
            $table->foreignId('project_id')->nullable()->constrained('projects')->nullOnDelete();

            // --- TODO: Ajustar columnas según el formato físico ---
            $table->string('titulo_idea');
            $table->text('descripcion');
            $table->text('justificacion');
            $table->text('objetivos');
            $table->date('fecha_presentacion');
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada'])->default('pendiente');
            // --- Fin columnas placeholder ---

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ideas_estudiante');
    }
};
