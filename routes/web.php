<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainersController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BranchController;

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

Route::get('/', function () {
    return view('inicio');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/portfolio', function () {
    return view('portfolio');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware('auth')->group(function(){
    Route::resource('trainer', TrainersController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('branch', BranchController::class);
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

