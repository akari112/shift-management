@extends('layouts.app')
@section('content')

<h1>シフト希望確認</h1>
<h3>確認対象選択</h3>

<div class="container">
  <ul>
    @foreach($lists as $list)
    <?php $select = str_replace('/', '-', $list);?>
    <li><a href="{{ route('admin.shift.check.list', $select) }}"> {{ $list }} </a></li>
    @endforeach
  </ul>
</div>

<a class="btn" href="{{ route('admin.top') }}">トップへ戻る</a>
<a href="{{ route('admin.logout') }}">ログアウト</a>

@endsection