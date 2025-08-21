<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User; //
use Illuminate\Support\Facades\Hash; //



class ContactController extends Controller
{
    public function index()
{
    return view('auth.register');
}
public function register(RegisterRequest $request)
{
    // バリデーション済みデータ取得
    $validated = $request->validated();

    // ユーザー登録（例：User モデル使用）
        User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    // サンクスページやログインページにリダイレクト
    return redirect()->route('login');
}

}
