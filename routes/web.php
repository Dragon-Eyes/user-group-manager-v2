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

/*Route::get('/welcome', function () {
    return view('welcome');
});*/

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/


//Route::get('/events', function() {
//    return 'yup from Route';
//});


//Route::get('/events', 'App\Http\Controllers\EventController@index');

/*
|--------------------------------------------------------------------------
| Legacy routes w/o auth
|--------------------------------------------------------------------------
*/
//Route::get('/', [\App\Http\Controllers\RegistrationLegacyController::class, 'index']);
Route::get('/', [\App\Http\Controllers\EventController::class, 'index']);
Route::post('/legacyregister', [\App\Http\Controllers\RegistrationLegacyController::class, 'register']);

Route::get('/pastevents', [\App\Http\Controllers\EventController::class, 'pasteventsnew']);
//Route::get('/pasteventsnew', [\App\Http\Controllers\EventController::class, 'pasteventsnew']);

Route::get('/statistics', [\App\Http\Controllers\RegistrationLegacyController::class, 'statistics']);

Route::get('/forum', function() {
    return view('legacy.forum');
});

Route::get('/migrateregistrations', [\App\Http\Controllers\DatamigrationController::class, 'registrations']);
