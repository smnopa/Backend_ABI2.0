@extends('tablar::page')

@section('title', 'Fichas de Propuesta')

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">

            <div class="col">
                <h2 class="page-title">
                    Fichas de Propuesta de Tema
                </h2>

                <p class="text-muted mb-0">
                    Propuestas de temas al banco de proyectos docentes
                </p>
            </div>

            <div class="col-auto ms-auto">
                <a href="{{ route('formatos.ficha-propuesta.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i>
                    Nueva Ficha
                </a>
            </div>

        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Listado de Fichas
                </h3>
            </div>

            <div class="table-responsive">
                <table class="table table-vcenter card-table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Tipo Investigación</th>
                            <th>Fecha Propuesta</th>
                            <th>Estado</th>
                            <th class="w-1">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($fichas as $ficha)
                            <tr>

                                <td>{{ $ficha->id }}</td>

                                <td>
                                    {{ $ficha->titulo_propuesta ?? '—' }}
                                </td>

                                <td>
                                    @switch($ficha->tipo_investigacion)
                                        @case('documental') Documental @break
                                        @case('experimental') Experimental @break
                                        @case('campo') De Campo @break
                                        @default —
                                    @endswitch
                                </td>

                                <td>
                                    {{ $ficha->fecha_propuesta?->format('d/m/Y') ?? '—' }}
                                </td>

                                <td>
                                    @php
                                        $badgeClass = match($ficha->estado) {
                                            'aprobada'  => 'bg-success',
                                            'rechazada' => 'bg-danger',
                                            default     => 'bg-warning text-dark',
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">
                                        {{ ucfirst($ficha->estado) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="btn-list flex-nowrap">

                                        <a href="{{ route('formatos.ficha-propuesta.show', $ficha) }}"
                                           class="btn btn-sm btn-primary">
                                            Ver
                                        </a>

                                        <a href="{{ route('formatos.ficha-propuesta.edit', $ficha) }}"
                                           class="btn btn-sm btn-warning">
                                            Editar
                                        </a>

                                        <form action="{{ route('formatos.ficha-propuesta.destroy', $ficha) }}"
                                              method="POST"
                                              style="display:inline-block;"
                                              onsubmit="return confirm('¿Desea eliminar esta ficha?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty

                            <tr>
                                <td colspan="6" class="text-center">
                                    No hay fichas registradas
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

            <div class="card-footer">
                {{ $fichas->links() }}
            </div>

        </div>

    </div>
</div>

@endsection
