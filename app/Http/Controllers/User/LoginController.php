<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//AuthenticatesUsersからオーバーライド
class LoginController extends Controller
{
    use AuthenticatesUsers;

    //ログイン後の従業員TOPへ
    public function redirectTo()
    {
        return route('user.top');
    }

    // ログイン画面の表示
    public function showLoginForm()
    {
        return view('user.login');
    }

    //ログアウト
    public function logout(Request $request)
    {
        $partialLogin = auth('user')->guest() || auth('admin')->guest();

        $this->guard()->logout();

        // どちらか片方のみでログインしている時のみ、invalidate する
        if ($partialLogin) {
            $request->session()->invalidate();
        }

        return redirect(route('user.login'));
    }

    //使用する認証を返す
    protected function guard()
    {
        return auth('user');
    }
}