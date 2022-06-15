<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;

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


Route::post('/university', [RequestController::class, 'university']);

Route::post('/subject', [RequestController::class, 'subject']);

Route::post('/chapter', [RequestController::class, 'chapter']);

Route::post('/sub_chapter', [RequestController::class, 'subChapter']);

Route::post('/allQuestion', [RequestController::class, 'question']);

Route::post('/elite', [RequestController::class, 'elite']);
