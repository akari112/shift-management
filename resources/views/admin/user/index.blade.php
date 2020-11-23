@extends('layouts.app')
@section('content')

<h2 class="title">従業員一覧</h2>

<table border="1">
  <tr>
    <th>ID</th>
    <th>名前</th>
    <th>電話番号</th>
    <th>学年</th>
    <th>所属</th>
    <th>削除</th>
    <th>変更</th>
  </tr>
@foreach($users as $user)
  <tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->username }}</td>
    <td>{{ $user->tel }}</td>
    <td>{{ $user->grade }}</td>
    <td>{{ $user->belong }}</td>
    <td><input type="button" class="del_btn btn con" data-id="{{ $user->id }}" value="削除"></td>
    <td><a class="btn con" href="{{ route('admin.user.edit', $user->id) }}">変更</a></td>
  </tr>
@endforeach
</table>

<div class="btns">
  <a class="btn top" href="{{ route('admin.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('admin.logout') }}">ログアウト</a>
</div>
@endsection

@section('script')
<script>
// 確認ダイアログ
$(function(){
    $(".del_btn").click(function(){
        if(confirm("本当に削除しますか？")){
        }else{
            return false;
        }
    });
});
// データの削除
jQuery(function ($) {
    // 削除用AJAX
    function deleteRecord(url, btn) {
        $.ajax({
            url: url,
            data: {_method: "DELETE"},
            method: "post"
        }).done(function () {
        　  // 通信が成功した場合、クリックした要素に近い<tr> を削除
            $(btn).closest("tr").remove();
        }).fail(function (xhr, str1, str2) {
            alert("データの削除に失敗しました");
        });
    }
    // 削除用AJAXの呼び出し
    $("table").on("click", ".del_btn", function () {
        var url = "{{ route('admin.user.destroy', '') }}/" + $(this).data("id");
        deleteRecord(url, this);
    });
    // CSRFトークン
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
</script>
@endsection