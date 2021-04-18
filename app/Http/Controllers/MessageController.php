<?php

namespace App\Http\Controllers;

use App\Repositories\MessageRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Telegram;

class MessageController extends Controller
{
    public function index()
    {
        $messages = MessageRepository::orderBy('date','desc')->get();

        return view('message.index', compact('messages'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function send(Request $request)
    {
        Telegram::sendMessage([
            'chat_id' => env('CHAT_ID'),
            'text' => $request->get('message'),
        ]);
        MessageRepository::storeSend($request->get('message'));

        return redirect()->back();
    }
}
