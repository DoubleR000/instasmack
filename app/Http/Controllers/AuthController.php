<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render("auth/Login");
    }

    public function login(LoginRequest $request)
    {
        return 'what';
    }

    public function showRegistrationForm()
    {
        return Inertia::render("auth/Register");
    }

    public function register(RegisterRequest $request)
    {

    }
}
