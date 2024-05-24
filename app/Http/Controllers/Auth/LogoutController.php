<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {

        if (Auth::guard('garment')->check()) {
            // if the garment user is logged in 
            // then logout the garment user 
            Auth::guard('garment')->logout();

            $request->session()->regenerate();
            return to_route('auth.login.get');
        } else if (Auth::check()) {
            // if the customer user is logged in
            // then logout the customer user
            Auth::logout();

            $request->session()->regenerate();
            return to_route('auth.login.get');
        }

        return back()->withErrors([
            'message' => 'Something went wrong!'
        ]);
    }
}
