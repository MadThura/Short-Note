<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
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

        // Create a new table for the user
        $tableName = 'user_' . $user->id; // You can use a unique identifier for the table name
        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->string('bg_color')->default('#fff');
            $table->boolean('pin')->default(0);
            $table->boolean('archieve')->default(0);
            $table->timestamps();
        });

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
        if (auth()->attempt([
            'email' => $cleanData['email'],
            'password' => $cleanData['password']
        ])) {
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
