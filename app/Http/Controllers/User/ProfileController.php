<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // 変更画面
    public function edit(){
        $user = auth()->user();

        return view('user.profile.edit', compact('user'));
    }

    // 変更処理
    public function update(Request $request)
    {
        $data = $request->validate([
            'old_password'     => 'required|max:30',
            'password'    => 'required|confirmed|between:8,30|regex:/^[!-~]+$/',
        ]);

        $com_password = $data['old_password'];
        
        // 現在のパスワードと照合
        if((Hash::check($com_password, auth()->user()->password))){
            // パスワード変更処理
            auth()->user()->password = bcrypt($request->get('password'));
            auth()->user()->save();
        }else{
            return redirect(route('user.profile.edit'))->with('status', '現在のパスワードが間違っています');
        }
        
        return redirect(route('user.profile.edit'))->with('status', '変更が完了しました');
    }
}
