<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Middleware\CheckLogin;

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



Route::middleware([CheckLogin::class])->group(function(){

    Route::get('/dashboard', [HomeController::class, 'index']);
    
    Route::get('/allQuestion', [QuestionController::class, 'all']);
    
    Route::get('/addQuestion', [QuestionController::class, 'index'])->middleware(CheckLogin::class);
    
    Route::post('/storeQuestion', [QuestionController::class, 'store']);
    
    Route::post('/editQuestion', [QuestionController::class, 'update']);
    
    Route::get('/editQuestion/{id}', [QuestionController::class, 'edit']);
    
    Route::patch('/editQuestion/{id}', [QuestionController::class, 'edit']);
    
    Route::get('/detailQuestion/{id}', [QuestionController::class, 'details']);
    
    Route::get('/deleteQuestion/{id}', [QuestionController::class, 'delete']);\

    
    
    Route::post('/tryAjax', [QuestionController::class, 'try']);
    
    Route::post('/tryAjax/edit', [QuestionController::class, 'tryEdit']);
    
    Route::post('/Request/university', [RequestController::class, 'university']);
    
    Route::post('/Request/subject', [RequestController::class, 'subject']);
    
    Route::post('Request/chapter', [RequestController::class, 'chapter']);
    
    Route::post('/Request/subChapter', [RequestController::class, 'subChapter']);
    
    Route::post('/Request/questionBySubject', [RequestController::class, 'questionBySubject']);



    Route::get('/statistics', [HomeController::class, 'statistics']);

    Route::get('/answerStatistics', [HomeController::class, 'answerStatistics']);

    Route::get('/top-student', [HomeController::class, 'topStudent']);
    


    
    Route::get('/users', [HomeController::class, 'users']);

    Route::post('/userFilter', [HomeController::class, 'userFilter']);
    
    
    
    Route::get('/profile', [HomeController::class, 'profile']);
    
    Route::get('/newAdmin', [HomeController::class, 'newAdmin']);
    
    Route::post('/newAdmin', [HomeController::class, 'addAdmin']);
    
    


    Route::get('/subject', [HomeController::class, 'subject']);

    Route::get('/newSubject', [HomeController::class, 'newSubject']);

    Route::post('/newSubject', [HomeController::class, 'addSubject']);

    Route::get('/edit-subject/{id}', [HomeController::class, 'editSubject']);

    Route::post('/edit-subject', [HomeController::class, 'updateSubject']);

    Route::get('/delete-subject/{id}', [HomeController::class, 'deleteSubject']);



    Route::get('/privilege', [HomeController::class, 'privilege']);

    Route::post('/privilege', [HomeController::class, 'changePrivilege']);



    Route::get('/company', [HomeController::class, 'company']);

    Route::get('/new-company', [HomeController::class, 'new_company']);

    Route::post('/new-company', [HomeController::class, 'add_company']);

    Route::get('/edit-company/{id}', [HomeController::class, 'edit_company']);

    Route::patch('/edit-company/{id}', [HomeController::class, 'update_company']);

    Route::get('/delete-company/{id}', [HomeController::class, 'delete_company']);


    Route::get('/new-copon', [HomeController::class, 'new_copon']);

    Route::post('/new-copon', [HomeController::class, 'add_copon']);

    Route::get('/edit-copon/{id}', [HomeController::class, 'edit_copon']);

    Route::patch('/edit-copon/{id}', [HomeController::class, 'update_copon']);

    Route::get('/requested-copon', [HomeController::class, 'requested_copon']);

    Route::get('/delete-copon/{id}', [HomeController::class, 'delete_copon']);



    Route::get('/advertisement', [HomeController::class, 'advertisement']);

    Route::post('/advertisement', [HomeController::class, 'create_advertisement']);

    Route::get('/delete-advertisement/{id}', [HomeController::class, 'delete_advertisement']);
    

});


Route::get('/login', [AuthenticationController::class, 'view']);

Route::post('/login', [AuthenticationController::class, 'login']);

Route::get('/logout', [AuthenticationController::class, 'logout']);

