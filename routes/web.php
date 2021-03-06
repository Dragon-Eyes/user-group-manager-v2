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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin');
    Route::get('/eventcreate', [\App\Http\Controllers\AdminController::class, 'eventcreate'])->name('eventcreate');
    Route::post('/eventcreate', [\App\Http\Controllers\AdminController::class, 'eventsavenew'])->name('eventsavenew');
    Route::get('/eventedit/{id}', [\App\Http\Controllers\AdminController::class, 'eventedit'])->name('eventedit');
    Route::post('/eventsave', [\App\Http\Controllers\AdminController::class, 'eventsave'])->name('eventsave');
    Route::post('/contentsave', [\App\Http\Controllers\AdminController::class, 'contentsave'])->name('contentsave');
    Route::get('/registration/{id}/delete', [\App\Http\Controllers\RegistrationController::class, 'destroy']);
});


/*Route::get('/welcome', function () {
    return view('welcome');
});*/

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');


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
Route::get('/', [\App\Http\Controllers\EventController::class, 'index'])->name('index');
Route::post('/legacyregister', [\App\Http\Controllers\RegistrationLegacyController::class, 'register']);

Route::get('/pastevents', [\App\Http\Controllers\EventController::class, 'pastevents']);
//Route::get('/pasteventsnew', [\App\Http\Controllers\EventController::class, 'pasteventsnew']);

Route::get('/statistics', [\App\Http\Controllers\RegistrationLegacyController::class, 'statistics']);

Route::get('/forum', function() {
    $content = \App\Http\Controllers\ContentController::get_forum_html();
    return view('legacy.forum', ['content' => $content]);
});

//Route::get('/migrateregistrations', [\App\Http\Controllers\DatamigrationController::class, 'registrations']);

Route::get('livewire', function() {
    return view('legacy.livewiretest');
});
