@extends('admin.admin')

@section('title', 'Toutes les options')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Ajouter une option</a>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th>N°</th>
            <th>Nom</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $ids = 0;
            @endphp

            @foreach ($options as $option)
                <tr>
                    <th scope="row">{{ $ids += 1 }}</th>
                    <td>{{ $option->name }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-primary">Editer</a>
                            &nbsp;
                            <form action="{{ route('admin.option.destroy', $option) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick=" return confirm('Voulez-vous vraiment supprimer l\'option {{ $option->name }} ?')">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{ $options->links() }}

@endsection