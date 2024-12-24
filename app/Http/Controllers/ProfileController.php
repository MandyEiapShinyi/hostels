<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\sendmail;
use App\Models\Address;
use App\Models\Service;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\PaymentReceipt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student=student::where("user_id",$user->id)->get();
        
        return view('profile', ['user' => $user]);
    }


    public function information() 
    {
        $students = Auth::user();
        $user = Auth::user();
        $furniture=$students->student->room->furniture;    
        // dd($students); 
        // if ($students && $students->room) {
        //     // Get the furniture details from the room
        //     // $furniture = $students->room->furniture;
            
        //     // Return the room information view with the student's data and furniture
            
        // } 
        return view('roomInformation', compact('students', 'furniture', 'user'));
    }

    public function hostel() 
    {
        $user = Auth::user();
        // dd($user->paymentReceipt);
        $paymentReceipts = $user->fetchhistory;
        // dd($user->fetchhistory);
        return view('hostelFee', compact('paymentReceipts', 'user'));
    }

    public function ruleRoom()
    {
        $user = Auth::user();

        return view('rules', compact('user'));
    }

    public function service() 
    {
        $data = Service::all();
        $user = Auth::user();
        // dd($data);
        return view('serviceReport', compact('data', 'user'));
    }

    public function reminder()
    {
        $user = Auth::user();
        $serviceReports = Service::where('user_id', $user->id)
                                   ->orderBy('is_serviced')
                                   ->get();

        // dd($serviceReports);
        
        return view('reminderFee', compact('serviceReports'));
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
            'is_serviced' => 0,
        ]);

        return redirect('serviceReport')->with('success', 'Report submitted successfully!');
    }

    public function signOut(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/userlogin');
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
        if(csrf_token()!=request('token')){
            return view('login');
        }

        return view('changePassword');
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

    public function updateServiceStatus(Request $request)
    {
        try {
            // Find the student by the provided student_id

            $student = Service::find($request->student_id);

            if ($student) {
                // Update the 'is_serviced' field of the student
                $student->is_serviced = $request->is_serviced;
                $student->save();

                return response()->json(['success' => true], 200); // Successfully updated
            }

            // If the student is not found, return a 404 error
            return response()->json(['error' => 'Student not found'], 404);

        } catch (\Exception $e) {
            // Handle exceptions by returning a 500 error with the message
            return response()->json([
                'error' => 'An error occurred while updating the service status',
                'message' => $e->getMessage()
            ], 500);
        }


    }
}