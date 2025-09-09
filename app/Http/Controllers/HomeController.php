<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render("Home", [
            "posts" => Post::with(['user', 'media'])->latest()->get()
        ]);
    }
}
