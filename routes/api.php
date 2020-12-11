<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::prefix('posts')->group(function(){
    Route::post('create-new-post',[PostController::class,'store']);
});