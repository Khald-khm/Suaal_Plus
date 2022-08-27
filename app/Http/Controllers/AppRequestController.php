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

        $checkEmail = User::where('email', $request->email)->count();

        
        if($checkEmail == 0)
        {
            $email = $request->email;
        }
        else
        {
            return response()->json([
                'message' => 'This email is already exist',
            ]);
        }

        
        $password = Hash::make(trim($request->password)) ?? null;

        if($password != null && strlen($request->password) < 8)
        {
            return response()->json([
                'message' => 'Password should be more than 8 characters'
            ]);
        }
        

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



        $user = User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $username,
            'email' => $email,
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


        $userId = User::where('email', '=', $request->email)->firstOrFail();


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

        if(isset($request->type))
        {
            $question = $question->where('type', $request->type);
            
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

        $answers = DB::table('answer')->whereIn('question_id', $questionIds)->OrderBy('question_id')->get();



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

        $correctQuestion = [61, 62, 63];

        $wrongQuestion = [71, 72, 73];


        DB::table('question')->whereIn('id', $correctQuestion)->UPDATE([
            'asked_count' => DB::raw('asked_count + 1'),
            'correct_times' => DB::raw('correct_times + 1')
        ]);

        DB::table('question')->whereIn('id', $wrongQuestion)->UPDATE([
            'asked_count' => DB::raw('asked_count + 1')
        ]);

        // DB::table('users')->where('id', $request->user_id)->UPDATE([
        //     'answered_questions' => DB::raw('answered_questions + '. $questionsCount),
        //     'correct_questions' => DB::raw('correct_questions + '. $correctCount)
        // ]);



        return response()->json([
            'message' => 'sucess'
        ]);
    }




    public function allGroups()
    {
        $group = DB::table('groups')->select('groups.id', 'groups.name AS group_name', DB::raw('GROUP_CONCAT(subject.name SEPARATOR ",") AS subjects'), 'groups.learning_type', 'university.name AS university_name', 'admin_id', 'users.first_name', 'users.last_name', 'users_num', 'questions_num', 'type', 'from_time', 'to_time')
                                    // ->join('group_subjects', 'group_id', '=', 'groups.id')
                                    ->join('users', 'users.id', '=', 'admin_id')
                                    ->join('group_subjects', 'group_subjects.group_id', '=', 'groups.id')
                                    ->join('subject', 'subject.id', '=', 'group_subjects.subject_id')
                                    ->join('university', 'university.id', '=', 'groups.university_id')
                                    ->where('groups.status', 'active')
                                    ->where('from_time', '>=', date('Y-m-d H:i:s'))
                                    ->groupBy('groups.id')
                                    ->get();


                                    
        // $group = DB::table('groups')->select('groups.id', 'groups.name AS group_name', DB::raw('GROUP_CONCAT(subject_id SEPARATOR ",") AS subjects'), 'groups.learning_type', 'university.name AS university_name', 'users.first_name', 'users.last_name', 'users_num', 'questions_num', 'type', 'from_time', 'to_time')
        // // ->join('group_subjects', 'group_id', '=', 'groups.id')
        // ->join('users', 'users.id', '=', 'admin_id')
        // ->join('group_subjects', 'group_subjects.group_id', '=', 'groups.id')
        // ->join('university', 'university.id', '=', 'groups.university_id')
        // ->where('groups.status', 'active')
        // ->where('from_time', '>=', date('Y-m-d H:i:s'))
        // ->groupBy('groups.id')
        // ->get();


        return response()->json([
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
            'learning_type' => $request->learning_type,
            'university_id' => $request->university_id,
            'admin_id' => $request->admin_id,
            'users_num' => '0',
            'questions_num' => $request->questions_num,
            'type' => $request->type,
            'password' => $password,
            'from_time' => $request->from_time,
            'to_time' => $request->to_time,
            'status' => 'active'
        ]);
        



        // Insert subject to group_subjects table
        $subjects = explode(',', $request->subject);

        $data = [];

        foreach($subjects as $subject)
        {
            array_push($data, ['group_id' => $groupId, 'subject_id' => $subject]);
        }



        // Insert subject into group_subjects
        DB::table('group_subjects')->insert($data);



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
            DB::table('group_users')->insert([
                'group_id' => $request->group_id,
                'user_id' => $request->user_id
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





    public function copon()
    {
        $copons = DB::table('copon')->get();

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
