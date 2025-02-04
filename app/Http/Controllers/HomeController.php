<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// dump("Starge 10");


class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('welcome');
    }
}
