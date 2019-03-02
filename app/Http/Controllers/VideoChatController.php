<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wqqas1\LaravelVideoChat\Facades\Chat;

class VideoChatController extends Controller
{
    //
	public function index() {
	   $conversations = Chat::getAllConversations();

       return view('chats', compact('conversations'));	
    }
    
    public function chat($id)
    {
        $conversation = Chat::getConversationMessageById($id);

        return view('chat')->with([
            'conversation' => $conversation
        ]);
    }

    public function send(Request $request)
    {
        Chat::sendConversationMessage($request->input('conversationId'), $request->input('text'));
    }

    public function sendFilesInConversation(Request $request)
    {
        Chat::sendFilesInConversation($request->input('conversationId') , $request->file('files'));
    }

}
