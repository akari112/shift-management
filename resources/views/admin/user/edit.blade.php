@extends('layouts.app')
@section('content')

<h1>登録内容変更</h1>
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
<input type="hidden" name="id" value="{{ $user->id }}">
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
</ul>

<input type="submit" value="確認画面へ">
</form>

<button class="btn" onClick="history.back()">戻る</button>


@endsection