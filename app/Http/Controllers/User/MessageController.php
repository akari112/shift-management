<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('user.message.index');
    }

    //送信メッセージ一覧
    public function send()
    {
        // 10件ごとにページネーション
        $messages = Message::latest()->with('user')->where('user_id', 0)->paginate(10);

        return view('user.message.send', compact('messages'));
    }

    //受信メッセージ一覧
    public function receive()
    {
        $messages = auth()->user()->messages()->latest()->paginate(10);

        return view('user.message.receive', compact('messages'));
    }

    //新規作成
    public function create(Message $message)
    {
        return view('user.message.create', compact('message'));
    }

    //メッセージ送信
    public function store(Request $request, Message $message)
    {
        $data = $request->validate([
            'user_id'   => 'required',
            'reply_id'   => 'required|exists:users,id',
            'title'     => 'required|max:100',
            'content'   => 'required|max:30000',
        ]);

        $message->fill($data)->save();

        return redirect(route('user.message.create', $message))->with('status', '送信が完了しました');
    }

    // メッセージの詳細
    public function show(Message $message)
    {
        if(auth()->id() != $message->user_id && auth()->id() != $message->reply_id){
            abort(403);
        }
        return view('user.message.show', compact('message'));
    }

    // 削除
    public function delete(Message $message)
    {
        $message->delete();
        return redirect()->back();
    }
}