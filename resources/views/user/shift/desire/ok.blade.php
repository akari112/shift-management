@extends('layouts.app')
@section('content')

<h2 class="title">シフト提出完了</h2>

<div class="container">
  <h5>お疲れ様でした。</h5>
  <h5>シフト提出が完了しました。</h5>
</div>

<div class="btns">
  <a class="btn top" href="{{ route('user.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('user.logout') }}">ログアウト</a>
</div>

@endsection