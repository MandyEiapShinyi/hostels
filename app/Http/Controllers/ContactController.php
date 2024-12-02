<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // public function contact(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'subject' => 'nullable|string|max:255',
    //         'message' => 'required|string'
    //     ]);

    //     // Data to send
    //     $data = [
    //         'name' => $request->input('name'),
    //         'email' => $request->input('email'),
    //         'subject' => $request->input('subject'),
    //         'message' => $request->input('message')
    //     ];

    //     Mail::send('emails.contact', $data, function($message) use ($data) {
    //         $message->to('admin@example.com')
    //                 ->subject($data['subject'] ?? 'Contact Form Message')
    //                 ->from($data['email'], $data['name']);
    //     });

    //     return redirect()->back()->with('success', 'Thank you! Your message has been sent.');
    // }

    public function contact()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        // dd($request->name);

        Contact::create($request->all());

        return redirect("/contact")->with('success', 'Your message has been sent successfully!');
    }
}
