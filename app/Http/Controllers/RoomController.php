<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Address;
use App\Models\Student;
use App\Models\Furniture;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function showAddRoomForm()
    {
        $furnitures = Furniture::all();
        $rooms = Room::all();
        // dd($rooms);
        return view('adminAddRoom', compact('furnitures', 'rooms'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'room_name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'person_quantity' => 'required|integer',
            'furniture' => 'nullable|array',
            'room_fee' => 'required',
            'address_id' => 'required|exists:addresses,id',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $address = Address::find($request->address_id);
        // dd($address);
        $roomCount = $address->rooms()->count();

        $roomLimit = $address->room_quantity;

        if ($roomCount >= $roomLimit) {
            
            return redirect()->back()->with('error', "It is full, doesn't have any room");
       
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/rooms', 'public');
    
            $validatedData['image'] = $imagePath;
        } else {
            return redirect()->back()->with('error', 'Image upload failed.');
        }

        $validatedData['furniture'] = json_encode($request->furniture);
        
        Room::create($validatedData);

        return redirect("/admin_show")->with('success', 'Room added successfully!')->with("page","data");
    }

    public function edit($id)
    {
        $rooms = Room::findOrFail($id);
        $furnitures = Furniture::all();
        
        return view('adminEditRoom', compact('rooms', 'furnitures'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'furniture' => 'nullable|array',
            'room_fee' => 'required',
            'person_quantity' => 'required|integer',
            'details' => 'nullable|string',
        ]);
        // dd($request);

        $rooms = Room::findOrFail($id);
        // dd(json_encode($request->furniture));
        $rooms->update([
            'room_name' => $request->room_name,
            'furniture' => json_encode($request->furniture),
            'room_fee' => $request->room_fee,
            'person_quantity' => $request->person_quantity,
            'details' => $request->details,
        ]);

        return redirect('/admin_show')->with('success', 'Room updated successfully.')->with("page","data");
    }

    public function delete($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect('/admin_show')->with('success', 'Room deleted successfully.')->with("page","data");
    }
}
