<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit(User $user)
    {
        if (request('name') != $user->name) {
            request()->validate([
                'name' => ['max:20'],
            ], [
                'name.max' => "Not more than 20 characters.",
            ]);
            $user->name = request('name');
            $user->update();
            return back()->with('success', 'Hi ' . request('name') . '! Your name is successfully changed.');
        }

        if ($file = request('photo')) {
            request()->validate([
                'photo' => ['image']
            ]);
            if ($user->photo != "/images/M A D.png" && $path = public_path($user->photo)) {
                File::delete($path);
            }
            $user->photo = '/storage/' . $file->store('/profiles');
            $user->update();
            return back()->with('success', 'Hi ' . $user->name . '! Your profile picture is successfully changed.');;
        }

        if (request('oldPassword') && request('password')) {
            request()->validate([
                'oldPassword' => ['min:8'],
                'password' => ['confirmed', 'min:8'],
            ], [
                'oldPassword.min' => "Not less than 8 characters.",
                'password.min' => "Not less than 8 characters.",
                'password.confirmed' => "Something's wrong",
            ]);

            if (Hash::check(request('oldPassword'), $user->password)) {
                $user->password = request('password');
                $user->update();
                auth()->logout();
                return redirect('/login')->with('success', 'Hi, Your password is successfully changed!');
            } else {
                return back()->withErrors([
                    'oldPassword' => 'Your old password is wrong'
                ])->withInput();
            }
        }
        return back();
    }

    public function destroy(User $user)
    {
        request()->validate([
            'password' => ['required', 'min:8']
        ], [
            'email' => "Your email doesn't exit."
        ]);

        if (Hash::check(request('password'), $user->password)) {
            $user->delete();
            return redirect('/');
        } else {
            return back()->withErrors([
                'password' => 'Your password is wrong'
            ]);
        }
    }
}
