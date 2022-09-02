<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DataController::class, "sessions"]);
Route::get('/ball', [DataController::class, "balls"]);
Route::post('/start_session', [DataController::class, "start_session"]);
Route::post('/suggest', [DataController::class, "suggest"]);
Route::get('/new', [DataController::class, "cancel"]);
Route::get('/validate', [DataController::class, "validated"]);
Route::post('/store_balls', [DataController::class, "store_balls"]);
