<x-layout>
    <div>
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
    </div>
    <div>
        <h1>{{ $initials }}</h1>
        <h1>{{ $otherUser->name }}</h1>
    </div>

    <div>
        @forelse ($messages as $message)
            <div>
                <hr>
                <span>{{ $message->sender->name }}</span>
                <p>{{ $message->message }}</p>
            </div>
        @empty
            <p>No messages yet. Start the conversation!</p>
        @endforelse
    </div>

    <x-form action="send">
        <x-input type="hidden" name="user_id" value="{{ $otherUser->id }}" />
        <x-input name="message" placeholder="Type your message here..." label="Message" />
    </x-form>
</x-layout>