@extends('layouts.app')
@section('content')

<h2 class="title">確認画面</h2>

<form method="post" class="container">
@csrf
<ul>
    <li>
      <label>名前：</label>
      {{ $data["username"] }}
    </li>

    <li>
      <label>電話番号：</label>
      @if($data["tel"])
        {{ $data["tel"] }}
      @else
        未指定
      @endif
    </li>

    <li>
      <label>学年：</label>
      @if($data["grade"])
        {{ $data["grade"] }}
      @else
        未指定
      @endif
    </li>

    <li>
      <label>所属：</label>
      @if($data["belong"])
        {{ $data["belong"] }}
      @else
        未指定
      @endif
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