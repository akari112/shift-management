@extends('layouts.app')
@section('content')

<h2 class="title">新規従業員登録</h2>
<!-- エラー出力 -->
@if ($errors->any())
  <ul class="error-box">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form method="post" class="password">
  @csrf

  <ul>
    <li>＊がある項目は必須事項です。</li><br>
    <li>
      <label for="name">*名前</label><br>
      <input id="name" type="text" name="username" value="{{ $user->username }}">
    </li>
    <li>
      <label for="tel">電話番号</label><br>
      <input id="tel" type="text" name="tel" value="{{ $user->tel }}">
    </li>
    <li>
      <label for="grade">学年(半角数字)</label><br>
      <input id="grade" type="number" name="grade" value="{{ $user->grade }}">
    </li>
    <li>
      <label for="be">所属</label><br>
      <input id="be" type="text" name="belong" value="{{ $user->belong }}">
    </li>
    <li>
      <label for="pass">*パスワード(8文字以上)</label><br>
      <input id="pass" type="password" name="password">
    </li>
    <li>
      <label for="pass2">*パスワード(確認用)</label><br>
      <input id="pass2" type="password" name="password_confirmation">
    </li>
  </ul>

  <input class="btn con" type="submit" value="確認画面へ">
</form>

<div class="btns">
  <a class="btn top" href="{{ route('admin.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('admin.logout') }}">ログアウト</a>
</div>
@endsection
