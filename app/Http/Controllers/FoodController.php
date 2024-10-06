<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        // You can pass food data here
        return view('dashboard');
    }
}
