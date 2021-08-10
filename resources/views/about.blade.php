@extends('layout')

@section('title','About')

@section('content')
<div class="container">
    <div class="row">
        <div class="cal-12 col-lg-6">
            <h1 class="display-4 text-primary">Quien soy</h1>
            <p class="lead text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Dolorem consectetur ipsum sunt quo repellat. Assumenda, modi quisquam. Nam excepturi id incidunt
                consectetur dolorum, exercitationem quaerat sint quod qui? Deleniti, voluptas?
            </p>
                <a class="btn btn-lg btn-block btn-primary" href="{{ route('contact') }}">Contáctame</a>
                <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('projects.index') }}">Portafolio</a>
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-4 text-primary">Quien soy</h1>
            <p class="lead text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Dolorem consectetur ipsum sunt quo repellat. Assumenda, modi quisquam. Nam excepturi id incidunt
                consectetur dolorum, exercitationem quaerat sint quod qui? Deleniti, voluptas?
            </p>
                <a class="btn btn-lg btn-block btn-primary" href="{{ route('contact') }}">Contáctame</a>
                <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('projects.index') }}">Portafolio</a>
        </div>
    </div>
</div>
@endsection
