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





Route::post('/createUser', [AppRequestController::class, 'createUser']);

Route::post('/login', [AppRequestController::class, 'loginUser']);



Route::middleware('auth:sanctum')->post('/HomeScreen', [AppRequestController::class, 'HomeScreen']);



Route::middleware('auth:sanctum')->post('/individualQuiz', [AppRequestController::class, 'individualQuiz']);

Route::middleware('auth:sanctum')->post('/quizResult', [AppRequestController::class, 'quizResult']);



Route::middleware('auth:sanctum')->post('/allGroups', [AppRequestController::class, 'allGroups']);

Route::middleware('auth:sanctum')->post('/createGroup',[AppRequestController::class, 'createGroup']);

Route::middleware('auth:sanctum')->post('/editGroup',[AppRequestController::class, 'editGroup']);

Route::middleware('auth:sanctum')->post('/joinGroup', [AppRequestController::class, 'joinGroup']);

Route::middleware('auth:sanctum')->post('/exitGroup', [AppRequestController::class, 'exitGroup']);

Route::middleware('auth:sanctum')->post('/deleteGroup', [AppRequestController::class, 'deleteGroup']);

Route::middleware('auth:sanctum')->post('/createRound', [AppRequestController::class, 'createRound']);

Route::middleware('auth:sanctum')->post('/startRound', [AppRequestController::class, 'startRound']);

Route::middleware('auth:sanctum')->post('/groupResult', [AppRequestController::class, 'groupResult']);

Route::middleware('auth:sanctum')->post('/roundHistory', [AppRequestController::class, 'roundHistory']);



Route::middleware('auth:sanctum')->get('/elite', [AppRequestController::class, 'elite']);



Route::middleware('auth:sanctum')->get('/copon', [AppRequestController::class, 'copon']);

Route::middleware('auth:sanctum')->post('/userCopon', [AppRequestController::class, 'userCopon']);



Route::middleware('auth:sanctum')->post('/editProfile', [AppRequestController::class, 'editProfile']);



Route::post('/checkUsername', [AppRequestController::class, 'checkUsername']);

Route::post('/checkPhone', [AppRequestController::class, 'checkPhone']);

Route::middleware('auth:sanctum')->post('/questionsNum',[AppRequestController::class, 'questionsNum']);



Route::middleware('auth:sanctum')->get('/subject', [AppRequestController::class, 'subject']);

Route::middleware('auth:sanctum')->get('/university', [AppRequestController::class, 'university']);