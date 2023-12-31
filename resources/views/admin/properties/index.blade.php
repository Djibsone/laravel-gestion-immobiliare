@extends('admin.admin')

@section('title', 'Tous les biens')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter un bien</a>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th>N°</th>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $ids = 0;
            @endphp

            @foreach ($properties as $property)
                <tr>
                    <th scope="row">{{ $ids += 1 }}</th>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->surface }} m²</td>
                    <td>{{ number_format($property->price, thousands_separator: ' ') }}</td>
                    <td>{{ $property->city }}</td>
                    <td>
                        <div class="d-flex">
                            {{-- <div class="d-flex gap-2 w-100 justify-content-end"> --}}
                            <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-primary">Editer</a>
                            &nbsp;
                            @can('delete', $property)
                                <form action="{{ route('admin.property.destroy', $property) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick=" return confirm('Voulez-vous vraiment supprimer le bien {{ $property->title }} ?')">Supprimer</button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $properties->links() }}

@endsection