@extends('layouts.app')
@section('content')

<h2 class="title">パスワード変更</h2>

<!-- エラー -->
@if ($errors->any())
  <ul class="error-box">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<!-- 成功時のメッセージ -->
@if (session('status'))
    <p class="info-box">{{ session('status') }}</p>
@endif

<form method="post">
@csrf

<div class="password">
  <label for="pass1">現在のパスワード</label><br>
  <input id="pass1" type="password" name="old_password"><br>

  <label for="pass2">新しいパスワード(8文字以上)</label><br>
  <input id="pass2" type="password" name="password"><br>

  <label for="pass3">新しいパスワード(確認)</label><br>
  <input id="pass3" type="password" name="password_confirmation"><br>

  <input class="btn con" type="submit" value="変更する">
</div>

</form>

<div class="btns">
  <a class="btn top" href="{{ route('user.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('user.logout') }}">ログアウト</a>
</div>
@endsection