<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class PinController extends Controller
{
    public function handlePin(Note $note)
    {
        if ($note->pin == true) {
            $note->pin = false;
        } else {
            $note->pin = true;
        }
        $note->save();

        return back();
    }
}
