<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\CreateNoteRequest;
use App\Http\Requests\UpdateNoteRequest;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function store(CreateNoteRequest $request)
    {
        $validatedData = $request->validated();
        $note = Note::create($validatedData);

        return response()->json($note, 201);
    }

    public function show(Note $note)
    {
        return response()->json($note);
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        $validatedData = $request->validated();
        $note->update($validatedData);
    
        return response()->json($note);
    }
    public function destroy(Note $note)
    {
        $note->delete();

        return response()->json(null, 204);
    }
}
