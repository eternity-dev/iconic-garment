<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerAddress;
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
            'confirm_password' => ['same:password'],
            'phone' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'province' => ['required'],
            'country' => ['required'],
            'zip' => ['required']
        ]);

        $user = new Customer([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone']
        ]);

        if ($user->save()) {
            $userAddress = new CustomerAddress([
                'customer_id' => $user->id,
                'address' => $data['address'],
                'city' => $data['city'],
                'province' => $data['province'],
                'country' => $data['country'],
                'zip' => $data['zip'],
            ]);

            if ($userAddress->save()) {
                Auth::login($user);
                $request->session()->regenerate();

                return redirect()->to('/');
            }
        }

        return back()->withErrors([
            'message' => 'Something went wrong!'
        ])->withInput($data);
    }
}
