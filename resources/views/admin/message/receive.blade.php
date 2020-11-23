@extends('layouts.app')
@section('content')

<h2 class="title">受信メッセージ一覧</h2>

<table border="1">
<tr>
    <th>日付</th>
    <th>差出人</th>
    <th>件名</th>
    <th>本文</th>
    <th>詳細</th>
    <th>削除</th>
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
    <td>{{ Str::limit($message->content, 25) }}</td>
    <td><a href="{{ route('admin.message.show', $message->id) }}">詳細</a></td>
    <td><a class="delete" href="{{ route('admin.message.delete', $message->id) }}">削除</a></td>
  </tr>
@endforeach
</table>

<div class="btns">
  <button class="btn back" onClick="history.back()">戻る</button>
  <a class="btn top" href="{{ route('admin.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('admin.logout') }}">ログアウト</a>
</div>

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