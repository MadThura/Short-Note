<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index', [
            'user' => auth()->user(),
            'notes' => Note::all()
        ]);
    }

    public function deleteForm()
    {
        return view('setting.delete-form');
    }

}
