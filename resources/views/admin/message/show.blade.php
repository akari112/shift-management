@extends('layouts.app')
@section('content')

<h1>メッセージ詳細</h1>

<p>{{ $message->user->username }}</p>
<p>{{ $message->created_at->format('Y/n/j H:i') }}</p>
<h2>{{ $message->title }}</h2>

<p>{!! nl2br(e($message->content)) !!}</p>

<button class="btn" onClick="history.back()">戻る</button>
@endsection