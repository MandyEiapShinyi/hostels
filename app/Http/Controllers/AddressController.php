<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function showAddRoomForm()
    {
        $addresss = Address::all();
        return view('adminIndex', compact('address'));
    }

    public function create()
    {
        return view('adminAddAddress');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'room_quantity' => 'required|integer|min:0',
        ]);

        Address::create($validatedData);
        
        return redirect("/admin_show")->with('success', 'Address created successfully.');
    }

    public function edit($id)
    {
        $address = Address::findOrFail($id);
        return view('adminEditAddress', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'room_quantity' => 'required|integer|min:0',
        ]);
        
        $address = Address::findOrFail($id);
        $address->update([
            'address_name' => $request->input('address_name'),
            'address' => $request->input('address'),
            'room_quantity' => $request->input('room_quantity'),
        ]);

        return redirect("/admin_show")->with('success', 'Address updated successfully.');
    }

    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return redirect("/admin_show")->with('success', 'Address deleted successfully.');
    }

    public function room(Request $request)
    {
        $request->validate([
            'address_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'room_quantity' => 'required|integer',
        ]);
    
        Address::create($request->all());
    
        return redirect()->back()->with('success', 'Room added successfully');
    }

    // public function getRooms($addressId)
    // {
    //     $address = Address::with('rooms')->find($addressId);

    //     if(!$address) {
    //         return response()->json(['message' => 'Address not found'], 404);
    //     }

    //     return response()->json([
    //         'address_name' => $address->address_name,
    //         'rooms' => $address->rooms,  // Automatically fetches related rooms
    //     ]);
    // }
}
