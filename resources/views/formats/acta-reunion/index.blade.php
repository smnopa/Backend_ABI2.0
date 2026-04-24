@extends('tablar::page')

@section('title', 'Actas de Reunión')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Actas de Reunión</h2>
                <p class="text-muted mb-0">Registro de reuniones de proyectos de grado.</p>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('formatos.acta-reunion.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Nueva Acta
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
                <h3 class="card-title">Listado de Actas</h3>
            </div>
            <div class="card-body border-bottom py-3">
                {{-- TODO: Agregar filtros de búsqueda por fecha, proyecto, etc. --}}
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha de Reunión</th>
                            <th>Lugar</th>
                            {{-- TODO: Agregar columna Proyecto cuando esté disponible --}}
                            <th>Elaborado por</th>
                            <th class="w-1">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($actas as $acta)
                            <tr>
                                <td>{{ $acta->id }}</td>
                                <td>{{ $acta->fecha_reunion?->format('d/m/Y') }}</td>
                                <td>{{ $acta->lugar ?? '—' }}</td>
                                <td>{{ $acta->elaborado_por ?? '—' }}</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('formatos.acta-reunion.show', $acta) }}"
                                           class="btn btn-sm btn-ghost-primary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('formatos.acta-reunion.edit', $acta) }}"
                                           class="btn btn-sm btn-ghost-secondary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form action="{{ route('formatos.acta-reunion.destroy', $acta) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Eliminar esta acta?')">
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
                                    No hay actas registradas aún.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($actas->hasPages())
                <div class="card-footer d-flex align-items-center">
                    {{ $actas->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
