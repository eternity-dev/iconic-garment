<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {   
        return view('profile.index', [
            'title' => 'My Profile',
            'data' => [
                'user' => auth()->check() ? auth()->user() : auth()->guard('garment')->user()
            ]
        ]);
    }

    public function update(Request $request) 
    {
        $data = $request->validate([
            'profile.email' => ['nullable', 'email'],
            'profile.phone' => ['nullable', 'string'],
            'address.address' => ['nullable', 'string'],
            'address.city' => ['nullable', 'string'],
            'address.province' => ['nullable', 'string'],
            'address.country' => ['nullable', 'string'],
            'address.zip' => ['nullable', 'string'],
            'profile.logo' => ['nullable', 'image']
        ]);

        
        $user = auth()->check() ? auth()->user() : auth()->guard('garment')->user();
        $userAddress = $user->address;
        
        if ($data['profile']['logo']) {
            if (Storage::delete(storage_path($user->image_url))) {
                $user->image_url = $data['profile']['logo']->storeAs('garments', uniqid('garment-') . 'jpg', 'public');
            }
        }

        $user->email = $data['profile']['email'];
        $user->phone = $data['profile']['phone'];
        $user->save();

        $userAddress->address = $data['address']['address'];
        $userAddress->city = $data['address']['city'];
        $userAddress->province = $data['address']['province'];
        $userAddress->country = $data['address']['country'];
        $userAddress->zip = $data['address']['zip'];
        $userAddress->save();

        return to_route('user.profile.index')->with('message', 'Profile updated successfully!');
    }
}
