<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * MÓDULO: Acta de Reunión — Estudiante 1
 *
 * TODO: Completar las columnas con los campos reales del formato físico.
 *       Borrar o renombrar las columnas placeholder y agregar las definitivas.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actas_reunion', function (Blueprint $table) {
            $table->id();

            // Relación opcional con el proyecto
            $table->foreignId('project_id')->nullable()->constrained('projects')->nullOnDelete();

            // Usuario que elabora el acta (FK a users)
            $table->foreignId('elaborado_por')->nullable()->constrained('users')->nullOnDelete();

            // --- TODO: Ajustar columnas según el formato físico ---
            $table->date('fecha_reunion');
            $table->string('lugar')->nullable();
            $table->text('asistentes');          // JSON o texto libre según diseño
            $table->text('temas_tratados');
            $table->text('acuerdos');
            $table->text('compromisos')->nullable();
            $table->date('proxima_reunion')->nullable();
            // --- Fin columnas placeholder ---

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('actas_reunion');
    }
};
