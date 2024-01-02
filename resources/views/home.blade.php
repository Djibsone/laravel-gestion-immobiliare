@extends('base')

@section('content')
    {{-- <x-alert type="danger"></x-alert> --}}
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence lorem ipsun</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam tempore consequuntur ducimus aliquid! Doloribus nobis distinctio voluptas voluptatibus vero voluptates.</p>
        </div>
    </div>

    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row my-3">
            @foreach ($properties as $property)
                @include('property.card')
            @endforeach
        </div>
    </div>
@endsection