<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        auth()->loginUsingId(1);
        return inertia('Home');
    }
}
