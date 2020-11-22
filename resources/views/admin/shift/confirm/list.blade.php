@extends('layouts.app')
@section('content')

<h1>確定済シフト確認</h1>
<h3>シフト内容</h3>

<div class="container">
  @if(isset($okShifts) && !empty($okShifts))
      <ul>
        @foreach($okShifts as $okShift)

          <strong> {{ $okShift['day'] }}</strong><br>

          <?php $names = explode(',',$okShift['name']) ?>
          @foreach($names as $name)
            <li>{{ $name }}</li>
          @endforeach

          <br>
        @endforeach
      </ul>

  @else
    <p>シフト情報はありません。</p>
  @endif
</div>

<button class="btn" onClick="history.back()">戻る</button>

<a class="btn" href="{{ route('admin.top') }}">トップへ</a>
<a href="{{ route('admin.logout') }}">ログアウト</a>

@endsection