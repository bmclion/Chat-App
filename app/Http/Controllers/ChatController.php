<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\ChatEvent;
use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use Pusher\ApiErrorException;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function index()
    {
        return view('chats.chat');
        // $all_users = User::where('id', '<>', Auth::id())->get();
        // return view('chats.chat', compact('all_users'));
    }

    public function getAllDetails()
    {
        $data['all_user']  = User::where('id', '<>', Auth::id())->get();
        $data['auth_id'] = Auth::id();
        return $data;
    }

    public function featchSelectedUserDetails(Request $request)
    {
        $id = $request->id;
        $data =  [];
        $data['selected_user'] = User::where('id', $id)->first();
        if (!empty($data['selected_user'])) {
            //check for threads
            $data['thread'] = Thread::where(function ($query) use ($id) {
                $query->where('user_1', Auth::id())->where('user_2', $id);
            })->orWhere(function ($query) use ($id) {
                $query->where('user_1', $id)->where('user_2', Auth::id());
            })->first();

            if (!empty($data['thread'])) {
                $data['thread']->messages = Chat::where('thread_id', $data['thread']->id)->get();
            }
        }
        return $data;
    }
    public function sendText(Request $request)
    {
     
        if($request->thread_id == null)
        {
            $thread = new Thread();
            $thread->user_1 = Auth::id();
            $thread->user_2 = $request->reciver_id;
            $thread->save();

            $thread_id = $thread->id;
        }
        else{
            $thread_id = $request->thread_id;
        }
        if($thread_id > 0)
        {
            $chats = new Chat();
            $chats->messages_text = $request->text;
            $chats->thread_id = $thread_id;
            $chats->receiver_id = $request->reciver_id;
            $chats->sender_id = Auth::id();
            $chats->save();
        }
        event(new ChatEvent($chats));
        return $this->featchSelectedUserDetails(new Request(['id' => $request->reciver_id]));
    }
}
