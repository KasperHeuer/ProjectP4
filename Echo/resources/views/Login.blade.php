<x-layout>

    <div class="flex min-h-[85vh] items-center justify-center px-4">

        <div class="w-full max-w-sm">

            <div class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900/50 shadow-2xl backdrop-blur">

                {{-- Blauwe header --}}
                <div class="bg-blue-600 py-8 text-center">
                    <h1 class="text-3xl font-bold text-white">
                        Echo
                    </h1>

                    <p class="mt-2 text-sm text-blue-100">
                        Connect instantly, communicate effortlessly.
                    </p>
                </div>

                {{-- Form --}}
                <div class="p-6">

                    <h2 class="mb-2 text-2xl font-semibold text-white">
                        Welcome Back
                    </h2>

                    <p class="mb-6 text-sm text-slate-400">
                        Sign in to continue chatting.
                    </p>

                    @if (session('success'))
                        <div class="mb-4 rounded-lg border border-green-500/20 bg-green-500/10 p-3 text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 rounded-lg border border-red-500/20 bg-red-500/10 p-3 text-red-400">
                            {{ session('error') }}
                        </div>
                    @endif

                    <x-form action="Login">

                        <div class="space-y-5">

                            <div>
                                <x-input
                                    name="name"
                                    label="Name"
                                    placeholder="Enter your name"
                                />
                            </div>

                            <div>
                                <x-input
                                    name="password"
                                    type="password"
                                    label="Password"
                                    placeholder="Enter your password"
                                />
                            </div>

                        </div>

                    </x-form>

                </div>

            </div>

            <p class="mt-6 text-center text-sm text-slate-400">
                Don't have an account?
                <a href="/register" class="text-blue-500 hover:text-blue-400">
                    Register now
                </a>
            </p>

        </div>

    </div>

</x-layout>