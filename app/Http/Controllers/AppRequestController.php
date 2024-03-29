<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AppRequestController extends Controller
{
    

    public function createUser(Request $request)
    {

        
        $first_name = $request->first_name ?? null;
        
        $last_name = $request->last_name ?? null;

        
        
        // Check if username exist or not
        $checkUsername = User::where('username', $request->username)->count();

        if($checkUsername == 0)
        {
            $username = $request->username;
        }
        else
        {
            return response()->json([
                'message' => 'This username is already exist',
            ]);
        }



        
        $password = Hash::make(trim($request->password)) ?? null;

        if($password != null && strlen($request->password) < 8)
        {
            return response()->json([
                'message' => 'Password should be more than 8 characters'
            ]);
        }
        

        // Check if Phone number exist or not
        $checkPhone = User::where('phone', $request->phone)->count();

        if($checkPhone == 0)
        {
            $phone = $request->phone;
        }
        else
        {
            return response()->json([
                'message' => 'This phone number is already exist',
            ]);
        }

        
        $country = $request->country ?? null;
        
        $city = $request->city ?? null;
        
        $study_year = $request->study_year ?? null;
        
        $learning_type = $request->learning_type ?? null;

        $university_id = $request->university_id ?? null;
        
        $graduated = $request->graduated ?? 0;
        
        $carrer = $request->carrer ?? null;
        
        $status = $request->status ?? 'active';
        
        $role = $request->role ?? 'user';


        if($first_name == null || $last_name == null || $phone == null || $password == null)
        {
            return response()->json([
                'message' => 'please fill all the required fields'
            ]);
        }



        // Insert user into DB
        $user = User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $username,
            'password' => $password,
            'phone' => $phone,
            'country' => $country,
            'city' => $city,
            'graduated' => $graduated,
            'carrer' => $carrer,
            'learning_type' => $learning_type,
            'study_year' => $study_year,
            'university_id' => $university_id,
            'status' => $status,
            'role' => $role
        ]);


        $userId = User::where('phone', '=', $request->phone)->firstOrFail();


        $userToken = $userId->createToken('_token_'.$request->phone)->plainTextToken;

        
        return response()->json([
            'message' => 'Success',
            'token' => $userToken,
            'userId' => $userId->id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $username,
            'phone' => $phone,
            'role' => $role,
            'graduated' => $graduated,
            'university_id' => $university_id,
            'study_year' => $study_year,
            'learning_type' => $learning_type,
            'country' => $country,
            'city' => $city,
            'status' => $status
        ]);


    }


    public function loginUser(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);


        $checkUser = User::where('phone', $request->phone)->firstOrFail();

        if($checkUser)
        {

            if(Hash::check($request->password, $checkUser->password))
            {

                $checkUser->tokens()->where('tokenable_id', $checkUser->id)->where('name', '_token_'.$request->phone)->delete();

                $newToken = $checkUser->createToken('_token_'.$request->phone)->plainTextToken;

                return response()->json([
                    'message' => 'Success',
                    'token' => $newToken,
                    'userId' => $checkUser->id,
                    'first_name' => $checkUser->first_name,
                    'last_name' => $checkUser->last_name,
                    'username' => $checkUser->username,
                    'phone' => $checkUser->phone,
                    'role' => $checkUser->role,
                    'graduated' => $checkUser->graduated,
                    'university_id' => $checkUser->university_id,
                    'study_year' => $checkUser->study_year,
                    'learning_type' => $checkUser->learning_type,
                    'country' => $checkUser->country,
                    'city' => $checkUser->city,
                    'status' => $checkUser->status,
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'Password not matched'
                ]);
            }

        }
        else
        {
            return response()->json([
                'message' => 'Phone number does not exist'
            ]);
        }
    }

    


    public function HomeScreen(Request $request)
    {

        // Get advertisement which are valid for today
        $ads = DB::table('advertisement')->where('end_date', '>=', date('Y-m-d'))->get();



        // Get top ten student by score
        $topTen = DB::table('users')->where('role', '=', 'user')->orderBy('correct_questions', 'DESC')->limit(10)->get();




        // Get the subject of the student's year or get all the subjects if it is graduated
        $subject = DB::table('university_year')->select(DB::raw('subject.id, subject.name as subject_name, year, university.name as university_name, specialize.name AS specialize_name'))
                                               ->join('subject', 'subject.id', '=', 'university_year.subject_id')
                                               ->join('university', 'university.id', '=', 'university_year.university_id')
                                               ->join('specialize', 'specialize.id', '=', 'subject.specialize_id');

        if(isset($request->university))
        {
            $subject = $subject->where('university_id', $request->university);
        }
        else
        {
            $subject = $subject->where('university_id', '1');
        }

        if(isset($request->year))
        {
            if($request->year != '5')
            {
                $subject = $subject->where('year', $request->year);
            }
        }

        $subject = $subject->get();





        return response()->json([
            'advertisement' => $ads,
            'topTen' => $topTen,
            'subject' => $subject
        ]);
    }




    public function individualQuiz(Request $request)
    {
        
        $question = DB::table('question')->select('id', 'title', 'subject_id', 'learning_type', 'university_id', 'type', 'year_time')->where('subject_id', $request->subject);
        
    

        if(isset($request->learning_type))
        {
            $question = $question->where('learning_type', $request->learning_type);
        }

        if(isset($request->university))
        {
            $question = $question->where('university_id', $request->university);
        }


        if(isset($request->year_time))
        {
            $question = $question->where('year_time', $request->year_time);
        }
        
        
        $question = $question->inRandomOrder()->limit($request->num)->get();


        // Getting questions ids to get their answers
        $questionIds = [];
        
        foreach($question as $quest)
        {
            array_push($questionIds, $quest->id);
        }

        $answers = DB::table('answer')->whereIn('question_id', $questionIds)->inRandomOrder()->get();



        $groupedAnswers = [];

        foreach($question as $quest)
        {
            $data = [];

            foreach($answers as $answer)
            {
                if($quest->id == $answer->question_id)
                {
                    array_push($data, $answer);
                }
            }

            $groupedAnswers[$quest->id] = $data;

        }

        return response()->json([
            'count' => count($question),
            'question' => $question,
            'answers' => $groupedAnswers,
        ]);
    }


    public function quizResult(Request $request)
    {

        $correctQuestions = rtrim($request->correctQuestion, ',');

        $wrongQuestions = rtrim($request->wrongQuestion, ',');

        $correctQuestion = explode(',', $correctQuestions);

        $wrongQuestion = explode(',', $wrongQuestions);


        DB::table('question')->whereIn('id', $correctQuestion)->UPDATE([
            'asked_count' => DB::raw('asked_count + 1'),
            'correct_times' => DB::raw('correct_times + 1')
        ]);

        DB::table('question')->whereIn('id', $wrongQuestion)->UPDATE([
            'asked_count' => DB::raw('asked_count + 1')
        ]);



        return response()->json([
            'message' => 'success'
        ]);
    }




    public function allGroups(Request $request)
    {

        $request->validate([
            'user_id' => 'required'
        ]);

        // Get the groups IDs which user had already joined in

        $myGroupsId = DB::table('groups')->select('group_id')
                                         ->join('group_users', 'group_id', '=', 'groups.id')
                                         ->where('group_users.user_id', $request->user_id)
                                         ->get();


        




        $groupsId = [];

        foreach($myGroupsId as $groupId)
        {
            array_push($groupsId, $groupId->group_id);
        }

        


        // All user's groups
        $myGroup = DB::table('group_round')->select('group_id', 'groups.name AS group_name', DB::raw('GROUP_CONCAT(subject.name SEPARATOR ", ") AS subjects', 'gourp'), 'group_round.learning_type AS learning_type', 'university.name AS university_name', 'admin_id', 'users.first_name', 'users.last_name', 'questions_num', 'type', 'from_time', 'to_time')
                                         ->join('groups', 'groups.id', '=', 'group_round.group_id')
                                         ->join('users', 'users.id', '=', 'groups.admin_id')
                                         ->join('round_subjects', 'round_subjects.round_id', '=', 'group_round.id')
                                         ->join('subject', 'subject.id' , '=', 'round_subjects.subject_id')
                                         ->join('university', 'university.id', '=', 'group_round.university_id')
                                         ->where('groups.status', 'active')
                                         ->where('from_time', '>=', date('Y-m-d H:i:s'))
                                         ->groupBy('group_round.id')
                                         ->whereIn('group_id', $groupsId)
                                         ->get();



        // All groups except user's groups
        $group = DB::table('group_round')->select('group_id', 'groups.name AS group_name', DB::raw('GROUP_CONCAT(subject.name SEPARATOR ", ") AS subjects', 'gourp'), 'group_round.learning_type AS learning_type', 'university.name AS university_name', 'admin_id', 'users.first_name', 'users.last_name', 'questions_num', 'type', 'from_time', 'to_time')
                                         ->join('groups', 'groups.id', '=', 'group_round.group_id')
                                         ->join('users', 'users.id', '=', 'groups.admin_id')
                                         ->join('round_subjects', 'round_subjects.round_id', '=', 'group_round.id')
                                         ->join('subject', 'subject.id' , '=', 'round_subjects.subject_id')
                                         ->join('university', 'university.id', '=', 'group_round.university_id')
                                         ->where('groups.status', 'active')
                                         ->where('from_time', '>=', date('Y-m-d H:i:s'))
                                         ->groupBy('group_round.id')
                                         ->whereNotIn('group_id', $groupsId)
                                         ->get();




        return response()->json([
            'myGroup' => $myGroup,
            'group' => $group
        ]);
    }

    public function createGroup(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'learning_type' => 'required',
           'university_id' => 'required',
           'admin_id' => 'required',
           'questions_num' => 'required',
           'type' => 'required',
           'subject' => 'required',
           'from_time' => 'required',
           'to_time' => 'required' 
        ]);


        if(isset($request->password))
        {
            $password = Hash::make($request->password);
        }
        else
        {
            $password = null;
        }


        
        
        $groupId = DB::table('groups')->insertGetId([
            'name' => $request->name,
            'admin_id' => $request->admin_id,
            'type' => $request->type,
            'password' => $password,
            'status' => 'active'
        ]);
        

        
        
        // create new round for this group
        
        $roundId = DB::table('group_round')->insertGetId([
            'group_id' => $groupId,
            'learning_type' => $request->learning_type,
            'university_id' => $request->university_id,
            'questions_num' => $request->questions_num,
            'from_time' => $request->from_time,
            'to_time' => $request->to_time,
            'created_at' => now()
        ]);
        
        



        // Insert subject to round_subjects table
        $subjects = explode(',', $request->subject);

        $data = [];

        foreach($subjects as $subject)
        {
            array_push($data, ['round_id' => $roundId, 'subject_id' => $subject]);
        }


        DB::table('round_subjects')->insert($data);

        

        // Insert questions for the round

        
        $questions = DB::table('question')->whereIn('subject_id', $subjects)->inRandomOrder()->limit($request->questions_num)->get();

        $questions_id = [];

        $entries = [];

        foreach($questions as $ques)
        {

            
            $questions_id['round_id'] = $roundId;

            $questions_id['question_id'] = $ques->id;

            array_push($entries, $questions_id);

        }
        


        DB::table('round_questions')->INSERT($entries);



        // Insert admin into the group_users table

        DB::table('group_users')->insert([
            'group_id' => $groupId,
            'user_id' => $request->admin_id,
        ]);



        // Insert starts admin mark for this round

        DB::table('round_history')->insert([
            'round_id' => $roundId,
            'user_id' => $request->admin_id,
            'mark' => 0
        ]);


        return response()->json([
            'message' => 'success',
        ]);


    }

    public function editGroup(Request $request)
    {
        $request->validate([
            'group_id' => 'required'
        ]);



        $info = [];

        if(isset($request->name))
        {
            $info['name'] = $request->name;
        }
        if(isset($request->learning_type))
        {
            $info['learning_type'] = $request->learning_type;
        }
        if(isset($request->university_id))
        {
            $info['university_id'] = $request->university_id;
        }
        if(isset($request->questions_num))
        {
            $info['questions_num'] = $request->questions_num;
        }
        if(isset($request->type))
        {
            if($request->type == 'private')
            {
                $request->validate([
                    'password' => 'required'
                ]);

                $info['type'] = $request->type;

                $info['password'] = Hash::make($request->password);
            }
            else
            {
                $info['type'] = $request->type;

                $info['password'] = null;
            }
        }
        if(isset($request->from_time))
        {
            $info['from_time'] = $request->from_time;
        }
        if(isset($request->to_time))
        {
            $info['to_time'] = $request->to_time;
        }

        return reponse()->json([
            'message' => 'success'
        ]);
    }

    public function joinGroup(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'group_id' => 'required'
        ]);

        $group = DB::table('groups')->where('id', $request->group_id)->first();

        if($group->type == 'private')
        {
            $request->validate([
                'password' => 'required'
            ]);

            if(Hash::check($request->password, $group->password))
            {
                DB::table('group_users')->insert([
                    'group_id' => $request->group_id,
                    'user_id' => $request->user_id
                ]);

                return response()->json([
                    'message' => 'success'
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'password error'
                ]);
            }

        }
        else
        {

            // Insert user into group

            DB::table('group_users')->insert([
                'group_id' => $request->group_id,
                'user_id' => $request->user_id
            ]);


            // Insert user mark into round_history

            $roundId = DB::table('group_round')->where('group_id', $request->group_id)->orderBy('id', 'DESC')->first();

            DB::table('round_history')->insert([
                'round_id' => $roundId->id,
                'user_id' => $request->user_id,
                'mark' => 0
            ]);


        


            return response()->json([
                'message' => 'success'
            ]);
        }

    }

    public function exitGroup(Request $request)
    {
        $request->validate([
            'group_id' => 'required',
            'user_id' => 'required',
        ]);

        
        DB::table('group_users')->where('group_id', $request->group_id)
                                ->where('user_id', $request->user_id)
                                ->delete();

        return response()->json([
            'message' => 'success'
        ]);

    }

    public function deleteGroup(Request $request)
    {
        $request->validate([
            'group_id' => 'required'
        ]);

        DB::table('groups')->where('id', $request->group_id)->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }

    // public function createRound(Request $request)
    // {
    //     $subjects = explode(',', $request->subject);

    //     $num = $request->num;
        
    //     $group = $request->group;

    //     $round = DB::table('group_round')->insertGetId([
    //         'group_id' => $group,
    //         'created_at' => now(),
    //     ]);


    //     $questions = DB::table('question')->whereIn('subject_id', $subjects)->orderBy('correct_times', 'ASC')->limit($num)->get();


    //     $questionsId = [];

    //     $entries = [];

    //     foreach($questions as $ques)
    //     {

    //         array_push($questionsId, $ques->id);
            
    //         $data['round_id'] = $round;

    //         $data['question_id'] = $ques->id;

    //         array_push($entries, $data);

    //     }
        


    //     DB::table('round_questions')->INSERT($entries);




    //     return response()->json([
    //         'message' => 'success',
    //         'round' => $round,
    //     ]);

    // }

    public function startRound(Request $request)
    {
        $round = $request->round;


        $roundTime = DB::table('group_round')->where('id', $round)->first();

        $end_time = $roundTime->to_time;


        $questionsId = DB::table('round_questions')->where('round_id', $round)->get();

        $roundQuestions = [];

        foreach($questionsId as $ques)
        {
            array_push($roundQuestions, $ques->question_id);
        }

        $question = DB::table('question')->select('id', 'title')->whereIn('id', $roundQuestions)->get();

        

        $questionIds = [];
        
        foreach($question as $quest)
        {
            array_push($questionIds, $quest->id);
        }

        $answers = DB::table('answer')->whereIn('question_id', $questionIds)->inRandomOrder()->get();



        $groupedAnswers = [];

        foreach($question as $quest)
        {
            $data = [];

            foreach($answers as $answer)
            {
                if($quest->id == $answer->question_id)
                {
                    array_push($data, $answer);
                }
            }

            $groupedAnswers[$quest->id] = $data;

        }


       


        return response()->json([
            'end_time' => $end_time,
            'question' => $question,
            'answer' => $groupedAnswers
        ]);
    }

    public function groupResult(Request $request)
    {

        $user_id = $request->user;

        $round = $request->round;

        $questions = explode(',', $request->questions);

        $correctQuestions = explode(',', $request->correctQuestions);


        DB::table('users')->where('id', $userId)->UPDATE([
            'answered_question' => DB::raw('answered_question + '. COUNT($questions)),
            'correct_times' => DB::raw('correct_times + '. COUNT($correctQuestions))
        ]);

        DB::table('question')->whereIn($questions)->UPDATE([
            'asked_times' => DB::raw('asked_times + 1')
        ]);

        DB::table('question')->whereIn($correctQuestions)->UPDATE([
            'correct_times' => DB::raw('correct_times + 1')
        ]);

        DB::table('round_history')->INSERT([
            'round_id' => $round,
            'user_id' => $user_id,
            'mark' => COUNT($correctQuestions)
        ]);

        return response()->json([
            'message' => 'success'
        ]);
        
    }

    public function roundHistory(Request $request)
    {
        $round_id = $request->round_id;

        $history = DB::table('round_history')->select('username', 'mark')
                                             ->join('users', 'users.id', '=', 'user_id')
                                             ->where('round_id', '=', $round_id)
                                             ->orderBy('mark', 'DESC')
                                             ->get();
                       

        return response()->json([
            'history' => $history
        ]);

    }




    public function copon()
    {
        $copons = DB::table('copon')->select('copon.id', 'description', 'company.logo', 'phone', 'whats_app', 'facebook', 'telegram')
                                    ->where('status', 'active')
                                    ->join('company', 'company.id', '=', 'copon.company_id')
                                    ->get();

        return response()->json([
            'copons' => $copons
        ]);
    }

    public function userCopon(Request $request)
    {
        $request->validate([
            'user_id' => 'required'
        ]);


        $copons = DB::table('copon_request')->where('copon_request.user_id', $request->user_id)
                                            ->where('status', 'active')
                                            ->join('copon', 'copon.id', '=', 'copon_id')
                                            ->get();


        return response()->json([
            'copons' => $copons
        ]);

    }





    public function editProfile(Request $request)
    {

        $request->validate([
            'user_id' => 'required'
        ]);


        $data = [];

        if(isset($request->first_name))
        {
            // array_push($data, ['first_name' => $request->first_name]);

            $data['first_name'] = $request->first_name;
        }
        if(isset($request->last_name))
        {
            $data['last_name'] = $request->last_name;
            
        }
        if(isset($request->password))
        {
            if(strlen($request->password) < 8)
            {
                return response()->json([
                    'message' => 'password should be more than 8 characters'
                ]);
            }
            $data['password'] = Hash::make($request->password);
            
        }
        if(isset($request->country))
        {
            $data['country'] = $request->country;
            
        }
        if(isset($request->city))
        {
            $data['city'] = $request->city;
            
        }
        if(isset($request->university))
        {
            $data['university_id'] = $request->university;
            
        }
        if(isset($request->learning_type))
        {
            $data['learning_type'] = $request->learning_type;
            
        }
        if(isset($request->study_year))
        {
            $data['study_year'] = $request->study_year;
            
        }
        if(isset($request->graduated))
        {
            $data['graduated'] = $request->graduated;
            
        }
        
        
        User::where('id', $request->user_id)->UPDATE($data);



        // User::where('id', $request->id)->UPDATE([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'username' => $request->username,
        // ]);

        return response()->json([
            'message' => 'Successful',
        ]);
    }




    public function elite()
    {
        $elite = DB::table('users')->select('id', 'first_name', 'last_name', 'username', 'study_year', 'correct_questions')->where('role', '=', 'user')->orderBy('correct_questions', 'DESC')->get();

        // $userOrder = $elite->search(function($user_id){
        //     return $user_id->id == $request->id;
        // });

        return response()->json([
            // 'userOrder' => $userOrder,
            'elite' => $elite
        ]);
    }





    public function checkUsername(Request $request)
    {
        $username = User::where('username', $request->username)->count();

        if($username > 0)
        {
            return response()->json([
                'message' => 'Username is already exist'
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'Not Exist'
            ]);
        }
    }
    
    
    
    public function checkPhone(Request $request)
    {
        $phone = User::where('phone', $request->phone)->count();

        if($phone > 0)
        {
            return response()->json([
                'message' => 'Phone is already exist'
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'Not Exist'
            ]);
        }
    }


     
    public function questionsNum(Request $request)
    {
        $request->validate([
            'subject' => 'required',

        ]);

        $num = DB::table('question')->where('subject_id', $request->subject);


        if(isset($request->learning_type))
        {
            $num = $num->where('learning_type', $request->learning_type);
        }
        if(isset($request->university))
        {
            $num = $num->where('university_id', $request->university);
        }
        if(isset($request->year_time))
        {
            $num = $num->where('year_time', $request->year_time);
        }

        $num = $num->count();


        $num = substr_replace($num, '0', -1);

        return response()->json([
            'num' => $num
            
        ]);


    }
    



    public function subject()
    {
        $subject = DB::table('subject')->get();

        return response()->json([
            'subject' => $subject
        ]);
    }

    public function university()
    {
        $university = DB::table('university')->get();

        return response()->json([
            'university' => $university
        ]);
    }
}
