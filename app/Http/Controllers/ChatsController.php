<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatsController extends Controller
{
    const CHAT_NAME = 'New Chat';

    public function index()
    {
        return view('chats.index', ['chats' => Chat::latest()->get()]);
    }

    public function create()
    {
        return view('chats.create');
    }

    public function store(Request $request)
    {
        $chat = DB::transaction(function () use ($request) {
            $chat = Chat::create([
                'title' => static::CHAT_NAME,
            ]);

            $chat->messages()->create($request->validate([
                'content' => ['required'],
            ]));

            return $chat;
        });


        return to_route('chats.show', $chat)->with('chat_recently_created', true);
    }

    public function show(Chat $chat)
    {
        return view('chats.show', [
            'chat' => $chat,
        ]);
    }

    public function destroy(Chat $chat)
    {
        $chat->delete();

        return to_route('home');
    }
}
