<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $get_ids = Chat::select('buyer_id')->groupBy('buyer_id')->where('seller_id', \Auth::guard('user')->user()->id)->get();
        
        $messages = array();
        foreach($get_ids as $get_id){
            $messages[] = Chat::latest()->where('buyer_id', $get_id->buyer_id)->where('seller_id', \Auth::guard('user')->user()->id)->first();
        }
        
        return view('chat.index', ['messages' => $messages]);
    }

    public function showchat(Request $request)
    {
        $chat_id = $request->get('message_id');
        if ($chat_id) {
            // $chats = \Auth::guard('user')->user()->chat->where('buyer_id', $chat_id)->get();
            $chats =  Chat::where('seller_id', \Auth::guard('user')->user()->id)->where('buyer_id', $chat_id)->get();
            return $chats;
        }else {
            return "chat not found!!";
        }
    }

    public function postChatSeller(Request $request)
    {
        $seller = new Chat();
        $seller->message_seller = $request->get('message');
        $seller->seller_id = \Auth::guard('user')->user()->id;
        $seller->buyer_id = $request->get('buyer_id');
        $seller->save();
        $output = array(
            'message' => $seller->message_seller,
            'seller_id' => $seller->seller_id,
            'timestamp' => $seller->created_at->format('H:i'),
        );

        return $output;
    }
}
