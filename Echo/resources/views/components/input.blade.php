@props([
    'name',
    'label' => '',
    'type' => 'text',
    'placeholder' => '',
    'value' => ''
])

<div class="w-full">
    @if($label)
        <label for="{{ $name }}" class="mb-2 block text-sm font-medium text-slate-300">
            {{ $label }}
        </label>
    @endif

    <input
        required
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value ?? '') }}"
        placeholder="{{ $placeholder }}"
        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-3 text-white placeholder-slate-400 focus:border-blue-500 focus:outline-none"
    >

    @error($name)
        <p class="mt-1 text-sm text-red-500">
            {{ $message }}
        </p>
    @enderror
</div>