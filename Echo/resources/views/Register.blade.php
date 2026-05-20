<x-layout>
    <h1>Register</h1>
    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <x-form>
        <x-input name="name" placeholder="Enter your full name" label="Full Name" />
        <x-input name="email" type="email" placeholder="name@company.com" label="Email" />
        <x-input name="password" type="password" placeholder="Password" label="Password" />
        <x-input name="password_confirmation" type="password" placeholder="Confirm Password" label="Confirm Password" />
    </x-form>
</x-layout>