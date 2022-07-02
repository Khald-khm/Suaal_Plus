<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>law</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"/>
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
                        <h3 style="text-align: right;">المواد</h3>
                        <hr>

                        <a href="/newSubject" id="edit" class="w3-right" >اضافة مادة جديدة</a>

                        <table class="table1">
                            <tr class="tr1">

                                <th class="th1" class="w3-center">تعديل</th>
                                <th class="th1" class="w3-center">حذف </th>
                               
                                <th  class="th-users" class="w3-center">اختصاص المادة</th>
                                <th class="th-users" class="w3-center">السنة</th>
                                <th class="th-users" class="w3-center">الجامعة</th>
                                <th class="th-users" class="w3-center">اسم المادة</th>
                                <th class="th-users" class="w3-center">رقم المادة</th>



                            </tr>




                            @foreach($subjects as $subject)

                            <tr class="tr1">

                                <td class="td-users" class="w3-center "> <a href="/edit-subject/{{ $subject->id }}" style="text-decoration: none;text-align:center">   <i  class="fa fa-edit" style="font-size: 25px;"></i> </a> </td>
                                <td class="td-users" class="w3-center "> <a href="/delete-subject/{{ $subject->id }}" style="text-decoration: none;text-align:center">   <i  class="fa fa-trash-o" style="font-size: 25px;"></i> </a> </td>                
                                <td class="td-users" > {{ $subject->specialize_name}} </td>
                                <td class="td-users" > {{ $subject->year }} </td>
                                <td class="td-users" > {{ $subject->university_name }} </td>
                                <td class="td-users" > {{ $subject->subject_name }} </td>
                                <td class="td-users" > {{ $loop->index + 1 }} </td>


                            </tr>

                            @endforeach


                            </table>

