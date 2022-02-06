<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendchat(Request $request){
        //dd($request->pesan);
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        $response = $telegram->sendMessage([
            'chat_id'   => env('TELEGRAM_BOT_CHAT_ID'),
            'text'      => $request->pesan
        ]);

        return redirect()->back()->with('message', 'Chat telah dikirim...');
    }
}
