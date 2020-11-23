@extends('layouts.app')
@section('content')

<h2 class="title">確定済シフト</h2>
<h4 class="title">内容確認</h4>

<div class="container">
  @if(isset($jpShifts) && !empty($jpShifts))
  <ul>
      @foreach($jpShifts as $shift)
      <li> {{ $shift }} </li>
      @endforeach
  </ul>
  @else
    <p>シフト情報はありません。</p>
  @endif
</div>

<div class="btns">
  <button class="btn back" onClick="history.back()">戻る</button>
  <a class="btn top" href="{{ route('user.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('user.logout') }}">ログアウト</a>
</div>
@endsection