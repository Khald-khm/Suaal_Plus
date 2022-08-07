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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    th {
      text-align: center;

    }

    .w3-table-all {
      width: 100%;
    }

    tr.td {
      padding: 200px;
      margin-right: 400px;
    }
  </style>
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
    <a href="/allQuestion">
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
                <p><a href="profile.html">Raghad Alalem</a> </p>

            </div>
        </div>

    <div class="containerpage-excellent">

        <div class="col-div-12">
            <div class="box-8">
              <div class="content-box">
                <br/>
                <a href="/statistics" id="edit" class="w3-right" >رجوع</a>
                <h2 style="text-align: right;">ترتيب الطلاب  <span style="margin-right: 10px; font-size: 20px; font-weight: 400; color: #666;">  @php echo '('. count($users) . ')'; @endphp</span> </h2>

                <table class="table1">
                  <tr class="tr1">
    
                    <th class="th1" class="w3-center">معدل الاجابات الصحيحة </th>
                    <th class="th1" class="w3-center">معدل الاجابات الخاطئة </th>
                    <th class="th1" class="w3-center">رقم الموبايل</th>
                    <th class="th1" class="w3-center">الجامعة</th>
                    <th class="th1" class="w3-center">نوع التعليم</th>
                    <th class="th1" class="w3-center">السنة</th>
                    <th class="th1" class="w3-center">المحافظة-البلد</th>
                    <th class="th1" class="w3-center"> المستخدم </th>
                    <th class="th1" class="w3-center">البريد الإلكتروني</th>
                    <th class="th1" class="w3-center">اسم المستخدم</th>
                    <th class="th1" class="w3-center"> الرقم</th>

    
                  </tr>

                  <!--لعشر طلاب متفوقين فقط-->

                  @foreach($users as $user)


                    <tr class="tr1">
        
                        <td class="td1" style="width:300px" class="w3-center "> @if($user->answered_questions != 0) {{ $user->correct_questions / $user->answered_questions * 100 }} @else {{ $user->correct_questions / 1 * 100 }} @endif % </td>
                        <td class="td1" style="width:300px"> @if($user->answered_questions != 0) {{ 100 - $user->correct_questions / $user->answered_questions * 100 }} @else {{ $user->correct_questions / 1 * 100 }} @endif % </td>
                        <td class="td1" style="width:300px"> {{ $user->phone }} </td>
                        <td class="td1" style="width:300px"> @if(!empty($user->university_id)) @foreach($university as $uni) @if($uni->id == $user->university_id) {{ $uni->name }} @endif @endforeach @else {{ '-' }} @endif </td>
                        <td class="td1" style="width:300px"> @if(!empty($user->learning_type)) {{ $user->learning_type }} @else {{ '-' }} @endif </td>
                        <td class="td1" style="width:300px"> @if(!empty($user->study_year)) {{ $user->study_year }} @else {{ '-' }} @endif </td>
                        <td class="td1" style="width:300px"> @if(!empty($user->country)) {{ $user->country . ' - ' . $user->city }} @else {{ '-' }} @endif </td>
                        <td class="td1" style="width:300px"> @if($user->graduated == 0) {{ 'طالب' }} @else {{ 'خريج' }} @endif </td>
                        <td class="td1" style="width:300px"> {{ $user->email }} </td>
                        <td class="td1" style="width:300px"> {{ $user->first_name . ' ' . $user->last_name}} </td>
                        <td class="td1" style="width:300px"> {{ $loop->index + 1}} </td>

        
                    </tr>

                  @endforeach
                  
    
                </table>
              </div>
            </div>
        </div>
    </div>
</body>
</html>