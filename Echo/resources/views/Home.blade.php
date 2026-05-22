<x-layout>
    <h1>Home</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <x-form action="Start chat">
        <select name="user_id" id="user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </x-form>
    @foreach ($chats as $chat)
        <hr>
        <a href="/chat/{{ $chat->otherUser->id }}">
            <div class="">{{ $chat->initials }}</div>
            <div>
                <b>{{ $chat->otherUser->name }}</b>
                <p>{{ $chat->updated_at }}</p>
                <p>{{ $chat->message }}</p>
            </div>
        </a>
    @endforeach
</x-layout>