@extends('layouts.app')
@section('content')

<h2 class="title">確定済シフト確認</h2>
<h4 class="title">シフト内容</h4>

<div class="container">
  @if(isset($okShifts) && !empty($okShifts))
      <ul>
        @foreach($okShifts as $okShift)

          <strong> {{ $okShift['day'] }}</strong><br>
          <div class="names">
            <?php $names = explode(',',$okShift['name']) ?>
            @foreach($names as $name)
              <li>{{ $name }}</li>
            @endforeach
          </div>

          <br>
        @endforeach
      </ul>

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