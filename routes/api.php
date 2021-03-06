<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ApiController::class, 'get_api_info']);
Route::get('/info', [ApiController::class, 'get_api_info']);
Route::get('/next', [ApiController::class, 'get_next_own_event']);
Route::get('/next-event', [ApiController::class, 'get_next_own_event']);
Route::get('/upcoming', [ApiController::class, 'get_list_future_event']);
Route::get('/upcoming-events', [ApiController::class, 'get_list_future_event']);
Route::get('/event/{id}', [ApiController::class, 'get_by_id']);
Route::post('/register', [ApiController::class, 'register']);
Route::get('register', function() {
    return [
        "Error" => "You have to use the POST method."
    ];
});
