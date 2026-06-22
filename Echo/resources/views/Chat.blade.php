<x-layout>

    <div class="flex h-screen">

        {{-- LEFT SIDEBAR --}}
        <aside class="relative w-64 border-r border-slate-800 bg-slate-900/50">

            <div class="p-6">
                <h1 class="text-4xl font-bold text-blue-400">
                    Echo
                </h1>

                <p class="text-sm text-slate-400">
                    Active Now
                </p>
            </div>

            <div class="px-3">

               <a
    href="/"
    class="mb-4 block rounded-lg bg-slate-800 px-4 py-3 text-sm font-medium text-white transition hover:bg-slate-700"
>
    💬 Chats
</a>

                <p class="mb-3 px-2 text-xs font-semibold tracking-widest text-slate-500">
                    RECENT
                </p>

                <div class="space-y-2">

                    @foreach ($chats as $chat)

                        <a
                            href="/chat/{{ $chat->otherUser->id }}"
                            class="block rounded-xl p-3 transition hover:bg-slate-800 {{ $chat->otherUser->id == $otherUser->id ? 'bg-slate-700' : '' }}"
                        >

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-200 font-semibold text-slate-800">
                                    {{ $chat->initials }}
                                </div>

                                <div class="min-w-0 flex-1">

                                    <div class="truncate text-sm font-medium text-white">
                                        {{ $chat->otherUser->name }}
                                    </div>

                                    <div class="truncate text-xs text-slate-400">
                                        {{ $chat->message }}
                                    </div>

                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

            {{-- User onderaan --}}
            <div class="absolute bottom-0 left-0 right-0 border-t border-slate-800 p-4">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-200 font-semibold text-slate-800">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>

                    <div class="text-sm text-white">
                        {{ Auth::user()->name }}
                    </div>

                </div>

            </div>

        </aside>

        {{-- MIDDLE CHAT --}}
        <section class="flex flex-1 flex-col">

            {{-- Chat header --}}
            <div class="flex items-center gap-3 border-b border-slate-800 bg-slate-900/40 p-4">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-200 font-bold text-slate-800">
                    {{ $initials }}
                </div>

                <div>
                    <h2 class="font-semibold text-white">
                        {{ $otherUser->name }}
                    </h2>
                </div>

            </div>

            {{-- Messages --}}
            <div class="flex-1 overflow-y-auto p-6">

                @forelse ($messages as $message)

                    <div class="mb-4">

                        @if($message->sender_id === Auth::id())

                            <div class="flex justify-end">

                                <div class="max-w-md rounded-2xl bg-blue-600 px-4 py-3 text-white">
                                    {{ $message->message }}
                                </div>

                            </div>

                        @else

                            <div class="flex justify-start">

                                <div class="max-w-md rounded-2xl bg-slate-800 px-4 py-3 text-white">
                                    {{ $message->message }}
                                </div>

                            </div>

                        @endif

                    </div>

                @empty

                    <div class="text-center text-slate-400">
                        No messages yet. Start the conversation!
                    </div>

                @endforelse

            </div>

            {{-- Message box --}}
            <div class="border-t border-slate-800 p-4">

                <form action="{{ url()->current() }}" method="POST" class="flex gap-3">
                    @csrf

                    <input
                        type="hidden"
                        name="user_id"
                        value="{{ $otherUser->id }}"
                    >

                    <input
                        type="text"
                        name="message"
                        placeholder="Type a message..."
                        class="flex-1 rounded-xl border border-slate-700 bg-slate-800 px-4 py-3 text-white outline-none"
                    >

                    <button
                        type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white hover:bg-blue-500"
                    >
                        ➜
                    </button>

                </form>

            </div>

        </section>

        {{-- RIGHT PROFILE --}}
        <aside class="w-64 border-l border-slate-800 bg-slate-900/50">

            <div class="flex flex-col items-center pt-10">

                <div
                    class="flex h-28 w-28 items-center justify-center rounded-full bg-slate-200 text-4xl font-bold text-slate-800">
                    {{ $initials }}
                </div>

                <h2 class="mt-6 text-xl font-semibold text-white">
                    {{ $otherUser->name }}
                </h2>

            </div>

        </aside>

    </div>

</x-layout>