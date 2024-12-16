<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Student;
use App\Models\Furniture;
use Illuminate\Http\Request;
use App\Models\PaymentReceipt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    public function showAddForm()
    {
        $students = Student::with('room')->get();

        $students->map(function ($student) {
            $checkInDate = \Carbon\Carbon::parse($student->date);
            $sixMonthsLater = $checkInDate->addMonths(6);
            // dd(($sixMonthsLater));
            $currentDate = \Carbon\Carbon::now();

            $student->is_due = $currentDate->greaterThan($sixMonthsLater);

            return $student;
        });

    return view('adminIndex', compact('students'));
}

    public function addStudent(Request $request)
    {

        // dd(123);
        $validatedData = $request->validate([
            'user_id' => 'required|string|max:255|unique:students,user_id',
            'phone_number' => 'required|string|regex:/\d{3}-\d{3}-\d{4}/',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'room_id' => 'required',
            'address_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        

        // dd($request->room_id);
        $room = Room::find($request->room_id);
        
        if (!$room) {
            return redirect()->back()->with('error', 'The specified room does not exist.');
        }
        
        $currentStudentCount = Student::where('room_id', $request->room_id)->count();

        $roomLimit = $room->person_quantity;

        if ($currentStudentCount >= $roomLimit) {
            return redirect()->back()->with('error', 'This room has reached its capacity.');
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/students', 'public');
    
            $validatedData['image'] = $imagePath;
        } else {
            return redirect()->back()->with('error', 'Image upload failed.');
        }

        Student::create($validatedData);

        return redirect("/admin_show")->with('success', 'Student added successfully.')->with("page","users");
    }

    public function adminPanel(Request $request)
    {
        $totalStudents = Student::count();
        $totalRooms = Room::count();
        $totalFurnitures = Furniture::count();
        $totalPersonQuantity = Room::sum('person_quantity');
        $students = Student::all();

        $studentFees = Student::all();
        $studentFees = $students->map(function ($student) {
            // Assuming 'created_at' is the check-in date or registration date
            $checkInDate = \Carbon\Carbon::parse($student->date);
            $sixMonthsLater = $checkInDate->addMonths(6);
            $currentDate = \Carbon\Carbon::now();
    
            // Mark the student as due if the current date is greater than 6 months from the check-in date
            $student->is_due = $currentDate->greaterThan($sixMonthsLater);
            
            return $student;
        });

        $rooms = Room::all();
        $furnitures = Furniture::all();
        $addresses = Address::all();
        $feedbacks = Contact::all();
        $serviceReports = Service::with(["user.student.address","user.student.room"])->get();
        $service = Service::count();
        $paymentReceipts = PaymentReceipt::with('user')->get();

        $users = User::where('role', 'user')->get();
        


        return view('adminIndex', compact('students', 'rooms', 'furnitures', 'totalStudents', 'totalRooms', 'addresses','totalPersonQuantity','feedbacks', 'serviceReports', 'users', 'service', 'studentFees', 'paymentReceipts'));
    }

    public function getRooms($addressId)
    {
        
        $rooms = Room::WHERE("address_id", $addressId)->get();
        
        return response()->json([
            "room"=>$rooms,
            "message","success",
        ],201);
    }

    public function getStudents($userId)
    {
        
        
        $students = Student::WHERE("user_id", $userId)->get();
        
        if(count($students)>0) {
            return response()->json([
            "user_id"=>$students,
            "message"=>"success",
        ],201);
        }
        return response()->json([
            "message","fail",
        ],201);
    }

    public function countroom($roomid){
        $room=Room::find($roomid);
        $studentcount=Student::WHERE("room_id",$roomid)->count();
        if($studentcount>=$room->person_quantity){
            $message="sry this room already full";
            $color="red";
        }else{
            $message="room available";
            $color="green";
        }
        return response()->json([
            "message"=>$message,
            "color"=>$color,
        ]);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('/admin_show')->with('success', 'Student deleted successfully!')->with("page","users");
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $rooms = Room::all();

        return view('adminEditStudent', compact('student', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|string|max:255',
            'phone_number' => 'required',
            'date' => 'required|date', 
            'email' => 'required|email|max:255|unique:students,email,' . $id,
        ]);
    
        $student = Student::findOrFail($id);

        $student->update([
            'student_name' => $request->input('student_name'),
            'phone_number' => $request->input('phone_number'),
            'date' => $request->input('date'),
            'email' => $request->input('email'),
        ]);

        return redirect('/admin_show')->with('success', 'Student updated successfully!')->with("page","users");
    }

    public function adminRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone_number' => 'required|numeric',
        ]);
        
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'role' => 'user',
        ]);
        
    
        return redirect('/admin_show')->with('success', 'You have registered successfully!');
    }

} 

    