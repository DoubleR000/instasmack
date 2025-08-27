<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {
    Route::get("/", function () {
        return Inertia::render("Home", [
            "posts" => Post::orderByDesc("created_at")->get()
        ]);
    })->name("home");


    Route::resource('posts', App\Http\Controllers\PostController::class);
});




