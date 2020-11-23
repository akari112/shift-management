@extends('layouts.app')
@section('content')

<h2 class="title">登録完了</h2>

<div class="container">
  <h5>お疲れ様でした。</h5>
  <h5>登録が完了しました。</h5>
</div>

<div class="btns">
  <a class="btn top" href="{{ route('admin.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('admin.logout') }}">ログアウト</a>
</div>

@endsection