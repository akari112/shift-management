@extends('layouts.app')
@section('content')

<h2 class="title">登録内容変更</h2>
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
  <input type="hidden" name="id" value="{{ $user->id }}">
  <ul>
    <li>
      <label for="name">名前</label><br>
      <input id="name" type="text" name="username" value="{{ $user->username }}">
    </li>
    <li>
      <label for="tel">電話番号</label><br>
      <input id="tel" type="text" name="tel" value="{{ $user->tel }}">
    </li>
    <li>
      <label for="grade">学年</label><br>
      <input id="grade" type="number" name="grade" value="{{ $user->grade }}">
    </li>
    <li>
      <label for="be">所属</label><br>
      <input id="be" type="text" name="belong" value="{{ $user->belong }}">
    </li>
  </ul>

  <input class="btn con" type="submit" value="確認画面へ">
</form>

<div class="btns">
  <button class="btn back" onClick="history.back()">戻る</button>
  <a class="btn top" href="{{ route('admin.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('admin.logout') }}">ログアウト</a>
</div>

@endsection