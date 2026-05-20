<x-layout>
    <h1>Login</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <x-form>
        <x-input name="name" placeholder="Enter your name" label="Name" />
        <x-input name="password" type="password" placeholder="Enter your password" label="Password" />
    </x-form>
</x-layout>