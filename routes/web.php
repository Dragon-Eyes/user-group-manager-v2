<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


/*
|--------------------------------------------------------------------------
| Legacy routes w/o auth
|--------------------------------------------------------------------------
*/
Route::get('/legacy', function() {
    return view('legacy.index');
});
Route::get('/pastevents', function() {
    return view('legacy.pastevents');
});
Route::get('/statistics', function() {
    return view('legacy.statistics');
});
