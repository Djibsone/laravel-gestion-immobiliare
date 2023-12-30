<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login () {
        return view('auth.login');
    }

    public function doLogin (LoginRequest $resquest) {
        $credentials = $resquest->validated();
        if (Auth::attempt($credentials)) {
            $resquest->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }

        return back()->with(['message' => ['type' => 'danger', 'text' => 'L\'email ou le mot de passe incorrect.']])->onlyInput('email');
    }

    public function logout () {
        Auth::logout();
        return to_route('login')->with(['message' => ['type' => 'success', 'text' => 'Vous êtes maintenant déconnecté.']]);
    }
}