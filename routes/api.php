<?php

use App\Http\Controllers\Api\ChatApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return ['message' => 'ok'];
});

Route::prefix('v1')
->middleware(['auth:web'])
->group(function() {
    Route::get('/users', [UserApiController::class, 'index']);
    Route::get('/messages/create', [ChatApiController::class, 'store']);
});
