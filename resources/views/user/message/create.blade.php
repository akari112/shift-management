@extends('layouts.app')
@section('content')

<h2 class="title">メッセージ新規作成</h2>

<!-- エラーメッセージ -->
@if ($errors->any())
  <ul class="error-box">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<!-- 成功時のメッセージ -->
@if (session('status'))
  <p class="error-box">{{ session('status') }}</p>
@endif

<form method="post" class="create_message">
  @csrf
  <input type="hidden" value="0" name='user_id'>
  <input type="hidden" value="{{ Auth::id() }}" name='reply_id'>
  <ul>
    <li>
      <label for="title">件名</label><br>
      <input id="title" type="text" name="title" size="50" value="{{ old('title', $message->title) }}">
    </li>
    <li>
      <label for="content">メッセージ</label><br>
      <textarea id="content" name="content" cols="60" rows="10">{{ old('content', $message->content) }}</textarea>
    </li>
  </ul>

  <button class="btn con" type="submit">送信する</button>
</form>

<div class="btns">
  <a class="btn back" href="{{ route('user.message.index') }}">戻る</a>
  <a class="btn top" href="{{ route('user.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('user.logout') }}">ログアウト</a>
</div>

@endsection