<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register()
    {
        return view('register.register');
    }

    public function registerStore()
    {
        $cleanData = request()->validate([
            'name' => ['required', 'max:20'],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8',
        ], [
            'name.max' => "Not more than 20 characters.",
            'email' => "Your email has already registered.",
            'password.min' => "Not less than 8 characters.",
            'password.confirmed' => "Something's wrong",
        ]);

        $user = User::create($cleanData);
        auth()->login($user);

        return redirect('/')->with('success', 'Hi ' . auth()->user()->name . '! Welcome from Short Note.');
    }

    public function login()
    {
        return view('login.login');
    }

    public function loginStore()
    {
        $cleanData = request()->validate([
            'email' => ['required', Rule::exists('users', 'email')],
            'password' => ['required', 'min:8']
        ], [
            'email' => "Your email doesn't exit."
        ]);
        $remember = request('remember') ? request('remember') : 0;
        if (auth()->attempt([
            'email' => $cleanData['email'],
            'password' => $cleanData['password']
        ], $remember)) {
            return redirect('/')->with('success', 'Hi ' . auth()->user()->name . '! Welcome back from Short Note');
        } else {
            return redirect('/login')->withErrors([
                'password' => 'Your password is wrong'
            ])->withInput();
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/welcome');
    }

}
