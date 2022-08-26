<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AppRequestController;

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


// Route::post('/university', [RequestController::class, 'university']);

// Route::post('/subject', [RequestController::class, 'subject']);

// Route::post('/chapter', [RequestController::class, 'chapter']);

// Route::post('/sub_chapter', [RequestController::class, 'subChapter']);

// Route::post('/allQuestion', [RequestController::class, 'question']);

// Route::post('/elite', [RequestController::class, 'elite']);




// Route::post('/tryToken', [RequestController::class, 'tryToken']);

// Route::post('/checkToken', [RequestController::class, 'checkToken']);

// Route::post('/deleteToken', [RequestController::class, 'deleteToken']);

// Route::post('/existToken', [RequestController::class, 'existToken']);



Route::post('/createUser', [AppRequestController::class, 'createUser']);

Route::post('/login', [AppRequestController::class, 'loginUser']);



Route::middleware('auth:sanctum')->post('/HomeScreen', [AppRequestController::class, 'HomeScreen']);



Route::middleware('auth:sanctum')->post('/individualQuiz', [AppRequestController::class, 'individualQuiz']);



Route::middleware('auth:sanctum')->get('/allGroups', [AppRequestController::class, 'allGroups']);

Route::middleware('auth:sanctum')->post('/createGroup',[AppRequestController::class, 'createGroup']);

Route::middleware('auth:sanctum')->post('/joinGroup', [AppRequestController::class, 'joinGroup']);

Route::middleware('auth:sanctum')->post('/exitGroup', [AppRequestController::class, 'exitGroup']);

Route::middleware('auth:sanctum')->post('/deleteGroup', [AppRequestController::class, 'deleteGroup']);



Route::middleware('auth:sanctum')->get('/elite', [AppRequestController::class, 'elite']);



Route::middleware('auth:sanctum')->post('/editProfile', [AppRequestController::class, 'editProfile']);



Route::post('/checkUsername', [AppRequestController::class, 'checkUsername']);

Route::post('/checkPhone', [AppRequestController::class, 'checkPhone']);

Route::middleware('auth:sanctum')->post('/questionsNum',[AppRequestController::class, 'questionsNum']);



Route::middleware('auth:sanctum')->get('/subject', [AppRequestController::class, 'subject']);

Route::middleware('auth:sanctum')->get('/university', [AppRequestController::class, 'university']);