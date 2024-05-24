<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', ['title' => 'Register']);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'unique:customers,username'],
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:customers,email'],
            'password' => ['required', 'min:8'],
            'phone' => ['nullable']
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = new Customer($data);
        $user->save();

        if (Auth::login($user)) {
            $request->session()->regenerate();
            return redirect()->to('/');
        }

        return back()->withErrors([
            'message' => 'Something went wrong!'
        ])->withInput($data);
    }
}
