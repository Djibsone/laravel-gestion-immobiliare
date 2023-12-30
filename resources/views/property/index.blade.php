@extends('base')

@section('title', 'Tous nos biens')

@section('content')

    <div class="bg-light p-5 mb-4 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" class="form-control m-1" name="surface" value="{{ $input['surface'] ?? '' }}" placeholder="Surface minimale">
            <input type="number" class="form-control m-1" name="rooms" value="{{ $input['rooms'] ?? '' }}" placeholder="Nombre de pièce min">
            <input type="number" class="form-control m-1" name="price" value="{{ $input['price'] ?? '' }}" placeholder="Budget max">
            <input type="text" class="form-control m-1" name="title" value="{{ $input['title'] ?? '' }}" placeholder="Mot clef">
            <button class="btn btn-primary btn-sm flex-grow-0 m-1">
                Rechercher
            </button>
        </form>
    </div>

    <div class="container">
        {{-- <h2>Nos derniers biens</h2> --}}
        <div class="row my-3">
            @forelse ($properties as $property)
                @include('property.card')

                @empty

                <div class="col">
                    Aucun bien ne correspond à votre recherche...
                </div>
                
            @endforelse
        </div>

        <div class="my-4">
            {{ $properties->links() }}
        </div>
        
    </div>

@endsection