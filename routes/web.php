<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// dump("Starge 09");


Route::get('/', HomeController::class)->name('test');
Route::get('/users/{id}/{name}', HomeController::class)->middleware(['throttle:watch_your_limit']);
// Route::get('/users/{id}/{name}', HomeController::class)->whereNumber('id')->whereAlpha('name');
// Route::get('/users/{id}/{name}', HomeController::class)->where([
//     'id' => '[0-9]+',
//     'name' => '[a-zA-Z]+',
// ]);
// Route::get('/users/{id}/{name}', HomeController::class)->where('id','[0-9]+');
// Route::get('/users/{id}/{name}', HomeController::class)->where('name','[a-zA-Z]+');


Route::prefix('dashboard')->group(function () {

    // ==================================== dashboard main page
    Route::view('/', 'dashboard')->name('dashboard');

    // ============================================= products
    Route::resource('products', ProductController::class);

});


// FallBak Route
Route::fallback( function() {
    return to_route('test');
} );


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/merchant.php';
