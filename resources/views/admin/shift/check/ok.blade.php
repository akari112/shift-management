@extends('layouts.app')
@section('content')

<h1>シフト希望確定完了</h1>

<div>
  <p>お疲れ様でした。</p>
  <p>シフトの確定が完了しました。</p>
</div>

<a href="{{ route('admin.top') }}">トップへ</a>
<a href="{{ route('admin.logout') }}">ログアウト</a>

@endsection