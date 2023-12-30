<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Administraton</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>
<body>

  @php
    $routeName = request()->route()->getName()
  @endphp

  <nav class="navbar navbar-expand-lg navbar-light bg-primary mb-3">
    <a class="navbar-brand text-white" href="#">Agence</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        @auth
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a @class(['nav-link text-white', 'active' => str_starts_with($routeName, 'property.')], 'text-white') href="{{ route('admin.property.index') }}">Gérer les biens</a>
              </li>
              <li class="nav-item">
                  <a @class(['nav-link text-white', 'active' => str_starts_with($routeName, 'option.')], 'text-white') href="{{ route('admin.option.index') }}">Gérer les options</a>
              </li>
          </ul>
          <div class="ml-auto">
              {{-- @auth --}}
                  <div class="d-flex align-items-center">
                      <span class="text-white rounded-pill p-2 mx-1 bg-secondary">{{ Auth::user()->name }}</span>
                      <form class="nav-item ml-2" action="{{ route('logout') }}" method="post">
                          @method('delete')
                          @csrf
                          <button class="btn btn-light text-dark">Se déconnecter</button>
                      </form>
                  </div>
              {{-- @endauth --}}
          </div>
        @endauth
    </div>
  </nav>

  <div class="container mt-3">

    @include('shared.flash')

    @yield('content')

  </div>

  <script src="{{ asset('jquery.min.js') }}"></script>
  <script src="{{ asset('bootstrap.min.js') }}"></script>
</body>
</html>