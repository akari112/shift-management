@extends('layouts.app')
@section('content')

<h1>メッセージ新規作成</h1>

<!-- エラーメッセージ -->
@if ($errors->any())
    <ul class="error-box">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<!-- 成功時のメッセージ -->
@if (session('status'))
    <p class="info-box">{{ session('status') }}</p>
@endif

<form method="post">
@csrf

<ul>
    <li>
        <label>宛先</label>
        <select name="user_id">
            <option value="">選択して下さい</option>
            @foreach($userlist as $key => $val)
                <option value="{{ $key }}">{{ $val }}</option>
            @endforeach
        </select>
    </li>

    <li>
        <label>タイトル</label>
        <input type="text" name="title" size="50" value="{{ old('title', $message->title) }}">
    </li>

    <li>
        <label>本文</label>
        <textarea name="content" cols="60" rows="10">{{ old('content', $message->content) }}</textarea>
    </li>
</ul>

<input type="submit" value="送信する">
</form>

<a href="{{ route('admin.message.index') }}">戻る</a>

@endsection