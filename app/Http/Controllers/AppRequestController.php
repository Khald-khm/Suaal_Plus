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
                'message' => 'This username already exist'
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
                'message' => 'This email already exist'
            ]);
        }

        
        $password = Hash::make(trim($request->password)) ?? null;
        

        $checkPhone = User::where('phone', $request->phone)->count();

        if($checkPhone == 0)
        {        
            $phone = $request->phone ?? null;
        }
        else
        {
            return response()->json([
                'message' => 'This phone number already exist'
            ]);
        }

        
        $country = $request->country ?? null;
        
        $city = $request->city ?? null;
        
        $study_year = $request->study_year ?? null;
        
        $learning_type = $request->learning_type ?? null;

        $university_id = $request->university_id ?? null;
        
        $graduated = $request->graduated ?? false;
        
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
            'status' => $status,
            'answered_questions' => '0',
            'correct_questions' => '0'
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
                    'password' => $request->password,
                    'hashedPassword' => Hash::make($request->password),
                    'realPassword' => $checkUser->password,
                    'message' => 'Password not matched',
                    'phone' => $request->phone
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
            'subject' => $subject,
            'now' => date('Y-m-d')
        ]);
    }



    public function allGroups()
    {
        $group = DB::table('groups')->select('groups.id', 'groups.name AS group_name', 'subject.name AS subject_name', 'groups.learning_type', 'university.name AS university_name', 'users.first_name', 'users.last_name', 'users_num', 'questions_num', 'type', 'from_time', 'to_time')
                                    ->join('group_subjects', 'group_id', '=', 'groups.id')
                                    ->join('users', 'users.id', '=', 'admin_id')
                                    ->join('subject', 'subject.id', '=', 'group_subjects.subject_id')
                                    ->join('university', 'university.id', '=', 'groups.university_id')
                                    ->where('groups.status', 'active')
                                    ->where('from_time', '>=', date('Y-m-d H:i:s'))
                                    ->get();


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


        DB::table('groups')->insert([
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


        return response()->json([
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

}