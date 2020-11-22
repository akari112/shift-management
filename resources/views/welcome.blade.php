@extends('layouts.app')
@section('content')

<h2>各ページへのリンク</h2>

<ul>
    <li>
        <a href="{{ route('user.login') }}" target="_blank">従業員ログイン</a>
    </li>
    <li>
        <a href="{{ route('admin.login') }}" target="_blank">管理者ログイン</a>
    </li>
</ul>

@endsection