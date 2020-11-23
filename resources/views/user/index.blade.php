@extends('layouts.app')
@section('content')

<section id="menu" class="view">
  <h1 class="title">Menu</h1>
  <div class="container-fluid">
    <div class="row menu-items">
      <div class="contents col-6 wl">
        <div class="icon">  
          <i class="fas fa-edit icon"></i>
        </div>
        <a href="{{ route('user.shift.desire.index') }}">シフト希望提出</a>
      </div>
      <div class="contents col-6 sa">
        <div class="icon">
          <i class="fas fa-list-alt icon"></i>
        </div>
        <a href="{{ route('user.shift.confirm.index') }}">提出済シフト希望</a>
      </div>
      <div class="contents col-6 sa">
        <div class="icon">
          <i class="fas fa-check-square icon"></i>
        </div>
        <a href="{{ route('user.shift.ok.index') }}">確定済シフト一覧</a>
      </div>
      <div class="contents col-6 wl">
        <div class="icon">
          <i class="far fa-envelope icon"></i>
        </div>
        <a href="{{ route('user.message.index') }}">メッセージ一覧</a>
      </div>
      <div class="contents col-6 wl">
        <div class="icon">
          <i class="fas fa-comments icon"></i>
        </div>
        <a href="chat.html">全体チャット</a>
      </div>
      <div class="contents col-6 sa">
        <div class="icon">
          <i class="fas fa-key icon"></i>
        </div>
        <a href="{{ route('user.profile.edit') }}" id="passchange">パスワード変更</a>
      </div>
    </div>
  </div>
  
  <a class="btn logout" href="{{ route('user.logout') }}">
  <span><i class="fas fa-sign-out-alt"></i></span>ログアウト</a>

</section>

@endsection