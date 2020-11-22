@extends('layouts.app')
@section('content')

<h1>シフト希望確認</h1>
<h3>シフト希望内容確認</h3>

<div class="container">
  @if(isset($okShifts) && !empty($okShifts))
    <form method="post" action="{{ route('admin.shift.check.confirm') }}">
      @csrf
      <ul>
        @foreach($okShifts as $okShift)

          <strong> {{ $okShift['day'] }}</strong><br>

          <?php $names = explode(',',$okShift['name']) ?>
          @foreach($names as $name)
            <input type="checkbox" name="day[]" id="{{ $okShift['inputDay'].','.$name }}" value="{{ $okShift['inputDay'].','.$name }}"/>
            <label for="{{ $okShift['inputDay'].','.$name }}">{{ $name }}</label><br>
          @endforeach

          <br>
        @endforeach
      </ul>
      <button class="btn" type="submit">確認する</button>

    </form>
  @else
    <p>シフト情報はありません。</p>
  @endif
</div>

<button class="btn" onClick="history.back()">戻る</button>

<a class="btn" href="{{ route('admin.top') }}">トップへ</a>
<a href="{{ route('admin.logout') }}">ログアウト</a>

@endsection