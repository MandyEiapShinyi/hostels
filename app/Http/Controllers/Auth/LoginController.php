<?php

namespace App\Http\Controllers\Auth;

use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();
        
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('admin/panel');
        }

        return back()->withErrors([
            'password' => 'The provided credentials are incorrect.',
        ]);
    }
    // public function logout()
    // {
    //     Auth::logout(); // Log out the user
    //     return redirect('/login'); // Redirect to the login page after logout
    // }
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('index');
    }

    public function index()
    {
        return view('index');
    }
    public function manageUsers()
    {
        $users = User::all();
        return view('index', ['users' => $users]);
    }

    public function addUser(Request $request)
    {
        $user = new User();
        $user->name = $request->input( 'name');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('admin_users');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin_users');
    }
    public function manageData()
    {
        $data = Data::all();
        return view('admin_data', ['data' => $data]);
    }

    public function addData(Request $request)
    {
        // Logic for adding data
        $data = new Data();
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->save();

        return redirect()->route('admin_data');
    }

    public function deleteData($id)
    {
        // Logic for deleting data
        $data = Data::find($id);
        $data->delete();

        return redirect()->route('admin_data');
    }
}
