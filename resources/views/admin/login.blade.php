@extends('layouts.app')
@section('content')

<h2>管理者ログイン</h2>

<!-- エラー出力 -->
@if ($errors->any())
    <ul class="error-box">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="post">
@csrf

<ul>
    <li>
        <label>名前</label>
        <input type="text" name="username" value="{{ old('username') }}">
    </li>

    <li>
        <label>パスワード</label>
        <input type="password" name="password">
    </li>
</ul>

<input type="submit" value="ログイン">
</form>

@endsection