@extends('layouts.app')
@section('content')

<h2 class="title">シフト希望管理</h2>
<h4 class="title">シフト確定確認</h4>

<div class="container">
  <ul>
  @foreach($confirms as $confirm)
      <strong>{{  $confirm[0]["day"]  }}</strong>
      <div class="names_con">
        @foreach($confirm as $con)
          <li>{{  $con["name"]  }}</li>
        @endforeach
      </div>
      <br>
  @endforeach
  </ul>
  <a class="btn con" href="{{ route('admin.shift.check.ok') }}">確定する</a><br>
</div>

<div class="btns">
  <button class="btn back" onClick="history.back()">戻る</button>
  <a class="btn top" href="{{ route('admin.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('admin.logout') }}">ログアウト</a>
</div>
@endsection