{{-- <div class="col-md-3 mb-4">
    <div class="card carte rounded">
        @if ($property->file_path)
            <div class="p-2">
                <img src="{{ asset('storage/' . $property->file_path) }}" class="card-img-top custom-card-image img-fluid" alt="Image Téléchargée">
            </div>
        @endif
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('biens.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>
            </h5>
            <p class="card-text">{{ $property->surface }} m² - {{ $property->city }} ({{ $property->postal_code }})</p>
            <div class="text-primary fw-bold d-flex justify-content-between">
                {{ number_format($property->price, thousands_separator: ' ') }} XOF
            </div>
        </div>
    </div>
</div> --}}

<div class="col-md-3 mb-4">
    <div class="card-deck">
        <div class="card">
            @if ($property->file_path)
                <div class="p-2">
                    <img src="{{ asset('storage/' . $property->file_path) }}" class="card-img-top custom-card-image img-fluid" alt="Image Téléchargée">
                </div>
            @endif
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('biens.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a></h5>
            <p class="card-text">{{ $property->surface }} m² - {{ $property->city }} ({{ $property->postal_code }})</p>
            <p class="card-text">
                <small class="text-muted">
                    {{ number_format($property->price, thousands_separator: ' ') }} XOF
                </small>
            </p>
        </div>
        </div>
    </div>
</div>