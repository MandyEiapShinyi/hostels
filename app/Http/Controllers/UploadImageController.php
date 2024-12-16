<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        // Validate the request to ensure an image was uploaded
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' 
        ]);

        // Check if an image was uploaded
        if ($request->hasFile('img')) {
            // Get the file from the form
            $image = $request->file('img');

            // Define the path where you want to store the image
            $path = 'images/uploads';

            // Store the image in the defined path
            $imagePath = $image->store($path, 'public');

            // Save the image path to the database (assuming you have a model `User` or any other relevant model)
            $user = auth()->user(); // Example for authenticated user
            $user->image_path = $imagePath;
            $user->save();

            return back()->with('success', 'Image uploaded successfully!');
        }

        return back()->with('error', 'Image upload failed!');
    }
}
