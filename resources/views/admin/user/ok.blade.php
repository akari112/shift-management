@extends('layouts.app')
@section('content')

<h2 class="title">変更完了</h2>

<div class="container">
  <h5>変更が完了しました。</h5>
</div>

<div class="btns">
  <a class="btn top" href="{{ route('admin.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('admin.logout') }}">ログアウト</a>
</div>

@endsection