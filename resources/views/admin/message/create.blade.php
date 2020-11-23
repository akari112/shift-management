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

<ul>
  <li>
    <label for="name">宛先</label><br>
    <select id="name" name="user_id">
        <option value="">選択して下さい</option>
        @foreach($userlist as $key => $val)
          <option value="{{ $key }}">{{ $val }}</option>
        @endforeach
    </select>
  </li>

  <li>
    <label for="title">タイトル</label><br>
    <input id="title" type="text" name="title" size="50" value="{{ old('title', $message->title) }}">
  </li>

  <li>
    <label for="content">本文</label><br>
    <textarea id="content" name="content" cols="50" rows="10">{{ old('content', $message->content) }}</textarea>
  </li>
</ul>

<input class="btn con" type="submit" value="送信する">
</form>

<div class="btns">
  <a class="btn back" href="{{ route('admin.message.index') }}">戻る</a>   
  <a class="btn top" href="{{ route('admin.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('admin.logout') }}">ログアウト</a>
</div>

@endsection