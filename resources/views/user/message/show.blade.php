@extends('layouts.app')
@section('content')

<h2 class="title">メッセージ詳細</h2>

<h4 class="mtitle">{{ $message->title }}</h4>

<p class="time">{{ $message->created_at->format('Y/n/j H:i') }}</p>

<p class="message">{!! nl2br(e($message->content)) !!}</p>

<div class="btns">
  <button class="btn back" onClick="history.back()">戻る</button> 
  <a class="btn top" href="{{ route('user.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('user.logout') }}">ログアウト</a>
</div>

@endsection