@extends('tablar::page')

@section('title', 'Ideas de Estudiante')

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Ideas de Estudiante</h2>
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

        {{-- MENSAJE DE ÉXITO --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de Ideas</h3>
            </div>

            <div class="table-responsive">
                <table class="table table-vcenter table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Docente</th>
                            <th>Concepto</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ideas as $idea)
                            <tr>
                                <td>{{ $idea->id }}</td>

                                <td>
                                    <strong>{{ $idea->titulo }}</strong>
                                </td>

                                <td>{{ $idea->docente ?? '—' }}</td>

                                <td>
                                    @if($idea->concepto === 'aprobada')
                                        <span class="badge bg-success">Aprobada</span>
                                    @elseif($idea->concepto === 'no_aprobada')
                                        <span class="badge bg-danger">No aprobada</span>
                                    @else
                                        <span class="badge bg-secondary">Sin definir</span>
                                    @endif
                                </td>

                                <td class="text-end">
                                    <div class="btn-list justify-content-end">

                                        {{-- VER --}}
                                        <a href="{{ route('formatos.ideas-estudiante.show', $idea) }}"
                                           class="btn btn-icon btn-primary btn-sm"
                                           title="Ver">
                                            <i class="ti ti-eye"></i>
                                        </a>

                                        {{-- EDITAR --}}
                                        <a href="{{ route('formatos.ideas-estudiante.edit', $idea) }}"
                                           class="btn btn-icon btn-warning btn-sm"
                                           title="Editar">
                                            <i class="ti ti-edit"></i>
                                        </a>

                                        {{-- ELIMINAR --}}
                                        <form action="{{ route('formatos.ideas-estudiante.destroy', $idea) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Seguro que deseas eliminar esta idea?');">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-icon btn-danger btn-sm" title="Eliminar">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    No hay ideas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINACIÓN --}}
            <div class="card-footer">
                {{ $ideas->links() }}
            </div>
        </div>
    </div>
</div>

@endsection