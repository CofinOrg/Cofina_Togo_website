<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ChatController extends Controller
{

    public function ask(Request $request)
    {
        $question = $request->query('question');

        $response = Http::get('https://cofbot.mawena.online/ask-question', [
            'question' => $question
        ]);

        return response()->json($response->json());
    }
}
