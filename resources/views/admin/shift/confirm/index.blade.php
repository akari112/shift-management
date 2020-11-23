@extends('layouts.app')
@section('content')

<h2 class="title">確定済シフト確認</h2>
<h4 class="title">確認対象選択</h4>

<div class="container">
  <ul>
    @foreach($lists as $list)
    <?php $select = str_replace('/', '-', $list);?>
    <li><a href="{{ route('admin.shift.confirm.list', $select) }}"> {{ $list }} </a></li>
    @endforeach
  </ul>
</div>

<div class="btns">
  <a class="btn top" href="{{ route('admin.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('admin.logout') }}">ログアウト</a>
</div>

@endsection