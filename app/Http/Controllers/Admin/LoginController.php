<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

//AuthenticatesUsersからオーバーライド
class LoginController extends Controller
{
    use AuthenticatesUsers;

    //ログイン後の管理者TOPへ
    public function redirectTo()
    {
        return route('admin.top');
    }

    //ログイン画面の表示
    public function showLoginForm()
    {
        return view('admin.login');
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

        return redirect(route('admin.login'));
    }
    
    //使用する認証を返す
    protected function guard()
    {
        return auth('admin');
    }
}
