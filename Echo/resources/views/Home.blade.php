<x-layout>

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="relative w-64 border-r border-slate-800 bg-slate-900/40">

            <div class="p-6">
                <h1 class="text-4xl font-bold text-blue-400">
                    Echo
                </h1>

                <p class="text-sm text-slate-400">
                    Active Now
                </p>
            </div>

            <div class="px-3">

                <div class="mb-4 rounded-lg bg-slate-800 px-4 py-3 text-sm font-medium text-white">
                    💬 Chats
                </div>

                <div class="space-y-2">

                    @foreach($chats as $chat)
                        <a
                            href="/chat/{{ $chat->otherUser->id }}"
                            class="block rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-slate-800 hover:text-white"
                        >
                            {{ $chat->otherUser->name }}
                        </a>
                    @endforeach

                </div>

            </div>

            {{-- User onderaan --}}
            <div class="absolute bottom-0 left-0 right-0 border-t border-slate-800 p-4">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-200 text-sm font-bold text-slate-800">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>

                    <div>
                        <p class="text-sm font-medium text-white">
                            {{ Auth::user()->name }}
                        </p>
                    </div>

                </div>

            </div>

        </aside>

        {{-- Main --}}
        <main class="flex-1 p-8">

            <div class="mb-8 flex items-center justify-between">

                <div>
                    <h2 class="text-4xl font-bold text-white">
                        Recent Chats
                    </h2>

                    <p class="text-blue-400">
                        You have {{ $chats->count() }} chats
                    </p>
                </div>

                <form action="{{ url()->current() }}" method="POST" class="flex gap-3">
                    @csrf

                    <select
                        name="user_id"
                        class="rounded-full border border-slate-700 bg-slate-800 px-4 py-2 text-white"
                    >
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>

                    <button
                        type="submit"
                        class="rounded-full bg-blue-400 px-6 py-2 text-sm font-semibold text-slate-900 transition hover:bg-blue-300"
                    >
                        + NEW MESSAGE
                    </button>
                </form>

            </div>

            @if ($chats->isEmpty())

                <div class="rounded-xl border border-slate-800 bg-slate-900/40 p-6 text-slate-400">
                    No chats yet.
                </div>

            @endif

            <div class="space-y-4">

                @foreach ($chats as $chat)

                    <a
                        href="/chat/{{ $chat->otherUser->id }}"
                        class="block rounded-xl border border-slate-800 bg-slate-900/50 p-4 transition hover:border-blue-500"
                    >

                        <div class="flex items-center gap-4">

                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-200 font-semibold text-slate-800">
                                {{ $chat->initials }}
                            </div>

                            <div class="flex-1">

                                <div class="flex items-center justify-between">

                                    <h3 class="font-semibold text-white">
                                        {{ $chat->otherUser->name }}
                                    </h3>

                                    <span class="text-xs text-slate-400">
                                        {{ $chat->updated_at->diffForHumans() }}
                                    </span>

                                </div>

                                <p class="mt-1 text-sm text-slate-400">
                                    {{ $chat->message }}
                                </p>

                            </div>

                        </div>

                    </a>

                @endforeach

            </div>

        </main>

    </div>

</x-layout>