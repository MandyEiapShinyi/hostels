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

    public function contact() {
        return view('contact');
    }

    public function header() {
        return view('header');
    }

    public function about() {
        return view('about');
    }

    public function room() {
        return view('room');
    }

    public function reviewroom() {
        return view('reviewroom');
    }

    public function stores() {
        return view('stores');
    }

}