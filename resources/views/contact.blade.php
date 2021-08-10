@extends('layout')

@section('title','contact')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
           {{-- {{ var_dump($errors->any()) }} --}}
           @include('message.session-status')
            <form class="bg-white shadow rounded py-3 px-4 is-invalid" action="{{ route('contact') }}" method="POST">
                @csrf
                <h1 display-4>Contact</h1>
                <hr>
                <label for="name">Nombre:</label>

                <div class="form-group">

                    <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
                        id="name"
                        type="text"
                        name="name"
                        placeholder="enter your name"
                        value="{{ old('name') }}">

                    @error('name')

                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <label for="email">Email:</label>

                <div class="form-group">

                    <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
                        id="email"
                        type="email"
                        name="email"
                        placeholder="enter your email"
                        value="{{ old('email') }}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>


                <label for="subject">Asunto:</label>

                <div class="from-group">

                    <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
                        type="text"
                        id="subject"
                        name="subject"
                        placeholder="enter your sucject"
                        value="{{ old('subject') }}">

                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="text">Contenido:</label>

                <div class="from-group">

                <textarea class="form-control bg-light shadow-sm @error('email') is-invalid @else border-2 @enderror"
                    id="text"
                    name="text"
                    cols="30"
                    placeholder="enter a description"
                    rows="5"
                    value="{{ old('content') }}"></textarea>

                @error('text')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <br>
                <button class="btn btn-primary btn-lg btn-block ">Enviar</button>


            </form>
        </div>
    </div>

</div>
@endsection

