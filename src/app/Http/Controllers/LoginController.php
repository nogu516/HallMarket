<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            // 認証成功
            return redirect()->intended('dashboard');
        }

        // 認証失敗
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'ログイン情報が登録されていません',
            ])->withInput();
        }
    }
}
