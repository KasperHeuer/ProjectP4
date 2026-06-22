<x-layout>

    <div class="flex min-h-[85vh] items-center justify-center px-4">

        <div class="w-full max-w-sm">

            <div class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900/50 shadow-2xl backdrop-blur">

                {{-- Blauwe header --}}
                <div class="bg-blue-600 py-4 text-center">
                    <h1 class="text-3xl font-bold text-white">
                        Echo
                    </h1>

                    <p class="mt-2 text-sm text-blue-100">
                        Experience seamless connectivity
                    </p>
                </div>

                {{-- Form --}}
                <div class="p-4">

                    <h2 class="mb-1 text-2xl font-semibold text-white">
                        Create your account
                    </h2>

                    <p class="mb-2 text-sm text-slate-400">
                        Join the community and start chatting today.
                    </p>

                    @if (session('error'))
                        <div class="mb-4 rounded-lg border border-red-500/20 bg-red-500/10 p-3 text-red-400">
                            {{ session('error') }}
                        </div>
                    @endif

                    <x-form action="Create Account">

                        <div class="space-y-5">

                            <x-input
                                name="name"
                                label="Full Name"
                                placeholder="Enter your full name"
                            />

                            <x-input
                                name="email"
                                type="email"
                                label="Email Address"
                                placeholder="name@company.com"
                            />

                            <x-input
                                name="password"
                                type="password"
                                label="Password"
                                placeholder="Enter your password"
                            />

                            <x-input
                                name="password_confirmation"
                                type="password"
                                label="Confirm Password"
                                placeholder="Confirm your password"
                            />

                        </div>

                    </x-form>

                </div>

            </div>

            <p class="mt-6 text-center text-sm text-slate-400">
                Already have an account?
                <a href="/login" class="text-blue-500 hover:text-blue-400">
                    Log in
                </a>
            </p>

        </div>

    </div>

</x-layout>