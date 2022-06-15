<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    

    // The question page 

    public function index()
    {
        $university = DB::table('university')->get();
        $subject = DB::table('subject')->get();
        $chapter = DB::table('chapter')->get();
        $sub_chapter = DB::table('sub_chapter')->get();

        return view('/questions.addQuestion', ['university' => $university, 'subject' => $subject, 'chapter' => $chapter, 'sub_chapter' => $sub_chapter]);

    }


    // Add a new question

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'learning_type' => 'required',
            'university' => 'required',
            'subject' => 'required',
            'sub_chapter' => 'required',
            'year_time' => 'required'
        ]);


        if($validator->fails())
        {
            $university = DB::table('university')->get();
            $subject = DB::table('subject')->get();
            $chapter = DB::table('chapter')->get();
            $sub_chapter = DB::table('sub_chapter')->get();


            // return response()->json(['message' => $validator->errors()->all()]);
            
            $validator->errors()->add('field', 'error message');
            throw new ValidationException($validator);

        }
        else
        {

            DB::table('question')->insert([
                'title' => $request->input('title'),
                'learning_type' => $request->input('learning_type'),
                'university_id' => $request->input('university'),
                'subject_id' => $request->input('subject'),
                'sub_chapter_id' => $request->input('sub_chapter'),
                'type' => $request->input('type'),
                'library' => $request->input('library'),
                'year_time' => $request->input('year_time')
            ]);


            return redirect('/addQuestion');
            
        }


    }


    public function all()
    {

        // $all = DB::table('question')->get();

        // $university = DB::table('university')->where('id' , '=', $all->university_id)->get();

        // $subject = DB::table('subject')->where('id', '=', $all->subject_id)->get();

        $all = DB::table('question')->join('university', 'university.id', '=', 'question.university_id')
                                    ->join('subject', 'subject.id' , '=', 'question.subject_id')
                                    ->join('university_year', 'university_year.subject_id', '=', 'question.subject_id')
                                    ->orderBy('id', 'asc')
                                    ->get(array('question.id', 'university.name', 'question.title', 'question.learning_type', 'subject.name as subject_name', 'university_year.year as year'));

                                    
        return view('questions.allQuestion', ['all' => $all]);

    }


    public function details($id)
    {

        $details = DB::table('question')->join('university', 'university.id', '=', 'question.university_id')
                                        ->join('subject', 'subject.id', '=', 'question.subject_id')
                                        ->join('sub_chapter', 'sub_chapter.id', '=', 'question.sub_chapter_id')
                                        ->where('question.id', '=', $id)
                                        ->get(array('question.id', 'question.learning_type', 'university.name as university_name', 'subject.id as subject_id', 'subject.name as subject_name', 'sub_chapter.name as sub_chapter', 'sub_chapter_id', 'year_time', 'library', 'type', 'title'));
                                        


        $sub_chapter = DB::table('sub_chapter')->where('id', '=', $details[0]->sub_chapter_id)->get(array('chapter_id'));

        $chapter = DB::table('chapter')->where('chapter.id', '=', $sub_chapter[0]->chapter_id)->get(array('chapter.name'));

        $correctAnswer = DB::table('answer')->where('question_id', '=', $id)
                                            ->where('is_correct', '=', true)
                                            ->get();
                    
        $wrongAnswer = DB::table('answer')->where('question_id', '=', $id)
                                          ->where('is_correct', '=', false)
                                          ->get();

        $specialize = DB::table('subject')->where('subject.id', '=', $details[0]->subject_id)
                                          ->join('specialize', 'specialize.id', '=', 'subject.specialize_id')
                                          ->get(array('specialize.name as specialize_name'));

        return view('/questions.detailQuestion', ['details' => $details, 'chapter' => $chapter, 'correct' => $correctAnswer, 'wrong' => $wrongAnswer, 'specialize' => $specialize]);

    }

    public function edit($id)
    {
        $details = DB::table('question')->join('university', 'university.id', '=', 'question.university_id')
                                        ->join('subject', 'subject.id', '=', 'question.subject_id')
                                        ->join('university_year', 'university_year.subject_id', '=', 'subject.id')
                                        ->join('sub_chapter', 'sub_chapter.id', '=', 'question.sub_chapter_id')
                                        ->where('question.id', '=', $id)
                                        ->get(array('question.id as question_id', 'question.learning_type', 'university_year.university_id as university_id', 'subject.id as subject_id', 'sub_chapter.id as sub_chapter_id', 'year_time', 'library', 'type', 'title', 'university_year.year'));



        $sub_chapter = DB::table('sub_chapter')->where('id', '=', $details[0]->sub_chapter_id)->get(array('chapter_id'));

        $correctAnswer = DB::table('answer')->where('question_id', '=', $id)
                                            ->where('is_correct', '=', true)
                                            ->get();
                    
        $wrongAnswer = DB::table('answer')->where('question_id', '=', $id)
                                          ->where('is_correct', '=', false)
                                          ->get();

        $university = DB::table('university')->where('learning_type', '=', $details[0]->learning_type)->get();

        $subject = DB::table('university_year')->join('subject', 'subject.id', '=', 'university_year.subject_id')
                                               ->where('university_id', '=', $details[0]->university_id)
                                               ->where('year', '=', $details[0]->year)
                                               ->get();
                    
        $chapters = DB::table('chapter')->where('subject_id', '=', $details[0]->subject_id)->get();

        $sub_chapters = DB::table('sub_chapter')->where('chapter_id', '=', $sub_chapter[0]->chapter_id)->get();

        return view('/questions.editQuestion', ['details' => $details, 'chapter' => $chapters, 'sub_chapters' => $sub_chapters, 'university' => $university, 'subject' => $subject, 'sub_chapter' => $sub_chapter, 'correct' => $correctAnswer, 'wrong' => $wrongAnswer]);

    }


    public function delete($id)
    {
        $delete = DB::table('question')->where('id', '=', $id)->delete();

        return redirect('/allQuestion');
    }









    public function try(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'learning_type' => 'required',
            'university' => 'required',
            'subject' => 'required',
            'sub_chapter' => 'required',
            'year_time' => 'required',
            'year' => 'required',
        ]);

        // $data = $request->all();

        DB::table('question')->insert([
            'title' => $request->title,
            'learning_type' => $request->learning_type,
            'university_id' => $request->university,
            'subject_id' => $request->subject,
            'sub_chapter_id' => $request->sub_chapter,
            'library' => $request->library,
            'year_time' => $request->year_time,
            'type' => $request->type
        ]);

        $question = DB::table('question')->where('title', '=', $request->title)->get(array('id'));

        for($i = 0; $i < count($request->correctArr); $i++)
        {

            DB::table('answer')->insert([
                'title' => $request->correctArr[$i],
                'question_id' => $question[0]->id,
                'is_correct' => true
            ]);
            
        }


        for($i = 0; $i < count($request->wrongArr); $i++)
        {
            
            
            DB::table('answer')->insert([
                'title' => $request->wrongArr[$i],
                'question_id' => $question[0]->id,
                'is_correct' => false
            ]);
                
        }
        
        return response()->json([
            'success' => 'succes to connect',
            'request2' => $request->correct_1,
            'request' => $request->correct_2,
            'wrongArr' => $request->wrongArr,
            'requestNum' => $request->correctNum,
            'i' => $i,
            'countArr' => count($request->wrongArr)
        ]);
    }


    public function tryEdit(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'learning_type' => 'required',
            'university' => 'required',
            'subject' => 'required',
            'sub_chapter' => 'required',
            'year_time' => 'required',
            'type' => 'required'

        ]);

        if(isset($request->library))
        {
            $library = $request->library;
        }
        else
        {
            $library = null;
        }

        DB::table('question')->where('id', '=', $request->id)->update([
                                            'title' => $request->title,
                                            'learning_type' => $request->learning_type,
                                            'university_id' => $request->university,
                                            'subject_id' => $request->subject,
                                            'sub_chapter_id' => $request->sub_chapter,
                                            'library' => $library,
                                            'year_time' => $request->year_time,
                                            'type' => $request->type ]);

        
        $correctAnswer = DB::table('answer')->where('question_id', '=', $request->id)
                                           ->where('is_correct', '=', true)
                                           ->get();                   

        $wrongAnswer = DB::table('answer')->where('question_id', '=', $request->id)
                                         ->where('is_correct', '=', false)
                                         ->get();

        if(count($correctAnswer) < $request->correctNum)
        {

            for($i = 0; $i < count($correctAnswer); $i++)
            {
                DB::table('answer')->where('id', '=', $correctAnswer[$i]->id)
                                   ->update([
                                       'title' => $request->correctArr[$i]
                                   ]);
    
            }

            $restAnswers = $request->correctNum - count($correctAnswer);
            
            $cur = count($correctAnswer);

            for($i = 0; $i < $restAnswers; $i++)
            {
                
                DB::table('answer')->insert([
                    'title' => $request->correctArr[$cur],
                    'question_id' => $request->id,
                    'is_correct' => true
                    
                ]);

                $cur += 1;
                
            }

        }
        else
        {

            for($i = 0; $i < $request->correctNum; $i++)
            {
                DB::table('answer')->where('id', '=', $correctAnswer[$i]->id)
                                   ->update([
                                       'title' => $request->correctArr[$i]
                                   ]);
            }

            $restAnswers = count($correctAnswer) - $request->correctNum;

            $cur = $request->correctNum;

            for($i = 0; $i < $restAnswers; $i++)
            {

                DB::table('answer')->where('id', '=', $correctAnswer[$cur]->id)->delete();

                $cur += 1;

            }
            
        }
        
        
        if(count($wrongAnswer) < $request->wrongNum)
        {

            for($i = 0; $i < count($wrongAnswer); $i++)
            {
                DB::table('answer')->where('id', '=', $wrongAnswer[$i]->id)
                                   ->update([
                                       'title' => $request->wrongArr[$i]
                                   ]);
    
            }

            $restAnswers = $request->wrongNum - count($wrongAnswer);
            
            $cur = count($wrongAnswer);

            for($i = 0; $i < $restAnswers; $i++)
            {
                
                DB::table('answer')->insert([
                    'title' => $request->wrongArr[$cur],
                    'question_id' => $request->id,
                    'is_correct' => false
                    
                ]);

                $cur += 1;
                
            }

        }
        else
        {

            for($i = 0; $i < $request->wrongNum; $i++)
            {
                DB::table('answer')->where('id', '=', $wrongAnswer[$i]->id)
                                   ->update([
                                       'title' => $request->wrongArr[$i]
                                   ]);
            }

            $restAnswers = count($wrongAnswer) - $request->wrongNum;

            $cur = $request->wrongNum;

            for($i = 0; $i < $restAnswers; $i++)
            {

                DB::table('answer')->where('id', '=', $wrongAnswer[$cur]->id)->delete();

                $cur += 1;

            }
            
        }


    }



    

}
