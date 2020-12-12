<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SubjectController;

Route::prefix('notes')->group(function(){
    Route::post('create-new-note',[NoteController::class,'store']);
});

Route::prefix('subject')->group(function(){
    Route::get('',[SubjectController::class,'index']);
});