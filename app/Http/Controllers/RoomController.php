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
            'address_id' => 'required|exists:addresses,id',
        ]);

        $address = Address::find($request->address_id);
        // dd($address);
        $roomCount = $address->rooms()->count();

        $roomLimit = $address->room_quantity;

        if ($roomCount >= $roomLimit) {
            
            return redirect()->back()->with('error', "It is full, doesn't have any room");
       
        }

        $validatedData['furniture'] = json_encode($request->furniture);
        
        Room::create($validatedData);

        return redirect("/admin_show")->with('success', 'Room added successfully!');
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
            'person_quantity' => 'required|integer',
            'details' => 'nullable|string',
        ]);
        // dd($request);

        $rooms = Room::findOrFail($id);
        // dd(json_encode($request->furniture));
        $rooms->update([
            'room_name' => $request->room_name,
            'furniture' => json_encode($request->furniture),
            'person_quantity' => $request->person_quantity,
            'details' => $request->details,
        ]);

        return redirect('/admin_show')->with('success', 'Room updated successfully.');
    }

    public function delete($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect('/admin_show')->with('success', 'Room deleted successfully.');
    }
}
