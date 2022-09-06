<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function index()
    {


        $home = DB::table('users')->get();

        $countUser = count(DB::table('users')->where('status', '=', 'active')->get());

        $countPublic = count(DB::table('users')->where('learning_type', '=', 'public')->get());

        $countPrivate = count(DB::table('users')->where('learning_type', '=', 'private')->get());

        $countVirtual = count(DB::table('users')->where('learning_type', '=', 'virtual')->get());

        $countOpen = count(DB::table('users')->where('learning_type', '=', 'open')->get());

        $userSession = session('email');

        return view('/dashboard', ['home' => $home, 'count' => $countUser, 'public' => $countPublic, 'private' => $countPrivate, 'open' => $countOpen, 'virtual' => $countVirtual, 'session' => $userSession]);

    

    }


    public function statistics()
    {
        $firstYear = DB::table('users')->where('study_year', '=', '1')->where('role', '=', 'user')->count();

        $secondYear = DB::table('users')->where('study_year', '=', '2')->where('role', '=', 'user')->count();
        
        $thirdYear = DB::table('users')->where('study_year', '=', '3')->where('role', '=', 'user')->count();
        
        $fourthYear = DB::table('users')->where('study_year', '=', '4')->where('role', '=', 'user')->count();

        $studentsYear = DB::table('users')->select('study_year', DB::raw('count(*) as years'))->where('role', '=', 'user')->GROUPBY('study_year')->get();


        $firstTen = DB::table('users')->where('role', '=', 'user')->orderBy('correct_questions', 'DESC')->limit(10)->get();


        $allUsers = DB::table('users')->where('role', '=', 'user')->where('status', 'active')->count();

        $students = DB::table('users')->where('graduated', '=', false)->where('role', '=', 'user')->count();

        $graduated = DB::table('users')->where('graduated', '=', true)->where('role', '=', 'user')->count();


        $correctAnswer = DB::table('question')->where('type', '=', 'الاجابة الصحيحة')->count();
        
        $wrongAnswer = DB::table('question')->where('type', '=', 'الاجابة الخاطئة')->count();
        
        $diffAnswer = DB::table('question')->where('type', '=', 'الاجابة المخالفة')->count();
        
        $truestAnswer = DB::table('question')->where('type', '=', 'الاجابة الاصح')->count();


        // $subjects = DB::table('question')->join('subject', 'subject.id', '=', 'question.subject_id')->groupBy('subject_id')->get()->sum('asked_count');

        $subjects = DB::table('question')->select( DB::raw('subject.name, sum(asked_count) AS asked_time, sum(asked_count) - sum(correct_times) AS "wrong", sum(correct_times) AS correct'))->join('subject', 'subject.id', '=', 'question.subject_id')->GROUPBY('subject_id')->ORDERBY('asked_time', 'DESC')->limit(1)->get('subject.name', 'asked_count');


        return view('statistics', [
                                    'firstYear' => $firstYear, 
                                    'secondYear' => $secondYear, 
                                    'thirdYear' => $thirdYear, 
                                    'fourthYear' => $fourthYear,
                                    'firstTen' => $firstTen, 
                                    'allUsers' => $allUsers, 
                                    'students' => $students, 
                                    'graduated' => $graduated, 
                                    'correctAnswer' => $correctAnswer, 
                                    'wrongAnswer' => $wrongAnswer, 
                                    'diffAnswer' => $diffAnswer, 
                                    'truestAnswer' => $truestAnswer,
                                    'subjects' => $subjects
                                ]);
    }

    
    public function answerStatistics()
    {
        $subjects = DB::table('question')->select( DB::raw('subject.name, sum(asked_count) AS asked_time, sum(asked_count) - sum(correct_times) AS "wrong", sum(correct_times) AS correct'))->join('subject', 'subject.id', '=', 'question.subject_id')->GROUPBY('subject_id')->ORDERBY('asked_time', 'desc')->get('subject.name', 'asked_count');
        
        return view('/answerStatistics', ['subjects' => $subjects]);
    }
    
    public function topStudent()
    {
        $student = DB::table('users')->join('university', 'university.id', '=', 'users.university_id')->where('role', '=', 'user')->where('status', '=', 'active')->orderBy('correct_questions')->limit(10)->get();

        return view('top-student', ['students' => $student]);
    }

    public function usersOrder()
    {
        $users = DB::table('users')->where('role', 'user')->orderBy('correct_questions', 'DESC')->where('status', '=', 'active')->get();

        $university = DB::table('university')->get();

        return view('usersOrder', ['users' => $users, 'university' => $university]);
    }
    
    public function first_ten()
    {
        $users = DB::table('users')->where('role', 'user')->orderBy('correct_questions', 'DESC')->where('status', '=', 'active')->limit(10)->get();

        $university = DB::table('university')->get();

        return view('usersOrder', ['users' => $users, 'university' => $university]);
    }
    



    public function subject()
    {
        // $subject = DB::table('subject')->get('subject.name AS subject_name');

        // $subject = DB::table('university_year')->rightJoin('subject', 'subject.id', '=', 'university_year.subject_id')->rightJoin('university', 'university.id', '=', 'university_year.university_id')->where('university_year.university_id', '=', '1')->get('university_id', 'year');

        $subject = DB::table('university_year')->select(DB::raw('subject.id, subject.name as subject_name, year, university.name as university_name, specialize.name AS specialize_name'))->join('subject', 'subject.id', '=', 'university_year.subject_id')->join('university', 'university.id', '=', 'university_year.university_id')->join('specialize', 'specialize.id', '=', 'subject.specialize_id')->where('university_id', '=', '1')->ORDERBY('year')->get();

        return view('subject', ['subjects' => $subject]);
    }



    public function users()
    {
        $users = DB::table('users')->select('users.id', 'first_name', 'last_name', 'email', 'country', 'city', 'phone', 'graduated')->where('role', '=', 'user')->where('status', '=', 'active')->get();

        return view('users', ['users' => $users]);
    }

    public function edit_user($id)
    {
        $user = DB::table('users')->where('id', $id)->get();

        if($user[0]->role == 'admin')
        {
            return view('edit-admin', ['user' => $user]);
        }
        else
        {
            return view('edit-user', ['user' => $user]);
        }
    }

    public function update_user(Request $request)
    {
        $role = DB::table('users')->where('id', $request->id)->get();

        if($role[0]->role == 'admin')
        {
            if(isset($request->password))
            {
                DB::table('users')->where('id', $request->id)->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'password' => $request->password
                ]);
            }
            else
            {
                DB::table('users')->where('id', $request->id)->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name
                ]);
            }

        }
        else if($role[0]->graduated == 1)
        {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'username' => 'required',
                'phone' => 'required',
                ''
            ]);
        }
        else
        {
            $first_name = $request->first_name ?? null;

            $last_name = $request->last_name ?? null;

            $email = $request->email ?? null;

            $birth_date = $request->birth_date ?? null;

            $countr = $request->country ?? null;

            $city = $request->city ?? null;

            $learning_type = $request->learning_type ?? null;

            $university = $request->university ?? null;

            $graduated = $request->graduated ?? null;

            $study_year = $request->study_year ?? null;

            DB::table('users')->where('id', $request->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'learning_type' => $request->learning_type,
                'university_id' => $request->university_id,
                'study_year' => $request->study_year

            ]);
        }

        return redirect('/users');
    }

    public function delete_user($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect('/users');
    }

    public function userFilter(Request $request)
    {
        $users = DB::table('users')->where('status', '=', 'active');

        if($request->user == 'all')
        {
            $users = $users->where('role', '=', 'user');
        }
        else if ($request->user == 'student')
        {
            $users = $users->where('role', '=', 'user')->where('graduated', '=', false);
        }
        else if($request->user == 'graduated')
        {
            $users = $users->where('role', '=', 'user')->where('graduated', '=', true);
        }
        else if($request->user == 'admin')
        {
            $users = $users->where('role', '=', 'admin');
        }

        if(isset($request->country))
        {
            $users = $users->where('country', '=', $request->country);
        }

        if(isset($request->year))
        {
            $users = $users->where('study_year', '=', $request->year);
        }

        if(isset($request->learning_type))
        {
            $users = $users->where('learning_type', '=', $request->learning_type);
        }


        if(isset($request->university))
        {
            $users = $users->where('university_id', '=', $request->university);
        }
        
        $university = DB::table('university')->get();

        $users = $users->get();

        return response()->json([
            'users' => $users,
            'university' => $university
        ]);
    }



    public function profile()
    {
        $first_name = session('firstName');

        $last_name = session('lastName');

        $email = session('email');

        return view('profile', ['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8'
        ]);

        DB::table('users')->where('email', session('email'))->update([
            'password' => $request->password
        ]);

        return redirect('/profile');

    }

    public function newAdmin()
    {
        return view('/newAdmin');
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $check = DB::table('users')->where('email', '=', $request->email)->limit(1)->count();

        if($check == 1)
        {
            return view('/newAdmin', ['error' => 'هذا البريد موجود بالفعل']);
        }
        else
        {
            DB::table('users')->insert([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'status' => 'active',
                'role' => 'admin'
            ]);
        }

        

        return redirect('/profile');
    }



    public function newSubject()
    {
        $university = DB::table('university')->get();

        $specialize = DB::table('specialize')->get();

        return view('/newSubject', ['specialize' => $specialize, 'university' => $university]);
    }


    public function addSubject(Request $request)
    {
        

        // if(!$request->validate([
        //     'name' => 'required',
        //     'university' => 'required',
        //     'year' => 'required',
        //     'specialize' => 'required'
        // ]))
        // {
        //     return view('/newSubject', ['error' => 'please enter all the required fields']);
        // }
        // else
        // {
            $checkSubject = DB::table('subject')->where('name', '=', $request->name)->count();

            if($checkSubject == 1)
            {
                $university = DB::table('university')->get();

                $specialize = DB::table('specialize')->get();

                // return view('/newSubject', ['specialize' => $specialize, 'university' => $university, 'error' => 'this subject already exist']);
                
                return redirect('/dashboard');
            }
            else
            {
                    
                DB::table('subject')->insert([
                    'name' => $request->name,
                    'specialize_id' => $request->specialize
                ]);

                $newSubject = DB::table('subject')->where('name', '=', $request->name)->get();

                DB::table('university_year')->insert([
                    'subject_id' => $newSubject[0]->id,
                    'university_id' => $request->university,
                    'year' => $request->year
                ]);

                return redirect('/subject');
                
            }

        // }

    }

    public function editSubject($id)
    {
        // $subject = DB::table('university_year')->join('subject', 'subject_id', '=', 'subject.id')->where('university_year.subject_id', '=', $id)->get('subject.name AS subject_name', 'university_year.university_id AS university_id', 'year', 'subject.specialize_id');

        $subject = DB::table('subject')->select('subject.id AS subject_id', 'subject.name AS subject_name', 'specialize_id', 'year', 'university_id')->join('university_year', 'subject_id', '=', 'subject.id')->where('subject.id', '=', $id)->get();

        $university = DB::table('university')->get();

        $specialize = DB::table('specialize')->get();

        return view('/editSubject', ['subject' => $subject, 'specialize' => $specialize, 'university' => $university]);
    }

    public function updateSubject(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'university' => 'required',
            'year' => 'required',
            'specialize' => 'required'
        ]);


        DB::table('subject')->where('id', '=', $request->id)->update([
                                                                        'name' => $request->name,
                                                                        'specialize_id' => $request->specialize
                                                                    ]);

        DB::table('university_year')->where('subject_id', '=', $request->id)->update([
                                                                                        'university_id' => $request->university,
                                                                                        'year' => $request->year
                                                                                    ]);

        return redirect('/subject');                                                                                    

    }

    public function deleteSubject($id)
    {
        DB::table('subject')->where('id', '=', $id)->delete();

        return redirect('/subject');
    }



    public function privilege()
    {
        $users = DB::table('users')->where('role', '=', 'admin')->get();

        $privilege = DB::table('privilege')->get();

        $user_privileges = DB::table('user_privileges')->get();

        return view('/privilege', ['users' => $users, 'privilege' => $privilege, 'user_privileges' => $user_privileges]);
    }

    public function changePrivilege(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'privilege_id' => 'required',
            'checkStatus' => 'required'
        ]);

        
        if($request->checkStatus == 'true')
        {
            DB::table('user_privileges')->insert([
                'user_id' => $request->user_id,
                'privilege_id' => $request->privilege_id
            ]);
        }
        else if($request->checkStatus == 'false')
        {
            DB::table('user_privileges')->where('privilege_id', '=', $request->privilege_id)->where('user_id', '=', $request->user_id)->delete();
        }


    }



    public function company()
    {
        $companies = DB::table('company')->get();

        $copons = DB::table('copon')->select('copon.id', 'company.name AS company_name', 'copon.description', 'copon.status', 'phone', 'whats_app', 'facebook', 'telegram')->join('company', 'company.id', '=', 'copon.company_id')->get();

        return view('/company', ['companies' => $companies, 'copons' => $copons]);
    }

    public function new_company()
    {
        return view('/new-company');
    }

    public function add_company(Request $request)
    {
        
        if($request->file('logo'))
        {
            $file = $request->file('logo');
            
            $filename = date('Y-m-d H-i-s').".".$file->getClientOriginalExtension();

            $file->move(public_path('\img'), $filename);
        }
        else
        {
            $filename = null;
        }

        $phone = $request->phone ?? null;

        $whats_app = $request->whats_app ?? null;

        $facebook = $request->facebook ?? null;

        $telegram = $request->telegram ?? null;


        DB::table('company')->insert([
            'name' => $request->name,
            'phone' => $phone,
            'whats_app' => $whats_app,
            'facebook' => $facebook,
            'telegram' => $telegram,
            'logo' => $filename
        ]);

        return redirect('/company');

    }

    public function edit_company($id)
    {
        $company = DB::table('company')->where('id', '=', $id)->get();

        return view('/edit-company', ['company' => $company]);
    }

    public function update_company(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);


        $phone = $request->phone ?? null;

        $whats_app = $request->whats_app ?? null;

        $facebook = $request->facebook ?? null;

        $telegram = $request->telegram ?? null;

        $filename = null;


        $data = [];

        $data['name'] = $request->name;

        $data['phone'] = $phone;

        $data['whats_app'] = $whats_app;

        $data['facebook'] = $facebook;

        $data['telegram'] = $telegram;
        

        // if(!$request->file('logo'))
        // {
        //     DB::table('company')->where('id', $request->id)->update([
        //         'name' => $request->name
                
        //     ]);
        // }
        if($request->file('logo'))
        {

            $file = $request->file('logo');
            
            $filename = date('Y-m-d H-i-s').".".$file->getClientOriginalExtension();

            $file->move(public_path('\img'), $filename);

            $data['logo'] = $filename;

        }
        
        
        DB::table('company')->where('id', $request->id)->update($data);


        return redirect('/company');

        
    }

    public function delete_company($id)
    {
        DB::table('company')->where('id', '=', $id)->delete();
        
        return redirect('/company');
    }


    

    public function new_copon()
    {

        $copons = DB::table('copon')->select('copon.id', 'company.name AS company_name', 'copon.description', 'copon.status')->join('company', 'company.id', '=', 'copon.company_id')->get();

        $companies = DB::table('company')->get();

        return view('/new-copon', ['companies' => $companies, 'copons' => $copons]);
    }

    public function add_copon(Request $request)
    {
        $request->validate([
            'company' => 'required'
        ]);

        $description = null;

        $status = 'inactive';

        if(isset($request->description))
        {
            $description = $request->description;
        }
        

        if(isset($request->status))
        {
            $status = $request->status;
        }
        
        DB::table('copon')->insert([
            'description' => $description,
            'company_id' => $request->company,
            'status' => $status
        ]);

        return redirect('/new-copon');

    }

    public function edit_copon(Request $request)
    {
        $coponInfo = DB::table('copon')->where('id', $request->id)->get();

        $companies = DB::table('company')->get();

        return view('edit-copon', ['coponInfo' => $coponInfo, 'companies' => $companies]);
    }

    public function update_copon(Request $request)
    {

        $request->validate([
            'description' => 'required',
            'company_id' => 'required',
            'status' => 'required'
        ]);

        DB::table('copon')->where('id', $request->id)->update([
            'description' => $request->description,
            'company_id' => $request->company_id,
            'status' => $request->status
        ]);

        return redirect('/company');
        
    }


    public function requested_copon()
    {
        $copons = DB::table('copon')->join('company', 'company.id', '=', 'copon.company_id')->where('status', '=', 'requested')->get();

        return view('/requested-copon', ['copons' => $copons]);
    }

    public function delete_copon($id)
    {
        DB::table('copon')->where('id', '=', $id)->delete();
        
        return redirect('/company');
    }




    public function advertisement()
    {
        $advertisements = DB::table('advertisement')->get();

        return view('advertisement', ['advertisements' => $advertisements]);
    }

    public function create_advertisement(Request $request)
    {
        // $request->validate([
        //     'duration' => 'required',
        //     'unit' => 'required'
        // ]);

        switch ($request->unit)
        {
            case 'day':
                $end_date = Carbon::now()->addDays($request->duration);
                break;

            case 'month' :
                $end_date = Carbon::now()->addMonths($request->duration);
                break;

            case 'year':
                $end_date = Carbon::now()->addYears($request->duration);
                break;

            default:
                $end_date = Carbon::now()->addDays($request->duration);
                break;
        }


        // $data = new Postimage();

        
        if($request->file('image'))
        {

            $file = $request->file('image');
            $filename = date('Y-m-d H-i-s') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('\img'), $filename);
        }



        $phone = $request->phone ?? null;

        $whats_app = $request->whats_app ?? null;

        $telegram = $request->telegram ?? null;

        $facebook = $request->facebook ?? null;

        
        $isText = $request->isText ?? 0;

        DB::table('advertisement')->insert([
            'description' => $request->description,
            'start_date' => date('Y-m-d'),
            'end_date' => $end_date,
            'img' => $filename,
            'phone' => $phone,
            'whats_app' => $whats_app,
            'telegram' => $telegram,
            'facebook' => $facebook,
            'isText' => $isText
        ]);


        return redirect('/advertisement');

    }

    public function edit_ad(Request $request)
    {
        $ad = DB::table('advertisement')->where('id', $request->id)->get();

        if(Carbon::now() < Carbon::parse($ad[0]->end_date))
        {
            $end_date = Carbon::parse($ad[0]->end_date);
    
            $restDays = $end_date->diffInDays(Carbon::now()) + 1;
            
        }
        else
        {
            $restDays = 0;
        }

        return view('edit-ads', ['ad' => $ad, 'days' => $restDays]);
    }

    public function update_ad(Request $request)
    {
        $request->validate([
            'duration' => 'required'
        ]);
        
        $description = $request->description ?? null;

        $isText = $request->isText ?? 0;


        if($request->duration > 0)
        {
            switch ($request->unit)
            {
                case 'day':
                    $end_date = Carbon::now()->addDays($request->duration);
                    break;

                case 'month' :
                    $end_date = Carbon::now()->addMonths($request->duration);
                    break;

                case 'year':
                    $end_date = Carbon::now()->addYears($request->duration);
                    break;

                default:
                    $end_date = Carbon::now()->addDays($request->duration);
                    break;
            }

            DB::table('advertisement')->where('id', $request->id)->update([
                'end_date' => $end_date
            ]);

        }


            $phone = $request->phone ?? null;

            $whats_app = $request->whats_app ?? null;

            $facebook = $request->facebook ?? null;
            
            $telegram  = $request->telegram ?? null;



        if($request->file('image'))
        {

            $file = $request->file('image');
            $filename = date('Y-m-d H-i-s') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('\img'), $filename);

            DB::table('advertisement')->where('id', $request->id)->update([
                'img' => $filename
            ]);
        }

        DB::table('advertisement')->where('id', $request->id)->update([
            'description' => $description,
            'phone' => $phone,
            'whats_app' => $whats_app,
            'facebook' => $facebook,
            'telegram' => $telegram,
            'isText' => $isText,
        ]);


        return redirect('/advertisement');


    }


    public function delete_advertisement(Request $request)
    {
        DB::table('advertisement')->where('id', '=', $request->id)->delete();

        return redirect('/advertisement');
    }


}
