<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.message.index');
    }

    //送信メッセージ一覧
    public function send()
    {
        $messages = Message::latest()->with('user')->where('user_id', '>', 0)->get();

        return view('admin.message.send', compact('messages'));
    }

    //受信メッセージ一覧
    public function receive()
    {
        $messages = Message::latest()->where('user_id', 0)->get();
        $userlist = User::getUserList();

        return view('admin.message.receive', compact('messages', 'userlist'));
    }

    //新規作成
    public function create(Message $message)
    {
        $userlist = User::getUserList();

        return view('admin.message.create', compact('message', 'userlist'));
    }

    //メッセージ送信
    public function store(Request $request, Message $message)
    {
        $data = $request->validate([
            'user_id'   => 'required|exists:users,id',
            'title'     => 'required|max:100',
            'content'   => 'required|max:30000',
        ]);

        $message->fill($data)->save();

        return redirect(route('admin.message.create', $message))->with('status', '送信が完了しました');
    }

    //削除
    public function delete(Message $message)
    {
        $message->delete();
        return redirect()->back();
    }

    // メッセージの詳細
    public function show(Message $message)
    {
        return view('user.message.show', compact('message'));
    }

}