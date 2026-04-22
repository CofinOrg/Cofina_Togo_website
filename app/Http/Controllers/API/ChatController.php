<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ChatController extends Controller
{

    public function ask(Request $request)
    {
        $question = $request->input('question');
        $chatHistory = $request->input('chat_history', []);

        $response = Http::post('https://bot.mawena.online/ask-question', [
            'question' => $question,
            'chat_history' => $chatHistory,
        ]);

        return response()->json($response->json());
    }
}
