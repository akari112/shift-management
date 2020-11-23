@extends('layouts.app')
@section('content')

<h2 class="title">シフト提出</h2>
<h4 class="title">シフト選択</h4>

<form method="post" action="{{ route('user.shift.desire.confirm') }}">
@csrf

  <div class="container">
    <ul>
    @foreach(array_map(NULL, $days, $days2) as [ $day, $day2 ])
        <?php $com = str_replace('/', '-', $day);?>
        <input type="checkbox" name="day[]" id="{{ $day }}" value="{{ $day2.','.$day }}"/>
        <label for="{{ $day }}">{{ $day }}</label><br>
    @endforeach
    </ul>
    <button class="btn con" type="submit">確認する</button>

  </div>

</form>


<div class="btns">
  <button class="btn back" onClick="history.back()">戻る</button>
  <a class="btn top" href="{{ route('user.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('user.logout') }}">ログアウト</a>
</div>

@endsection