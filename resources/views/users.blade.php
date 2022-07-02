<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>law</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  
</head>

<body>

  <div class="sidebarn">
    <div class="search">
        <form action="/action_page.php">
            <input type="text1" placeholder="...ابحث" name="search">
        </form>
    </div>
 <a href="/dashboard">
        <i class="fa fa-dashboard" aria-hidden="true"></i>
        لوحة التحكم </a>
    <a href="/statistics">
        <i class="fa fa-pie-chart icons" aria-hidden="true"></i>
        الاحصائيات
    </a>
    <a href="/allQuestion"">
        <i class="fa fa-list" aria-hidden="true"></i>
    الأسئلة </a>
    <a href="/subject">
        <i class="fa fa-book" aria-hidden="true"></i>
    المواد </a>
    <a href="request.html">
        <i class="fa fa-envelope-open" aria-hidden="true"></i>
        طلبات الاشتراك </a>
    <a href="/users">
        <i class="fa fa-group" aria-hidden="true"></i>
        المستخدمون </a>
    <a href="/profile">
        <i class="fa fa-address-card" aria-hidden="true"></i>
        الملف الشخصي </a>
    <a href="/privilege">
        <i class="fa fa-cubes" aria-hidden="true"></i>
        الصلاحيات </a>
   
    
    <a href="/company">
        <i class="fa fa-building" aria-hidden="true"></i>
        الشركات
    </a>
    <a href="/advertisement">
        <i class="fa fa-laptop icons" aria-hidden="true"></i>
        الاعلانات </a>

</div>
    <div class="head">
        <div class="col-div-6">
            <p class="nav"> Dashboard</p>

        </div>

        <div class="col-div-6">

            <div class="profile">

                <img src="img/icons8-admin-settings-male-50.png" class="pro-img" />
                <p><a href="/profile">Raghad Alalem</a> </p>

            </div>
        </div>

        <div class="containerpageChart-users">

            <div class="col-div-12">
                <div class="box-8">
                    <div class="content-box">
                        <br />
                        <h3 style="text-align: right;">المستخدمون</h3>
                        <hr>
                        <div style="display:flex">
                          <select style="text-align: right;width:200px" class="form-select m-2 d-none filteringUser"
                          aria-label="Default select example" id="yearFilter" >
                          <option value="">السنة </option>
                          <option value="1">السنة الاولى </option>
                          <option value="2">السنة الثانية</option>
                          <option value="3">السنة الثالثة </option>
                          <option value="4">السنة الرابعة </option>

                      </select>
                      

              <select style="text-align: right;width:200px" class="form-select m-2 filteringUser"
        aria-label="Default select example" id="countryFilter">
        <option value="">البلد</option>
        <option value="Syria">سوريا </option>
        <option value="Lebanon">لبنان</option>
    </select>
             <!-- لما يختار حالة المستخدم يظهر خيارات فلترة الطالب او الخريج  -->
                          <select style="text-align: right;width:200px" class="form-select m-2 filteringUser"
            aria-label="Default select example" id="userFilter">
            <option value="all"> الكل </option>
            <option value="student">طالب </option>
            <option value="graduated">خريج</option>
            <option value="admin">ادمن</option>

        </select>
      </div>
      <div style="display:flex">
        
    <select style="text-align: right;width:200px" class="form-select mx-2 d-none filteringUser"
    aria-label="Default select example" id="universityFilter">
    <option value="">الجامعة
    </option>
    <option value="1">دمشق </option>
    <option value="2">حلب</option>
</select>


    <select style="text-align: right;width:200px" class="form-select mx-2 d-none filteringUser"
    aria-label="Default select example" id="learning_typeFilter">
    <option value="">نوع التعليم </option>
    <option value="عام">عام</option>
    <option value="افتراضي">افتراضي </option>
    <option value="خاص">خاص</option>
    <option value="مفتوح">مفتوح</option>

</select>
</div>
                        <table class="table-users mt-3">
                            <tr class="tr1">
                                <th class="th1" class="w3-center">حذف </th>
                                <th class="th1" class="w3-center">تعديل</th>
                                <th class="th-users" class="w3-center">الحالة </th>
                                <th class="th-users" class="w3-center">رقم الموبايل</th>
                                <th class="th-users" class="w3-center">المحافظة</th>
                                <th class="th-users" class="w3-center">البلد</th>
                                <th class="th-users" class="w3-center">البريد الإلكتروني</th>
                                <th class="th-users" class="w3-center">اسم المستخدم</th>
                                <th class="th-users"  >رقم المستخدم</th>



                            </tr>


                            @foreach($users as $user)
                                
                                <tr class="tr1">

                                    <td class="td1" class="w3-center "> <a href="/delete-users/{{ $user->id }}" style="text-decoration: none;text-align:center">   <i  class="fa fa-trash-o" style="font-size: 25px;"></i> </a> </td>                
                                    <td class="td1" class="w3-center "> <a href="/edit-users/{{ $user->id }}" style="text-decoration: none;text-align:center">   <i  class="fa fa-edit" style="font-size: 25px;"></i> </a> </td>
                                    <td class="td-users" > @if($user->graduated == 0) طالب  @else  خريج  @endif </td>
                                    <td class="td-users"  class="w3-center "> {{ $user->phone }} </td>
                                    <td class="td-users" > {{ $user->city }} </td>
                                    <td class="td-users" > {{ $user->country }} </td>
                                    <td class="td-users" > {{ $user->email }} </td>
                                    <td class="td-users" > {{ $user->first_name . " " . $user->last_name }} </td>
                                    <td class="td-users" > {{ $loop->index + 1 }} </td>

                                </tr>
                            
                            @endforeach

             

                        </table>

    
                    </div>
                </div>
            </div>


            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>