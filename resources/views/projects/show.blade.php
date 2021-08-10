
@extends('layout')

@section('title','Portafolio - ' . $project->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-8 mx-auto">
                @include('message.session-status')
                @if ($project->image)
                    <img class="card-img-top"  style="height: 400px; object-fit: cover" src="/storage/{{ $project->image }}" alt="{{ $project->title }}">
                @endif
                <div class="bg-whithe p-5 shadow rounded">
                    <h1 class="display-6">{{ $project->title }}</h1>
                    @if ($project->category_id)
                        <a href="{{ route('categories.show', $project->category) }}" class="badge bg-dark">{{ $project->category->name }}</a>
                    @endif
                    <p class="text-secondary">Descripcion :     {{ $project->description }}</p>
                    <p class="text-black-50">Fecha:             {{ $project->created_at->diffForHumans() }}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('projects.index') }}">To back</a>
                            @auth
                                <div class="btn-group btn-group-sm">
                                    @can('update', $project)
                                        <a class="btn btn-primary" href="{{ route('projects.edit', $project) }}">Edit project</a>
                                    @endcan
                                    @can('delete', $project)
                                        <a class="btn btn-danger" href="#"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-project').submit();">Delete
                                        </a>
                                    @endcan
                                </div>
                                    @can('delete', $project)
                                    <form id="delete-project" class="d-none" action="{{ route('projects.destroy', $project) }}" method="POST">
                                        @csrf @method('DELETE')
                                    </form>
                                    @endcan
                            @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
