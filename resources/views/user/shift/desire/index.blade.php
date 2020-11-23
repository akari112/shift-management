@extends('layouts.app')
@section('content')

<h2 class="title">シフト提出</h2>
<h4 class="title">提出対象選択</h4>

<div class="container">
  <ul>
  @foreach(array_map(NULL, $lists, $realLists) as [ $lists, $realLists ])
      <?php $select = str_replace('/', '-', $lists);?>
      <li><a href="{{ route('user.shift.desire.select', $select) }}"> {{ $realLists }} </a></li>
    @endforeach
  </ul>
</div>

<div class="btns">
  <a class="btn top" href="{{ route('user.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('user.logout') }}">ログアウト</a>
</div>

@endsection