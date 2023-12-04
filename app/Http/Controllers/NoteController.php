<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Nop;
use Symfony\Component\CssSelector\Node\FunctionNode;

class NoteController extends Controller
{
    public function index()
    {
        return view('index', [
            'notes' => Note::where('trash', false)->filter(request(['search', 'sortBy']))->get(),
            'pinNotes' => Note::where('pin', true)->where('trash', false)->filter(request(['search', 'sortBy']))->get(),
            'otherNotes' => Note::where('pin', false)->where('trash', false)->filter(request(['search', 'sortBy']))->get()
        ]);
    }

    public function trash()
    {
        return view('notes.trash', [
            'notes' => Note::where('trash', true)->latest()->get(),
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
            'bg_color' => request('bg_color'),
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
        $note->bg_color = request('bg_color');
        $note->save();

        return back();
    }

    public function moveToTrash(Note $note)
    {
        $note->trash = true;
        $note->save();
        return back();
    }

    public function restore(Note $note)
    {
        $note->trash = false;
        $note->save();
        return back();
    }

    public function delete(Note $note)
    {
        $note->delete();
        return back();
    }
}
