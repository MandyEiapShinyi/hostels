<?php

namespace App\Http\Controllers\Auth;

use App\Models\Room;
use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('adminLogin');
    }

    public function adminUser(Request $request)
    {   
        // dd($request);
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('name', $request->name)->first();

    // Check if user exists and password is correct
    if ($user && Hash::check($request->password, $user->password)) {
        // Log the user in
        Auth::login($user);
    
    }
      
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {

          if(Auth::user()->role=='admin'){
            return redirect()->intended('/admin_show')->with('success', 'Login successful!');
          }

        }

        Auth::logout();

        return redirect('/admin_show')->with('success', 'Login Failed');
    }

    public function adminIndex()
    {
        return view('adminIndex');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin_show');
    }
    

}
