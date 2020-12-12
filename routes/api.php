<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SubjectController;

Route::prefix('notes')->group(function(){
    Route::get('{note}',[NoteController::class,'index']);
    Route::get('',[NoteController::class,'index']);
    Route::post('create-new-note',[NoteController::class,'show'])->name('note.show');
});

Route::prefix('subject')->group(function(){
    Route::get('',[SubjectController::class,'index']);
});