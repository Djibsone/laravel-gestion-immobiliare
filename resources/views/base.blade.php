<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | MonAgence</title>
    
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
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
    @guest
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a href="{{ route('biens.index') }}" @class(['nav-link text-white', 'active' => str_contains($routeName, 'property.')], 'text-white')>Biens</a>
              </li>
          </ul>
          <div class="ml-auto">
            <div class="d-flex align-items-center">
                @if (str_starts_with($routeName, 'auth.login'))
                  <a class="text-white" href="">S'inscrire</a>
                @else
                  <a class="text-white" href="{{ route('login') }}">Se connecter</a>
                @endif
            </div>
          </div>
      </div>
    @endguest
  </nav>

  @yield('content')

  <script src="{{ asset('jquery.min.js') }}"></script>
  <script src="{{ asset('bootstrap.min.js') }}"></script>
</body>
</html>