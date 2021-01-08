<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SubjectController;

Route::prefix('notes')->group(function(){
    Route::get('',[NoteController::class,'index']);
    Route::get('{note}',[NoteController::class,'show']);
    Route::post('create-new-note',[NoteController::class,'store'])->name('note.show');
    Route::put('edit/{note}',[NoteController::class,'update'])->name('note.update');
    Route::delete('delete/{note}',[NoteController::class,'destroy'])->name('note.delete');
});

Route::prefix('subject')->group(function(){
    Route::get('',[SubjectController::class,'index']);
});