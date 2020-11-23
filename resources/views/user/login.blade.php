@extends('layouts.app')
@section('content')

<h2 class="title">ユーザーログイン</h2>

<!-- エラーメッセージ -->
@if ($errors->any())
  <ul class="error-box">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<form class="password" method="post">
@csrf

<ul>
  <li>
    <label for="name">名前</label><br>
    <input id="name" type="text" name="username" value="{{ old('username') }}">
  </li>

  <li>
    <label for="pass">パスワード</label><br>
    <input id="pass" type="password" name="password">
  </li>
</ul>
<input class="btn con" type="submit" value="ログイン">

</form>

@endsection