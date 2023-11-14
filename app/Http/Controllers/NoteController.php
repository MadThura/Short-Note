<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Nop;

class NoteController extends Controller
{
    public function index()
    {
        return view('index', [
            'notes' => Note::filter(request(['search', 'sortBy']))->get(),
            'pinNotes' => Note::where('pin', true)->get(),
            'otherNotes' => Note::where('pin', false)->get()
        ]);
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store()
    {
        $data = [
            'title' => request('title') ? request('title') : '',
            'body' => request('body') ? request('body') : '',
        ];
        Note::create($data);
        return redirect('/');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', [
            'note' => $note
        ]);
    }

    public function update(Note $note)
    {
        $note->title = request('title');
        $note->body = request('body');

        $note->save();
        
        return redirect('/');
    }

    public function delete(Note $note)
    {
        $note->delete();
        return back();
    }
}
