@extends('layout')

@section('title', 'projects')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        @isset($category)
            <h1 class="display-4 mb-0">{{ $category->name }}</h1>
            @else
                <h1 class="display-4 mb-0">Projects</h1>
        @endisset

        @include('message.session-status')
        @can('create', $newProject) {{-- Puede crear un nuevo proyecto --}}
            <strong>
                <a class="btn btn-primary" href="{{ route('projects.create') }}">Create new project</a>
            </strong>
        @endcan
    </div>

    <p class="lead text-secondary">
        Proyectos realizados Lorem ipsum dolor sit amet. Quia ab nihil omnis.
    </p>

    <div class="d-flex flex-wrap justify-content-between align-items-start">
        @foreach($projects as $project)
        <div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">
            @if($project->image)
            <img class="card-img-top" style="height: 150px; object-fit: cover" src="/storage/{{ $project->image }}"
                alt="{{ $project->title }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                </h5>
                <h6 class="card-subtitle">{{ $project->created_at->format('d/m/Y')}}</h6>
                <p class="card-text text-truncate">{{ $project->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('projects.show', $project) }}" class="btn btn-primary btn-sm">Ver más...</a>
                    @if ($project->category_id)
                        <a href="{{ route('categories.show', $project->category) }}" class="badge bg-dark">{{ $project->category->name }}</a>
                    @endif
                </div>
            </div>

        </div>

        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $projects->links() }}
    </div>
    @can('listDeleteProjects')

    <ul class="list-group">
        @foreach ($deleteProjects as $deleteProject)
            @if ($deleteProjects)
                <h4>Papelera</h4>
            @endif

            <li class="list-group-item">{{ $deleteProject->title }}</li>

            @can('restore', $deleteProject)
            <form action="{{ route('projects.restore', $deleteProject) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <button class="btn btn-sm btn-success">Restaurar</button>
            </form>
            @endcan
            @can('forceDelete', $deleteProject)
                <form action="{{ route('projects.forceDelete', $deleteProject) }}"
                    onsubmit="return confirm('¿Estas seguro de eliminar permanentemente el proyecto?')"
                    method="POST"
                    class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btb btn-sm btn-danger">Eliminar</button>
                </form>
            @endcan
        @endforeach
    </ul>
    @endcan
    @endsection
