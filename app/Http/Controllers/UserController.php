<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function login() {
        return view('login');
    }

    public function user(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/userProfile')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));  
    }

    public function register() {
        return view('register');
    }

    public function adduser(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone_number' => 'required|numeric',
            // 'role' => 'required'
        ]);
    
        // Create a new user
        User::create([
            'name' => $request->input('name'),
            // 'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'role' => 'user',
        ]);
        
    
        return redirect('/userlogin')->with('success', 'You have registered successfully!');
    }

    // public function uploadAvatar(Request $request)
    // {
    //     $request->validate([
    //         'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $user = Auth::user();

    //     // Delete the old avatar if it exists
    //     if ($user->avatar) {
    //         Storage::delete('public/avatars/' . $user->avatar);
    //     }

    //     // Store the new avatar
    //     $avatarName = $user->id . '_avatar' . time() . '.' . $request->avatar->extension();
    //     $request->avatar->storeAs('public/avatars', $avatarName);

    //     // Update user record
    //     $user->avatar = $avatarName;
    //     $user->save();

    //     return redirect()->back()->with('success', 'Avatar uploaded successfully.');
    // }
    
}
