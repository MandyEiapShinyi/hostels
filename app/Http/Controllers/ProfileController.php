<?php

namespace App\Http\Controllers;

use App\Mail\sendmail;
use App\Models\User;
use App\Models\Address;
use App\Models\PaymentReceipt;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile', ['user' => $user]);
    }


    public function information() 
    {
        $students = Auth::user();
        $furniture=$students->student->room->furniture;    
        // dd($students); 

        return view('roomInformation', compact('students'));
    }

    public function hostel() 
    {
        $user = Auth::user();
        // dd($user->paymentReceipt);
        $paymentReceipts = $user->fetchhistory;
        // dd($user->fetchhistory);
        return view('hostelFee', compact('paymentReceipts'));
    }

    public function service() 
    {
        $data = Service::all();
        // dd($data);
        return view('serviceReport', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:5000',
            'message' => 'required|string|max:5000',
        ]);
        // dd($request);

        Service::create([
            'user_id' => Auth::user()->id,
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect('serviceReport')->with('success', 'Report submitted successfully!');
    }

    public function signOut(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function showRoom()
    {
        $student = Auth::user();

        $address = $student->address;

        dd($address);
        $room = $student->room_name;

        return view('student.profile', compact('student', 'address', 'room'));
    }

    public function showChangePasswordForm()
    {
        return view('changePassword'); // View for change password form
    }

    public function sendmail(){
        $user=Auth::user();
        // dd($user);
        try {
            // Attempt to send the email
            Mail::to("mandyshinyi@gmail.com")->send(new sendmail($user));
    
            // If email was sent successfully, return success response
            return back()->with('message', 'Email sent successfully!');
        } catch (\Exception $e) {
            
    
            return back()->with('error', 'Failed to send email.');
        }
        
    }

    public function changePassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Check if the current password matches
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update the password
        Auth::user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect('/userProfile')->with('success', 'Password changed successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search logic, adjust the model and fields as needed
        $results = PaymentReceipt::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return view('search-results', compact('results'));
    }


}