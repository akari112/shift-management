@extends('layouts.app')
@section('content')

<h2 class="title">確認画面</h2>

<form method="post" class="container">
@csrf
<ul>
  <li>
    <label>名前：</label>
    {{ $user->username }}
  </li>
  <li>
    <label>電話番号：</label>
    @if($user->tel)
      {{ $user->tel }}
    @else
     未指定
    @endif
  </li>
  <li>
    <label>学年：</label>
    @if($user->grade)
      {{ $user->grade }}
    @else
     未指定
    @endif
  </li>
  <li>
    <label>所属：</label>
    @if($user->belong)
      {{ $user->belong }}
    @else
     未指定
    @endif
  </li>
  <li>
    <label>パスワード：</label>
    (表示されません)
  </li>
</ul>
<input class="btn con" type="submit" value="送信する">

</form>
<div class="btns">
  <button class="btn back" onClick="history.back()">戻る</button>
  <a class="btn top" href="{{ route('admin.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('admin.logout') }}">ログアウト</a>
</div>
@endsection