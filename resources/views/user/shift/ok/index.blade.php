@extends('layouts.app')
@section('content')

<h2 class="title">確定済シフト</h2>
<h4 class="title">確認対象選択</h4>

<div class="container">
  <ul>
    @foreach($lists as $list)
    <?php $select = str_replace('/', '-', $list);?>
    <li><a href="{{ route('user.shift.ok.list', $select) }}"> {{ $list }} </a></li>
    @endforeach
  </ul>
</div>

<div class="btns">
  <a class="btn top" href="{{ route('user.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('user.logout') }}">ログアウト</a>
</div>

@endsection