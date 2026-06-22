<x-layout>

    <div class="flex min-h-[85vh] items-center justify-center px-4">

        <div class="w-full max-w-md">

            {{-- Logo --}}
            <div class="mb-8 text-center">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-600">
                    💬
                </div>

                <h1 class="text-3xl font-bold text-blue-500">
                    Echo
                </h1>

                <p class="mt-2 text-sm text-slate-400">
                    Connect instantly, communicate effortlessly.
                </p>
            </div>

            {{-- Card --}}
            <div
                class="rounded-2xl border border-slate-800 bg-slate-900/50 p-8 shadow-2xl backdrop-blur">

                <h2 class="mb-6 text-center text-2xl font-semibold">
                    Welcome Back
                </h2>

                @if (session('success'))
                    <div class="mb-4 rounded-lg bg-green-500/10 border border-green-500/20 p-3 text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 rounded-lg bg-red-500/10 border border-red-500/20 p-3 text-red-400">
                        {{ session('error') }}
                    </div>
                @endif

                <x-form action="Login">

                    <div class="space-y-5">

                        <x-input
                            name="name"
                            label="Name"
                            placeholder="Enter your name"
                        />

                        <x-input
                            name="password"
                            type="password"
                            label="Password"
                            placeholder="Enter your password"
                        />

                    </div>

                </x-form>

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