<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return inertia('Login/Index');
    }

    public function store(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['E-mail e/ou senha invalidos'],
            ]);
        }

        if(auth()->attempt($request->validated())) {
            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'email' => ['E-mail e/ou senha invalidos'],
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
