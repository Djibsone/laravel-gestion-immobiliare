@php
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $multiple ??= false;
    $label ??= ucfirst($name);
@endphp

<div @class(['form-group', $class])>

    <label for="{{ $name }}">{{ $label }}</label>

    @if ($type != 'textarea')
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}" multiple="{{ $multiple }}">
    @else
        <textarea class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}">{{ old($name, $value) }}</textarea> 
    @endif
    
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    
</div>