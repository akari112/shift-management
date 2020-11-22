@extends('layouts.app')
@section('content')

<h1>確認画面</h1>

<form method="post">
@csrf

<ul>
    <li>
        <label>名前</label>
        {{ $data["username"] }}
    </li>

    <li>
        <label>電話番号</label>
        {{ $data["tel"] }}
    </li>

    <li>
        <label>学年</label>
        {{ $data["grade"] }}
    </li>

    <li>
        <label>所属</label>
        {{ $data["belong"] }}
    </li>
    
</ul>

<a href="{{ route('admin.user.index') }}">戻る</a>
<input type="submit" value="送信する">

</form>

@endsection