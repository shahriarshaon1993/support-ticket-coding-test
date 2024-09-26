<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(UserRegisterRequest $request)
    {
        $attributes = $request->validated();

        $role = Role::query()
            ->where('name', 'customer')
            ->first();

        // Create a new customer user
        $user = User::create($attributes);

        // Attach role to user
        $user->roles()->attach($role->id);

        Auth::login($user);

        return redirect()->route('home');
    }
}
