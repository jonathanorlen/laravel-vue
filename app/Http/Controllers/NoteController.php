<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Note, Subject};
use App\Http\Resources\NoteResource;
use Str;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $notes = Note::with('subject')->latest()->get();
        return NoteResource::collection($notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'subject' => 'required',
            'title' => 'required|min:6',
            'description' => 'required',
        ]);

        $subject = Subject::findOrFail($request->subject);
        $notes = Note::create([
            'subject_id' => $subject->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Your note was created',
            'note' => $notes
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return new NoteResource($note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
