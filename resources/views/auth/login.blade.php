@extends('base')

@section('title', 'Se connecter')

@section('content')

<div class="container mt-4">

    @include('shared.flash')

    <form method="post">

        @csrf
        <h1>@yield('title')</h1>
    
        <div class="mb-3">
            @include('shared.input', ['type' => 'email', 'label' => 'Email', 'name' => 'email'])
        </div>
        <div class="mb-3">
            @include('shared.input', ['type' => 'password', 'label' => 'Mot de passe', 'name' => 'password'])
        </div>
        <div class="mb-3">
            <a class="" href="">S'inscrire</a>
        </div>
    
        <button type="submit" class="btn btn-primary btn-block">@yield('title')</button>
    
    </form>
</div>


@endsection