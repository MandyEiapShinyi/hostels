<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view("index");
    }

    // public function 
}
@if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif