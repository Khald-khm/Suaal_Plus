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
  <link rel="stylesheet" href=" {{ asset('css/style.css') }}"  >
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

    <div class="containerpageChart">

      <div class="clearfix"></div>


      <div class="chart1" style="display:flex">
        <div class="col-div-4-1">
          <div class="box">
            <div class="media-left meida media-middle">
              <span><i class="fa fa-users" style="font-size: 20px;color:#342D7E"></i></span>
            </div>
            <div class="media-left media-text-right">
              <h2> {{ $firstYear }} </h2>
              
              <h4 class="m-b-0">طلاب السنة الاولى</h4>
              
            </div>
          </div>
        </div>

        <div class="col-div-4-1">
          <div class="box">
            <div class="media-left meida media-middle">
              <span><i class="fa fa-users" style="font-size: 20px;color:#342D7E"></i></span>
            </div>
            <div class="media-left media-text-right">
              <h2> {{ $secondYear }} </h2>
              <h4 class="m-b-0">طلاب السنة الثانية</h4>
            </div>
          </div>
        </div>

        <div class="col-div-4-1">
          <div class="box">
            <div class="media-left meida media-middle">
              <span><i class="fa fa-users" style="font-size: 20px;color:#342D7E"></i></span>
            </div>
            <div class="media-left media-text-right">
              <h2> {{ $thirdYear }} </h2>
              <h4 class="m-b-0">طلاب السنة الثالثة </h4>
            </div>
          </div>
        </div>

        <div class="col-div-4-1">
          <div class="box">
            <div class="media-left meida media-middle">
              <span><i class="fa fa-users" style="font-size: 20px;color:#342D7E"></i></span>
            </div>
            <div class="media-left media-text-right">
              <h2> {{ $fourthYear }} </h2>
              <h4 class="m-b-0">طلاب السنة الرابعة</h4>
            </div>
          </div>
        </div>

      </div>
      <div class="clearfix"></div>
      <br />


      <div class="col-div-4-1">
        <div class="box-3">
          <div class="content-box-3">
            <p class="head-1">الخريجين </p>
            <span class="no-4" >عدد الخريجين  {{ $graduated }} </span><br><br>

            <div class="circle-wrap">
              <div class="circle">
              
                <div class="mask half">
                  <div class="fill"></div>
                </div>
                <div class="inside-circle"> {{ round($graduated / $allUsers * 100, 0) }}%</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-div-4-1">
        <div class="box-3">
          <div class="content-box-3">
            <p class="head-1">الطلاب </p>
            <span class="no-4" >عدد الطلاب  {{ $students }} </span><br><br>

            <div class="circle-wrap">
              <div class="circle">
                <div class="mask full">
                  <div class="fill"></div>
                </div>
                <div class="mask half">
                  <div class="fill"></div>
                </div>
                <div class="inside-circle"> {{ round($students / $allUsers * 100, 0)  }}% </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-div-4-1">
        <div class="box-1" >
          <div class="content-box-1">
            <p class="head-1" >الطلاب المتفوقين<a href="excellent-students.html">مشاهدة الكل </a></p>
            <br />
            


            @foreach($firstTen as $student)

              

              <div class="m-box active">
              <p> {{ $student->first_name . " " . $student->last_name }} <br/></p>
              <span class="no-3"> @if($student->answered_questions != 0) {{ $student->correct_questions / $student->answered_questions * 100 }} @else {{ $student->correct_questions / 1 * 100 }} @endif %</span><br>
              <span class="no-2" style="margin-left:50%"> {{ $student->answered_questions }} عددالأسئلة</span>
              </div><br>

            @endforeach

            
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <br />
      <div class="col-div-4-1">
        <div class="box-3" style="height: 350px;">
          <div class="content-box-3">
            <p class="head-1">الاجابات الاكثر اختيارا</p>
            <br />
            <div class="m-box active">
              <span class="no-3">اختر الإجابة الصحيحة</span><br>
              <span class="no-2"> {{ $correctAnswer }} </span>
            </div><br>

            <div class="m-box active">
              <span class="no-3">اختر الإجابة الخاطئة</span><br>
              <span class="no-2"> {{ $wrongAnswer }} </span>
            </div><br>

            <div class="m-box active">
              <span class="no-3">اخترالإجابة المخالفة </span><br>
              <span class="no-2"> {{ $diffAnswer }} </span>
            </div><bR>
            <div class="m-box active">
              <span class="no-3">اخترالإجابة الاصح </span><br>
              <span class="no-2"> {{ $truestAnswer }} </span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-div-4-1">
        <div class="box-1">
          <div class="content-box-1">
            <p class="head-1">ترتيب الطلاب <a href="students-arrangement.html">مشاهدة الكل </a></p>
            <br />
            <p class="act-p">Raghad <i class="fa fa-circle" style="color:red!important;"></i>
            </p>
            <p class="act-p">Raghad <i class="fa fa-circle" style="color:blue!important;"></i>
            </p>
            <p class="act-p">Raghad <i class="fa fa-circle" style="color:orange!important;"></i>
            </p>
            <p class="act-p">Raghad <i class="fa fa-circle" style="color:green!important;"></i>
            </p>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
      <br />
      <div class="col-div-12">
        <div class="box-8">
          <div class="content-box">
            <p class="head-1"> <a href="/answerStatistics">مشاهدة الكل </a></p>
            <br />
            <table class="table1">
              <tr class="tr1">

                <th class="th1" class="w3-center">معدل الاجابات الصحيحة </th>
                <th class="th1" class="w3-center">معدل الاجابات الخاطئة </th>
                <th class="th1" class="w3-center">المادة</th>


              </tr>
              <tr class="tr1">

                <td class="td1" style="width:300px" class="w3-center "> @if($subjects[0]->asked_time != 0) {{ round($subjects[0]->correct / $subjects[0]->asked_time * 100, 0) }} @else {{ 0 }} @endif % </td>
                <td class="td1" style="width:300px"> @if($subjects[0]->asked_time != 0) {{ round($subjects[0]->wrong / $subjects[0]->asked_time * 100, 0) }} @else {{ 0 }} @endif % </td>
                <td class="td1" style="width:300px"> {{ $subjects[0]->name }} </td>

              </tr>

            </table>
          </div>
        </div>
      </div>



      <div class="clearfix"></div>
    </div>