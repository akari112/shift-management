<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 検証済みデータ
    protected $sessionKey = 'SignupData';

    // 一覧
    public function index(Request $request)
    {
        $users = User::oldest()->get();

        return view('admin.user.index', compact('users'));
    }

    // 削除
    public function destroy(User $user)
    {
        $user->delete();
        $user->messages()->delete();

        return ['success' => true];
    }

    // 変更画面
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    // バリテーション
    public function postEdit(Request $request)
    {
        $data = $request->validate([
            'id'      => 'required',
            'username'     => 'required|max:20',
            'tel'     => 'nullable',
            'grade'     => 'required|max:2',
            'belong'     => 'nullable|max:50',
        ]);

        session([$this->sessionKey => $data]);

        return redirect(route('admin.user.confirm'));
    }

    // 確認画面
    public function confirm(User $user)
    {
        if (! $data = session($this->sessionKey)) {
            return redirect(route('admin.user.edit'));
        }

        return view('admin.user.confirm', compact('data'));
    }

    // 変更処理
    public function postConfirm()
    {
        if (! $data = session($this->sessionKey)) {
            return redirect(route('admin.user.edit'));
        }

        User::where('id',$data['id'])->update($data);

        session()->forget($this->sessionKey);

        return redirect(route('admin.user.ok'));
    }

    public function ok()
    {
        return view('admin.user.ok');
    }
}
