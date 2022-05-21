<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $isType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';


        if(Auth::attempt([
            $isType    => $request->email,
            "password" => $request->password,
        ], $request->remember)) {
            session()->regenerate();
            return redirect('/dashboard')->with([
                'type' => 'success',
                'message' => 'You are logged in.'
            ]);
        }

        throw ValidationException::withMessages([
            'email' => 'The provide credentials does not match our record.',
        ]);

    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/login')->with([
            'type' => 'success', 'message' => 'You are now logout.',
        ]);
    }
}
