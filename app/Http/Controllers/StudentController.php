<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Student;
use App\Models\Furniture;
use App\Models\Address;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function showAddForm()
    {
        // $rooms = Room::all();
        $students = Student::with('room')->get();
        // return view('adminAdd', ['rooms' => $rooms]);
        return view('adminIndex', compact('students'));
    }

    public function addStudent(Request $request)
    {
        $validatedData = $request->validate([
            'student_name' => 'required|string|max:255',
            'phone_number' => 'required|string|regex:/\d{3}-\d{3}-\d{4}/',
            'email' => 'required|email|max:255',
            'room_id' => 'required',
            'address_id' => 'required',
        ]);
        
        $room = Room::find($request->room_id);
        // dd($room);
        
        if (!$room) {
            return redirect()->back()->with('error', 'The specified room does not exist.');
        }
        
        $currentStudentCount = Student::where('room_id', $request->room_id)->count();

        // dd($currentStudentCount);

        $roomLimit = $room->person_quantity;
        // dd($roomLimit);

        if ($currentStudentCount >= $roomLimit) {
            return redirect()->back()->with('error', 'This room has reached its capacity.');
        }

        Student::create($validatedData);

        return redirect("/admin_show")->with('success', 'Student added successfully.');
    }

    public function adminPanel()
    {
        $totalStudents = Student::count();
        $totalRooms = Room::count();
        $totalFurnitures = Furniture::count();
        $totalPersonQuantity = Room::sum('person_quantity');

        $students = Student::all();
        $rooms = Room::all();
        // dd($rooms);
        $furnitures = Furniture::all();
        $addresses = Address::all();

        return view('adminIndex', compact('students', 'rooms', 'furnitures', 'totalStudents', 'totalRooms', 'addresses','totalPersonQuantity'));
    }

    public function getRooms($addressId)
    {
        
        $rooms = Room::WHERE("address_id", $addressId)->get();
        
        return response()->json([
            "room"=>$rooms,
            "message","success",
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

        return redirect('/admin_show')->with('success', 'Student deleted successfully!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('adminEditStudent', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            // 'room_id' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email,' . $id,
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'student_name' => $request->input('student_name'),
            'phone_number' => $request->input('phone_number'),
            // 'room_id' => $request->input('room_id'),
            'email' => $request->input('email'),
        ]);

        return redirect('/admin_show')->with('success', 'Student updated successfully!');
    }
    
} 

    