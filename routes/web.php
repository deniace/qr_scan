<?php

use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("participant")->name("participant")->group(function () {
    Route::get("/register", [ParticipantController::class, "register"])->name('.register');
    Route::post("/register", [ParticipantController::class, "register_store"]);
});
