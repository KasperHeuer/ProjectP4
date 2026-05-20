@props(['action' => 'Submit'])

<form action="{{ url()->current() }}" method="POST">
    @csrf
    {{ $slot }}
    <button type="submit">{{ $action }}</button>
</form>