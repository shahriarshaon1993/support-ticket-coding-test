<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function store(UserLoginRequest $request)
    {
        $attributes = $request->validated();

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
