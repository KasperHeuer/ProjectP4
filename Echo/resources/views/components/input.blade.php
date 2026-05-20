{{-- Input component --}}
@props(['name', 'type' => 'text', 'placeholder' => '', 'value' => ''])

<input
    required
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $name }}"
    value="{{ old($name, $value ?? '') }}"
    placeholder="{{ $placeholder }}"
    min="1"
    class="{{ $errors->has($name) ? 'border-red-500' : 'border-gray-300' }}"
>

@error($name)
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
@enderror