<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RequestController extends Controller
{


    public function university(Request $request)
    {
        $universities = DB::table('university')->where('learning_type', '=', $request->learning_type)->get();

        return response()->json([
            'university' => $universities
        ]);
    }
    

    public function subject(Request $request)
    {
        $request->validate([
            'university' => 'required',
            'year' => 'required'
        ]);


        $subject = DB::table('university_year')->join('subject', 'subject.id', '=', 'university_year.subject_id')
                                               ->where('university_year.university_id' , '=', $request->university)
                                               ->where('university_year.year', '=', $request->year)
                                               ->get(array('subject.id', 'subject.name'));


        return response()->json([
            'subject' => $subject
        ]);

    }


    public function chapter(Request $request)
    {
        $request->validate([
            'subject' => 'required'
        ]);

        $chapter = DB::table('chapter')->where('subject_id', '=', $request->subject)->get();

        return response()->json([
            'chapter' => $chapter
        ]);
    }


    public function subChapter(Request $request)
    {
        $request->validate([
            'chapter' => 'required'
        ]);

        $subChapter = DB::table('sub_chapter')->where('chapter_id', '=', $request->chapter)->get();

        return response()->json([
            'subChapter' => $subChapter
        ]);
    }

    public function question(Request $request)
    {
        $request->validate([
            'university' => 'required',
            'year_time' => 'required',
            'subject' => 'required',
            'sub_chapter' => 'required',
            'type' => 'required'
        ]);

        $question = DB::table('question')->where(['university_id' => $request->university, 'subject_id' => $request->subject, 'year_time' => $request->year_time, 'sub_chapter_id' => $request->sub_chapter, 'type' => $request->type])->get();

        return response()->json([
            'qeustion' => $question
        ]);
    }

    public function elite(Request $request)
    {

        $elite = DB::table('users')->where('role', '=', 'user')->orderBy('correct_questions', 'asc')->limit(3)->get();

        return response()->json([
            'elite' => $elite
        ]);
        
    }


    public function questionBySubject(Request $request)
    {


        $question = DB::table('question')->where('subject_id', '=', $request->subject)->get();



        $questions = DB::table('question');

        if(isset($request->learning_type))
        {
            $questions = $questions->where('question.learning_type', '=', $request->learning_type);
        }
        if(isset($request->subject))
        {
            $questions = $questions->where('question.subject_id', '=', $request->subject)
                                   ->join('subject', 'subject.id', '=', 'question.subject_id');
        }
        else
        {
            $questions = $questions->join('subject', 'subject.id', '=', 'question.subject_id');
        }
        if(isset($request->type))
        {
            $questions = $questions->where('type', '=', $request->type);
        }

        
        $questions = $questions->join('university', 'university.id', '=', 'question.university_id')
                               ->join('university_year', 'university_year.subject_id', '=', 'question.subject_id')
                               ->get(array('question.id', 'question.title', 'university.name as university', 'question.learning_type', 'university_year.year', 'subject.name as subject'));


        return response()->json([
            'questions' => $questions
        ]);
    }





    // public function tryToken(Request $request)
    // {
    //     // $user = User::where('email', '=', 'ahmad@suaalplus.sy')->get();

    //     // $token = $user->createToken('deviceName')->plainTextToken;


    //     $user = User::create([
    //         'first_name' => 'me2',
    //         'email' => 'me2@suaalplus.sy',
    //         'password' => Hash::make(123456789)
    //     ]);

    //     $token = $user->createToken('newUser')->plainTextToken;


    //     return response()->json([
    //         'yourToken' => $token,
    //         'message' => 'success'
    //     ]);

    // }


    // public function checkToken(Request $request)
    // {
    //     $user = User::where('email', '=', 'me2@suaalplus.sy')->firstOrFail();


    //     $token = $user->createToken('newToken')->plainTextToken;

    //     return response()->json([
    //         'message' => 'success',
    //         'token' => $token
    //     ]);
    // }


    // public function deleteToken(Request $request)
    // {
    //     $user = User::where('email', '=',$request->email)->firstOrFail();

    //     $user->tokens()->where('tokenable_id', '=', $user->id)->delete();

    //     return response()->json([
    //         'message' => 'success'
    //     ]);
    // }


    // public function existToken(Request $request)
    // {
    //     $user = User::where('email', '=', $request->email)->firstOrFail();

    //     $token = $user->tokens()->where('tokenable_id', '=', $user->id)->first();

    //     return response()->json([
    //         'token' => $token
    //     ]);
    // }






}
