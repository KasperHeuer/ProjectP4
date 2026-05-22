<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $chats = Chat::with(['sender', 'receiver'])
            ->where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->latest()
            ->get()
            ->map(function ($chat) use ($userId) {
                $otherUser = $chat->sender_id == $userId ? $chat->receiver : $chat->sender;

                $chat->initials = collect(explode(' ', $otherUser->name))
                    ->map(fn($word) => strtoupper($word[0]))
                    ->take(2)
                    ->implode('');

                $chat->otherUser = $otherUser;

                return $chat;
            })
            ->groupBy(fn($chat) => $chat->otherUser->id)
            ->map(fn($group) => $group->first())
            ->values();

        $chatUserIds = Chat::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->get()
            ->map(function ($chat) use ($userId) {
                return $chat->sender_id == $userId ? $chat->receiver_id : $chat->sender_id;
            })
            ->unique()
            ->values();

        $users = User::where('id', '!=', $userId)
            ->whereNotIn('id', $chatUserIds)
            ->get();

        return view('Home', compact('chats', 'users'));
    }

    public function startChat(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        return redirect("/chat/{$validatedData['user_id']}");
    }

    public function chat(int $user_id)
    {
        $userId = auth()->id();
        $otherUser = User::findOrFail($user_id);

        $messages = Chat::with(['sender', 'receiver'])
            ->where(function ($query) use ($user_id, $userId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $user_id);
            })
            ->orWhere(function ($query) use ($user_id, $userId) {
                $query->where('sender_id', $user_id)
                    ->where('receiver_id', $userId);
            })
            ->orderBy('created_at')
            ->get();

        $initials = collect(explode(' ', $otherUser->name))
            ->map(fn($word) => strtoupper($word[0]))
            ->take(2)
            ->implode('');

        $chats = Chat::with(['sender', 'receiver'])
            ->where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->latest()
            ->get()
            ->map(function ($chat) use ($userId) {
                $otherUser = $chat->sender_id == $userId ? $chat->receiver : $chat->sender;

                $chat->initials = collect(explode(' ', $otherUser->name))
                    ->map(fn($word) => strtoupper($word[0]))
                    ->take(2)
                    ->implode('');

                $chat->otherUser = $otherUser;

                return $chat;
            })
            ->groupBy(fn($chat) => $chat->otherUser->id)
            ->map(fn($group) => $group->first())
            ->values();

        return view('Chat', compact('messages', 'otherUser', 'initials', 'chats'));
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        Chat::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $validatedData['user_id'],
            'message' => $validatedData['message'],
        ]);

        return redirect("/chat/{$validatedData['user_id']}");
    }
}
