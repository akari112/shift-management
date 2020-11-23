@extends('layouts.app')
@section('content')

<h2 class="title">シフト希望確認</h2>
<h4 class="title">シフト希望内容</h4>

<div class="container">
  @if(isset($okShifts) && !empty($okShifts))
    <form method="post" action="{{ route('admin.shift.check.confirm') }}">
      @csrf

      @foreach($okShifts as $okShift)
        <strong> {{ $okShift['day'] }}</strong><br>

        <div class="names">
          <?php $names = explode(',',$okShift['name']) ?>
          @foreach($names as $name)
            <input type="checkbox" name="day[]" id="{{ $okShift['inputDay'].','.$name }}" value="{{ $okShift['inputDay'].','.$name }}"/>
            <label for="{{ $okShift['inputDay'].','.$name }}">{{ $name }}</label><br>
          @endforeach
        </div>
        <br>
      @endforeach
      <button class="btn con" type="submit">確認する</button>
    </form>
  @else
    <p>シフト情報はありません。</p>
  @endif
</div>

<div class="btns">
  <button class="btn back" onClick="history.back()">戻る</button>
  <a class="btn top" href="{{ route('admin.top') }}">トップへ</a>
  <a class="btn logout" href="{{ route('admin.logout') }}">ログアウト</a>
</div>

@endsection