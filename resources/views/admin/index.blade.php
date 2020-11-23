@extends('layouts.app')
@section('content')

<section id="menu" class="view">
  <h1 class="title">管理者TOP</h1>
  <div class="container-fluid">
    <div class="row menu-items">
      <div class="contents col-6 wl">
        <div class="icon">  
          <i class="fas fa-edit icon"></i>
        </div>
        <a class="" href="{{ route('admin.shift.check.index') }}">希望シフト一覧</a>
      </div>

      <div class="contents col-6 sa">
        <div class="icon">
          <i class="far fa-check-square icon"></i>
        </div>
        <a href="{{ route('admin.shift.confirm.index') }}">確定シフト一覧</a>
      </div>

      <div class="contents col-6 sa">
        <div class="icon">
          <i class="far fa-registered icon"></i>
        </div>
        <a href="{{ route('admin.signup.index') }}">新規従業員登録</a>
      </div>
      
      <div class="contents col-6 wl">
        <div class="icon">
          <i class="far fa-address-book icon"></i>
        </div>
        <a href="{{ route('admin.user.index') }}">従業員一覧</a>
      </div>

      <div class="contents col-6 wl">
        <div class="icon">
          <i class="fas fa-envelope icon"></i>
        </div>
        <a href="{{ route('admin.message.index') }}">メッセージ</a>
      </div>

      <div class="contents col-6 sa">
        <div class="icon">
          <i class="fas fa-comments icon"></i>
        </div>
        <a href="" id="passchange">全体チャット</a>
      </div>
    </div>
  </div>
  
  <a class="btn logout" href="{{ route('admin.logout') }}">
  <span><i class="fas fa-sign-out-alt"></i></span>ログアウト</a>

</section>


@endsection