<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Common Resources Routes/Naming
//index - show all data -> listing || Route::get();
//show - show single data -> listing || Route::get();
//create - show form to create new -> listing 
//store - Store date -> new listing || || Route::post();
//edit - show form to edit data ||Route::put(); Route::patch();
//update - Update data -> listing
//destroy - Delete a data -> listing || Route::delete();



// All listings
Route::get('/', [ListingController::class, 'index']);

//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store Listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Store Listing data
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Job Listing
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



// Route::get('/hello', function () {
//     return response('<h1>Hello World Using response helper</h1>', 200)
//     ->header('Content-Type', 'text/plain')
//     ->header('foo', 'bar');
// });

// Route::get('/post/{id}', function ($id) {
//     dd($id);
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// // http://127.0.0.1:8000/search?name=Ayk&city=Bayombong

// Route::get('/search', function(Request $request) {
//     // dd($request);
//     // dd($request->name . ' ' . $request->city);
//     return($request->name . ' ' . $request->city);
    
// });