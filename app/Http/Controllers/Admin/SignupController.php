<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    // 検証済みデータ格納用セッションキー
    protected $sessionKey = 'SignupData';

    // 登録画面
    public function index(User $user)
    {
        if ($data = old() ?: session($this->sessionKey)) {
            $user->fill($data);
        }
        return view('admin.signup.index', compact('user'));
    }

    // POST送信後検証
    public function postIndex(Request $request)
    {
        $data = $request->validate([
            'username'     => 'required|max:255',
            'tel'     => 'nullable|unique:users',
            'grade'     => 'required|max:2',
            'belong'     => 'nullable|max:255',
            'password' => 'required|confirmed|between:8,30|regex:/^[!-~]+$/',
        ]);

        $data['password'] = bcrypt($data['password']);

        session([$this->sessionKey => $data]);

        return redirect(route('admin.signup.confirm'));
    }

    // 確認画面
    public function confirm(User $user)
    {
        if (! $data = session($this->sessionKey)) {
            return redirect(route('admin.signup.index'));
        }

        $user->fill($data);

        return view('admin.signup.confirm', compact('user'));
    }

    // 登録処理等
    public function postConfirm(User $user)
    {
        if (! $data = session($this->sessionKey)) {
            return redirect(route('admin.signup.index'));
        }

        $user->fill($data)->save();

        session()->forget($this->sessionKey);

        return redirect(route('admin.signup.thanks'));
    }

    // 完了画面
    public function thanks()
    {
        return view('admin.signup.thanks');
    }
}
