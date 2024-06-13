<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatMessagesController extends Controller
{
    public function store(Request $request, Chat $chat)
    {
        $chat->messages()->create($request->validate([
            'content' => ['required'],
        ]));

        return back();
    }
}
