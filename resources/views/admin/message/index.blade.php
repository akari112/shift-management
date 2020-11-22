@extends('layouts.app')
@section('content')

<h1>メッセージ</h1>

<ul>
    <li><a href="{{ route('admin.message.create') }}">新規作成</a></li>
    <li><a href="{{ route('admin.message.receive') }}">受信メッセージ一覧</a></li>
    <li><a href="{{ route('admin.message.send') }}">送信済みメッセージ一覧</a></li>
</ul>

<a class="btn" href="{{ route('admin.top') }}">TOPへ</a>


@endsection