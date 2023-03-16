<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatMessage;
use App\Events\SendMessage;

class ChatController extends Controller
{
    public function fetchMessages(Request $request) {
        $messages = ChatMessage::where('sender_id', $request->user()->id)
            ->where('receiver_id', $request->id)
            ->orWhere('sender_id', $request->id)
            ->where('receiver_id', $request->user()->id)
            ->get();
        return response()->json([
            'code' => 'success',
            'messages' => $messages,
        ]);
    }

    public function sendMessage(Request $request) {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $message = new ChatMessage;
        $message->message = $request->message;
        $message->sender_id = $request->user()->id;
        $message->receiver_id = $request->id;
        $message->save();
        broadcast(new SendMessage($message));
        return response()->json([
            'code' => 'success',
            'msg' => 'You successfully sent a message.',
        ]);
    }
}
