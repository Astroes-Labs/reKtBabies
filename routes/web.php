<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RektController;

Route::post('/ajax/register', [RektController::class, 'register']);


//route to save step 1 data in session
Route::post('/store-user-session', [RektController::class, 'storeSession']);

Route::get('/details', [RektController::class, 'index'])->name('details');
Route::post('/submit-wallet', [RektController::class, 'store'])->name('submit.wallet');

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');
