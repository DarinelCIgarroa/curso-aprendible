@extends('layout')

@section('title', 'Edit Project')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">

            <form class="bg-white shadow rounded py-3 px-4 is-invalid" action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                <h1 class="display-4">Edit project</h1>
                @if ($project->image)
                    <img class="card-img-top" src="/storage/{{ $project->image }}" alt="{{ $project->title }}">
                @endif
                <hr>
                @method('PATCH')
                @include('projects._form', ['btn' => 'edit'])
            </form>

        </div>
    </div>
</div>
@endsection
