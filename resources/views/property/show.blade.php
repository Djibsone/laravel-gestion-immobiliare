@extends('base')

@section('title', $property->title)

@section('content')
    
{{-- <div class="container">
    <h1>{{ $property->title }}</h1>
    <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>

    <div class="text-primary fw-bold" style="font-size: 4rem">
        {{ number_format($property->price, thousands_separator: ' ') }} XOF
    </div>

    <hr>

    <div class="mt-4">
        <h4>Interessé par ce bien ?</h4>

        @include('shared.flash')

        <form action="{{ route('biens.contact', $property) }}" method="post" class="vstack gap-3">
            @csrf
            <div class="row">
                @include('shared.input', ['class' => 'col', 'label' => 'Prénom', 'name' => 'firstname'])
                @include('shared.input', ['class' => 'col', 'label' => 'Nom', 'name' => 'lastname'])
            </div>
            <div class="row">
                @include('shared.input', ['class' => 'col', 'label' => 'Téléphone', 'name' => 'phone'])
                @include('shared.input', ['type' => 'email', 'class' => 'col', 'label' => 'Email', 'name' => 'email'])
            </div>
            @include('shared.input', ['type' => 'textarea', 'label' => 'Votre message', 'name' => 'message'])
            <div>
                <button class="btn btn-primary">Nous contacter</button>
            </div>
        </form>
    </div>

    <div class="mt-4">
        <p>{!! nl2br($property->description) !!}</p>
        <div class="row">
            <div class="col-8">
                <h2>Caractéristique</h2>
                <table class="table table-striped">
                    <tr>
                        <td>Surface habitable</td>
                        <td>{{ $property->surface }} m²</td>
                    </tr>
                    <tr>
                        <td>Pièces</td>
                        <td>{{ $property->rooms }}</td>
                    </tr>
                    <tr>
                        <td>Chambres</td>
                        <td>{{ $property->bedrooms }}</td>
                    </tr>
                    <tr>
                        <td>Etage</td>
                        <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                    </tr>
                    <tr>
                        <td>Localisation</td>
                        <td>
                            {{ $property->address }}<br/>
                            {{ $property->city }} {{ $property->postal_code }}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-4">
                <h2>Spécificités</h2>
                <ul class="list-group">
                    @foreach ($property->options as $option)
                        <li class="list-group-item">{{ $option->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    {{-- @foreach ($property->images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $image->file_path) }}" class="d-block w-100" alt="Image {{ $key + 1 }}">
                        </div>
                    @endforeach --}}
                    @if ($property->file_path)
                        <div class="p-2">
                            <img src="{{ asset('storage/' . $property->file_path) }}" class="card-img-top custom-card-image img-fluid" alt="Image Téléchargée">
                        </div>
                    @endif
                </div>
                {{-- <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button> --}}
            </div>
        </div>
        <div class="col-md-6">
            <h1>{{ $property->title }}</h1>
            <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m²</h2>
            <div class="text-primary fw-bold" style="font-size: 4rem">
                {{ number_format($property->price, thousands_separator: ' ') }} XOF
            </div>
            <hr>
            <div class="mt-4">
                <h4>Interessé par ce bien ?</h4>
        
                @include('shared.flash')
        
                <form action="{{ route('biens.contact', $property) }}" method="post" class="vstack gap-3">
                    @csrf
                    <div class="row">
                        {{-- <x-input class="col" name="firstname" label="Prenom"/> --}}
                        @include('shared.input', ['class' => 'col', 'label' => 'Prénom', 'name' => 'firstname'])
                        @include('shared.input', ['class' => 'col', 'label' => 'Nom', 'name' => 'lastname'])
                    </div>
                    <div class="row">
                        @include('shared.input', ['class' => 'col', 'label' => 'Téléphone', 'name' => 'phone'])
                        @include('shared.input', ['type' => 'email', 'class' => 'col', 'label' => 'Email', 'name' => 'email'])
                    </div>
                    @include('shared.input', ['type' => 'textarea', 'label' => 'Votre message', 'name' => 'message'])
                    <div>
                        <button class="btn btn-primary">Nous contacter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <p>{!! nl2br($property->description) !!}</p>
        <div class="row">
            <div class="col-8">
                <h2>Caractéristique</h2>
                <table class="table table-striped">
                    <tr>
                        <td>Surface habitable</td>
                        <td>{{ $property->surface }} m²</td>
                    </tr>
                    <tr>
                        <td>Pièces</td>
                        <td>{{ $property->rooms }}</td>
                    </tr>
                    <tr>
                        <td>Chambres</td>
                        <td>{{ $property->bedrooms }}</td>
                    </tr>
                    <tr>
                        <td>Etage</td>
                        <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                    </tr>
                    <tr>
                        <td>Localisation</td>
                        <td>
                            {{ $property->address }}<br/>
                            {{ $property->city }} {{ $property->postal_code }}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-4">
                <h2>Spécificités</h2>
                <ul class="list-group">
                    @foreach ($property->options as $option)
                        <li class="list-group-item">{{ $option->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>


@endsection