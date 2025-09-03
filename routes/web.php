<?php

use App\Http\Controllers\HomeController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {
    Route::get("/", [HomeController::class, 'index'])->name("home");
    Route::get("/home", [HomeController::class, 'index'])->name("home");


    Route::resource('posts', App\Http\Controllers\PostController::class);
});




