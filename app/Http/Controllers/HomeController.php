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



        // Request Path & Methods
        // dd($request->path());
        // dd($request->is('/'));
        // dd($request->is('/hello'));
        // dd($request->routeIs('test'));
        // dd( $request->url() );
        // dd( $request->fullUrl() );
        // dd( $request->fullUrlWithoutQuery('name') );
        // dd( $request->fullUrlWithoutQuery(['name', 'age']) );
        // dd( $request->method() );
        // dd( $request->isMethod('get') );



        // Request Inputs
        // dd( $request->all() );
        // dd( $request->collect() );
        // dd( $request->input() );
        // dd( $request->query() );
        // dd( $request->boolean('admin') );
        // dd( $request->date('dob') );
        // dd( $request->only('name') );
        // dd( $request->only(['name', 'age', 'dob']) );
        // dd( $request->except('name') );
        // dd( $request->except(['name', 'age', 'dob']) );


        // Request Inputs Presence
        // dd( $request->has('name') );
        // dd( $request->hasAny(['name', 'age', 'cam']) );
        // $request->whenHas('name0', function() {
        //     dump('Name Is Existed');
        // }, function() {
        //     dump('Name is not existed');
        // });
        
        // dd( $request->filled('name') );
        // dd( $request->anyFilled(['name', 'age', 'cam']) );
        // $request->whenFilled('name', function() {
        //     dump('Name Is Existed');
        // }, function() {
        //     dump('Name is not existed');
        // });

        // dd( $request->missing('name4') );
        // $request->whenMissing('name', function() {
        //     dump('Name is not existed');
        // }, function() {
        //     dump('Name Is Existed');
        // });



        return view('welcome');
    }
}
