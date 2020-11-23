@extends('layouts.app')
@section('content')

<h2 class="title">シフト提出</h2>
<h4 class="title">シフト希望確認</h4>

<form method="post" action="{{ route('user.shift.desire.ok') }}">
@csrf

  <div class="container">
    <ul>
    @foreach(array_map(NULL, $real, $real2) as [ $rea, $rea2 ])
        <input type="hidden" name="days[]" value="{{ $rea }}"/>
        <li>{{ $rea2 }}</li>
    @endforeach
    </ul>
    <br>
    <button class="btn con" type="submit">確定する</button>
  </div>

</form>

<div class="btns">
  <button class="btn back" onClick="history.back()">戻る</button>
  <a class="btn top" href="{{ route('user.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('user.logout') }}">ログアウト</a>
</div>

@endsection