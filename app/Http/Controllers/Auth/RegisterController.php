<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Validation;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registration()
    {
        $this->data['title'] = 'Регистрация';

        return view('auth.register', $this->data);
    }

    public function register(Request $request)
    {
        $data = $request->except('_token');
        $validator = Validation::userRegisterData($data);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', 'Ошибка ввода данных');
        }
        if ($this->create($data))
        {
            Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
            return redirect()->route('admin')->with('success', 'Добро пожаловать!');
        }
        return redirect()->back()->with('error', 'Ошибка регистрации');
    }

    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['first_name'],
            'email'      => $data['email'],
            'role'       => 0,
            'password'   => Hash::make($data['password']),
        ]);
    }
}
