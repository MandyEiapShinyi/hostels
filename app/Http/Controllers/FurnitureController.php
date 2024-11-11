<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    public function showAddFurnitureForm()
    {
        return view('adminAddFurniture');
    }

    public function addFurniture(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('furniture_images', 'public');
        }

        Furniture::create([
            'name' => $request->input('name'),
            'image' => $imagePath ?? null,
        ]);

        return redirect('/admin_show')->with('success', 'Furniture added successfully!');
    }

    public function edit($id)
    {
        $furnitures = Furniture::findOrFail($id);
        return view('adminEditFurniture', compact('furnitures'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $furniture = Furniture::findOrFail($id);
        $furniture->name = $request->input('name');
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('furniture_images', 'public');
            $furniture->image = $imagePath;
        }

        $furniture->save();

        return redirect('/admin_show')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        $furniture = Furniture::findOrFail($id);
        $furniture->delete();

        return redirect('/admin_show')->with('success', 'Furniture deleted successfully!');
    }
}
