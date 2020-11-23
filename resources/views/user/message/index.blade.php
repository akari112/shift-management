@extends('layouts.app')
@section('content')

<h2 class="title">メッセージ</h2>

<ul class="m_list">
  <li><a href="{{ route('user.message.create') }}">新規作成　　　　　　</a></li>
  <li><a href="{{ route('user.message.receive') }}">受信メッセージ一覧　</a></li>
  <li><a href="{{ route('user.message.send') }}">送信済メッセージ一覧</a></li>
</ul>

<div class="btns">
  <a class="btn top" href="{{ route('user.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('user.logout') }}">ログアウト</a>
</div>

@endsection