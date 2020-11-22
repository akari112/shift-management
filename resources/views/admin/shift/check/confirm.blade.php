@extends('layouts.app')
@section('content')

<h1>シフト希望管理</h1>
<h3>シフト希望確定確認</h3>

  <div class="container">
    <ul>
    @foreach($confirms as $confirm)
        <strong>{{  $confirm[0]["day"]  }}</strong>
        @foreach($confirm as $con)
          <li>{{  $con["name"]  }}</li>
        @endforeach
        <br>
    @endforeach
    </ul>
  </div>
  <a class="btn" href="{{ route('admin.shift.check.ok') }}">確定する</a><br>



<button class="btn" onClick="history.back()">戻る</button>

<a class="btn" href="{{ route('admin.top') }}">トップへ戻る</a>
<a href="{{ route('admin.logout') }}">ログアウト</a>

@endsection