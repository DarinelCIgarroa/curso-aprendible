@extends('layout')

@section('title', 'Create Project')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 col-sm-10 col-lg-6 mx-auto py-5">
            @include('message.session-status')
            <form class="bg-white py-3 px-4 shadow rounded" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                {{-- {{ dd($categories) }} --}}
                <h1 display-4>New project</h1>
                <hr>
                @include('projects._form',['btn' => 'Save'])
            </form>

        </div>
    </div>
</div>

@endsection
