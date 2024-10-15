<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() 
    {
        $reviews = Review::all();
        return view("index", compact('reviews'));
    }

    public function review(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Review::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    public function contect() {
        return view('contect');
    }
}