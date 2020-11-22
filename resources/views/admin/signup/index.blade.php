@extends('layouts.app')
@section('content')

<h1>新規従業員登録</h1>
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
        <input type="text" name="username" value="{{ $user->username }}">
    </li>
    <li>
        <label>電話番号</label>
        <input type="text" name="tel" value="{{ $user->tel }}">
    </li>
    <li>
        <label>学年</label>
        <input type="number" name="grade" value="{{ $user->grade }}">
    </li>
    <li>
        <label>所属</label>
        <input type="text" name="belong" value="{{ $user->belong }}">
    </li>
    <li>
        <label>パスワード</label>
        <input type="password" name="password"> （8～30文字）
    </li>
    <li>
        <label>パスワード（確認用)</label>
        <input type="password" name="password_confirmation">
    </li>
</ul>

<input type="submit" value="確認画面へ">
</form>

<a class="btn" href="{{ route('admin.top') }}">TOPへ戻る</a>

@endsection
