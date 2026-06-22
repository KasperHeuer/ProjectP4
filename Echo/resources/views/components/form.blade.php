@props(['action' => 'Submit'])

<form action="{{ url()->current() }}" method="POST">
    @csrf
    {{ $slot }}
    <button
    type="submit"
    class="mt-6 w-full rounded-lg bg-blue-600 py-3 font-medium text-white transition hover:bg-blue-500"
>
    {{ $action }}
</button>
</form>