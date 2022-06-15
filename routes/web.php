<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AuthenticationController;

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
    // return view('welcome');
    return redirect('/dashboard');
});



Route::get('/dashboard', [HomeController::class, 'index']);

Route::get('/allQuestion', [QuestionController::class, 'all']);

Route::get('/addQuestion', [QuestionController::class, 'index']);

Route::post('/storeQuestion', [QuestionController::class, 'store']);

Route::post('/editQuestion', [QuestionController::class, 'update']);

Route::get('/editQuestion/{id}', [QuestionController::class, 'edit']);

Route::patch('/editQuestion/{id}', [QuestionController::class, 'edit']);

Route::get('/detailQuestion/{id}', [QuestionController::class, 'details']);

Route::get('/deleteQuestion/{id}', [QuestionController::class, 'delete']);

Route::get('/login', [AuthenticationController::class, 'view']);

Route::post('/login', [AuthenticationController::class, 'login']);

Route::get('/logout', [AuthenticationController::class, 'logout']);




Route::post('/tryAjax', [QuestionController::class, 'try']);

Route::post('/tryAjax/edit', [QuestionController::class, 'tryEdit']);

Route::post('/Request/university', [RequestController::class, 'university']);

Route::post('/Request/subject', [RequestController::class, 'subject']);

Route::post('Request/chapter', [RequestController::class, 'chapter']);

Route::post('/Request/subChapter', [RequestController::class, 'subChapter']);

Route::post('/Request/questionBySubject', [RequestController::class, 'questionBySubject']);