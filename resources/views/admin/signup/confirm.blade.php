@extends('layouts.app')
@section('content')

<h1>確認画面</h1>

<form method="post">
@csrf

<ul>
    <li>
        <label>名前</label>
        {{ $user->username }}
    </li>

    <li>
        <label>電話番号</label>
        {{ $user->tel }}
    </li>

    <li>
        <label>学年</label>
        {{ $user->grade }}
    </li>

    <li>
        <label>所属</label>
        {{ $user->belong }}
    </li>

    <li>
        <label>パスワード</label>
        （表示されません）
    </li>
    
</ul>

<a href="{{ route('admin.signup.index') }}">戻る</a>　<input type="submit" value="送信する">

</form>
@endsection