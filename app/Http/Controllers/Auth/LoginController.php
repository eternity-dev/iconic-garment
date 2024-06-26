<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required', 'min:8']
        ]);

        if (Auth::attempt($data) || Auth::guard('garment')->attempt($data)) {
            $request->session()->regenerate();
            return redirect()->to('/');
        } 

        return back()->withErrors([
            'message' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }
}
