<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index() 
    {
        $reviews = Review::all();
        $rooms = Room::all();
        
        return view("index", compact('reviews', 'rooms'));
    }

    public function contact()
    {
        return view("contact");
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        // dd($validatedData);

        $emailData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
        ];
        // dd($emailData);

        Mail::send([], [], function (Message $message) use ($emailData) {
            $message->from($emailData['email'], $emailData['name'])
                    ->to('mandyshinyi@gmail.com') 
                    ->subject($emailData['subject'])
                    ->text($emailData['message']);
        });
        
        return redirect("/contact")->with('success', 'Your message has been sent successfully!');
    }

    public function header() 
    {
        return view('header');
    }

    public function about() 
    {
        return view('about');
    }

    public function room() 
    {
        $rooms = Room::all();

        // return view('index', compact('rooms'));
        return view('room', compact('rooms'));
    }

    public function reviewroom() 
    {
        return view('reviewroom');
    }

    public function stores() 
    {
        return view('stores');
    }

    public function review(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Review::create($validated);

        return redirect()->to(url()->previous() . '#reviewForm')->with('success', 'Review submitted successfully!');
    }

}