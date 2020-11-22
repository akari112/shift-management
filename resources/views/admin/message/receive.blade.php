@extends('layouts.app')
@section('content')

<h1>受信メッセージ一覧</h1>

<p><a class="btn" href="{{ route('admin.message.create') }}">新規作成</a></p>

<table border="1">
    <tr>
        <td>受信日</td>
        <td>差出人</td>
        <td>タイトル</td>
        <td>本文</td>
        <td>詳細</td>
        <td>削除</td>
    </tr>
@foreach($messages as $message)
    <tr>
        <td>{{ $message->created_at->format('n/j') }}</td>
        @foreach($userlist as $key => $val)
        @if($key == $message->reply_id )
            <td>{{ $val }}</td>
        @endif
        @endforeach
        <td>{{ Str::limit($message->title, 20) }}</td>
        <td>{{ Str::limit($message->content, 40) }}</td>
        <td><a href="{{ route('admin.message.show', $message->id) }}">詳細</a></td>
        <td><a class="delete" href="{{ route('admin.message.delete', $message->id) }}">削除</a></td>
    </tr>
@endforeach
</table>

<a class="btn" href="{{ route('admin.message.index') }}">戻る</a>

@endsection
@section('script')
<script>
// 確認ダイアログ
$(function(){
    $(".delete").click(function(){
        if(confirm("本当に削除しますか？")){
        }else{
            return false;
        }
    });
});
</script>
@endsection