<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Garment;
use App\Models\GarmentAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GarmentRegisterController extends Controller
{
    public function index()
    {
        return view('auth.register-garment', ['title' => 'Register Garment']);
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
            'logo' => ['required', 'image'],
            'address' => ['required'],
            'city' => ['required'],
            'province' => ['required'],
            'country' => ['required'],
            'zip' => ['required']
        ]);

        $profileImageName = uniqid('garment-') . '.jpg';
        $profileImagePath = null;

        if ($data['logo']) {
            if ($data['logo']->isValid()) {
                $profileImagePath = $data['logo']->storeAs('garments', $profileImageName, 'public');
            }
        }

        $user = new Garment([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'image_url' => $profileImagePath
        ]);

        if ($user->save()) {
            $userAddress = new GarmentAddress([
                'garment_id' => $user->id,
                'address' => $data['address'],
                'city' => $data['city'],
                'province' => $data['province'],
                'country' => $data['country'],
                'zip' => $data['zip'],
            ]);

            if ($userAddress->save()) {
                Auth::guard('garment')->login($user);
                $request->session()->regenerate();

                return redirect()->to('/');
            }
        }

        return back()->withErrors([
            'message' => 'Something went wrong!'
        ])->withInput($data);
    }
}
