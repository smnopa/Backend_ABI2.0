@extends('tablar::page')

@section('title', 'Formato de Ideas de Estudiante')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Ideas de Estudiantes</h2>
                <p class="text-muted mb-0">Registro de propuestas de ideas para proyectos de grado.</p>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('formatos.ideas-estudiante.create') }}" class="btn btn-success">
                    <i class="ti ti-plus me-1"></i> Nueva Idea
                </a>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de Ideas</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Título de la Idea</th>
                            <th>Fecha Presentación</th>
                            <th>Estado</th>
                            {{-- TODO: Agregar columna Estudiante si es vista de research_staff --}}
                            <th class="w-1">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ideas as $idea)
                            <tr>
                                <td>{{ $idea->id }}</td>
                                <td>{{ $idea->titulo_idea }}</td>
                                <td>{{ $idea->fecha_presentacion?->format('d/m/Y') }}</td>
                                <td>
                                    @php
                                        $badgeClass = match($idea->estado) {
                                            'aprobada'  => 'bg-success',
                                            'rechazada' => 'bg-danger',
                                            default     => 'bg-warning text-dark',
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">
                                        {{ ucfirst($idea->estado) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('formatos.ideas-estudiante.show', $idea) }}"
                                           class="btn btn-sm btn-ghost-primary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('formatos.ideas-estudiante.edit', $idea) }}"
                                           class="btn btn-sm btn-ghost-secondary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form action="{{ route('formatos.ideas-estudiante.destroy', $idea) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Eliminar esta idea?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-ghost-danger">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No hay ideas registradas aún.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($ideas->hasPages())
                <div class="card-footer d-flex align-items-center">
                    {{ $ideas->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
