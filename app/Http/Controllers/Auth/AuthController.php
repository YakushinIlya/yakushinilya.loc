<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Validation;

class AuthController extends Controller
{
    public function auth()
    {
        $this->data['title'] = 'Вход в панель управления';

        return view('auth.login', $this->data);
    }

    public function login(Request $request)
    {
        $data = $request->except('_token');
        $validator = Validation::userAuthData($data);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Ошибка e-mail или пароля');
        }
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
        {
            return redirect()->route('admin')->with('success', 'Добро пожаловать!');
        }
        return redirect()->back()->with('error', 'Ошибка авторизации');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
