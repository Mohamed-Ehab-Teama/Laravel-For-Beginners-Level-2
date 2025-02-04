<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// dump("Starge 10");


class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // dd( $request->route() );
        // dd( $request->route()->getName() );
        // dd( $request->route()->getAction() );

        // dd( Route::current() );
        // dd( Route::currentRouteName() );
        // dd( Route::currentRouteAction() );

        return view('welcome');
    }
}
