<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title><!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

</head>


<body>

  <div class="sidebarn">
    <div class="search">
      <form action="/action_page.php">
        <input type="text" placeholder="...ابحث" name="search">
      </form>
    </div>

    <a href="dashboard">
      <i class="fa fa-dashboard" aria-hidden="true"></i>
      لوحة التحكم </a>
    <a href="chart.html">
      <i class="fa fa-pie-chart icons" aria-hidden="true"></i>
      الاحصائيات
    </a>
    <a href="allQuestion">
      <i class="fa fa-list" aria-hidden="true"></i>
      الأسئلة </a>
    <a href="request.html">
      <i class="fa fa-envelope-open" aria-hidden="true"></i>
      طلبات الاشتراك </a>
    <a href="users.html">
      <i class="fa fa-group" aria-hidden="true"></i>
      المستخدمين </a>
    <a href="profile.html">
      <i class="fa fa-address-card" aria-hidden="true"></i>
      الملف الشخصي </a>
    <a href="privilege.html">
      <i class="fa fa-cubes" aria-hidden="true"></i>
      الصلاحيات </a>
    <a href="pages.html">
      <i class="fa fa-clone" aria-hidden="true"></i>
      الصفحات </a>
    <a href="company.html">
      <i class="fa fa-building" aria-hidden="true"></i>
      الشركات
    </a>
    <a href="advertisement.html">
      <i class="fa fa-laptop icons" aria-hidden="true"></i>
      اعلانات </a>

  </div>

  <div class="head">
    <div class="col-div-6">
      <p class="nav"> Dashboard</p>

    </div>

    <div class="col-div-6">

      <div class="profile">

        <img src="{{ asset('img/icons8-admin-settings-male-50.png') }}" class="pro-img" />
        <p>Admin @php print_r($session) @endphp </p>

      </div>
    </div>

    <div class="containerpage">

      <div class="card p-70">
        <div class="media">
          <div class="media-left meida media-middle">
            <span><i class="fa fa-user" style="font-size: 20px;color:#342D7E"></i></span>
          </div>
          <div class="media-left media-text-right">
            <h2> {{ $count }} </h2>
            <h4 class="m-b-0">المستخدمين</h4>
          </div>
        </div>
      </div>

      <div style="border:#dbdbdd 0px solid;border-radius: 9px;padding:10px;box-shadow: 0px 0px 20px 1px #8f8f8f4a">
          <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

          <script>
            var xValues = ["التعليم العام ", "التعليم الخاص ", "التعليم المفتوح ", "التعليم الافتراضي "];
            var yValues = [{{$public}}, {{$private}}, {{$open}}, {{$virtual}}];
            var barColors = ["#022b50", "#342D7E", "#95B9C7", "#82CAFA"];

            new Chart("myChart", {
              type: "bar",
              data: {
                labels: xValues,
                datasets: [{
                  backgroundColor: barColors,
                  data: yValues
                }]
              },
              options: {
                legend: { display: false },
                title: {
                  display: true,
                  text: "احصائية المستخدمين الاكثر نشاطا"
                }
              }
            });
          </script>
        </div>

        <br><br><br>

      <div
        style="border:#dbdbdd 3px solid;border-radius: 9px;padding:10px;box-shadow: 5px 10px #dbdbdd">
        <h3 class="w3-right">المستخدمين الجدد</h3>

        <table class="table1">
          <tr class="tr1">

            <th class="th1" class="w3-center">عرض التفاصيل</th>
            <th class="th1" class="w3-center">تاريخ الانضمام </th>
            <th class="th1" class="w3-center">حالة المستخدم</th>
            <th class="th1" class="w3-center">اسم المستخدم</th>
            <th class="th1" class="w3-center">رقم المستخدم</th>

          </tr>
          
          @foreach($home as $row)
          
            <tr class="tr1">
                <td class="td1"style="width:300px" class="w3-center "> 
                    <a href="/detailUser/{{ $home[$loop->index]->id }}" style="text-decoration: none;text-align:center"> التفاصيل<i class="fa fa-search" style="font-size: 25px;"></i></a>
                </td>
                <td class="td1"style="width:300px"> {{ date('Y-m-d', strtotime($home[$loop->index]->created_at))  }} </td>
                <td class="td1"style="width:300px" id="td-qhd" class="w3-center"> @if($home[$loop->index]->graduated) {{ "خريج" }} @else {{ "طالب" }} @endif </td>
                <td class="td1"style="width:300px">{{ $home[$loop->index]->first_name . ' ' . $home[$loop->index]->last_name }}</td>
                <td class="td1"style="width:300px"> {{ $home[$loop->index]->id }} </td>
      
              </tr>

          @endforeach

          <tr class="tr1">

            <a href="#">
              <td class="td1"style="width:300px" class="w3-center "> <a href="users.html" style="text-decoration: none;text-align:center"> التفاصيل  <i  class="fa fa-search" style="font-size: 25px;"></i> </a> </td>
            </a>
            <td class="td1"style="width:300px" >2-3-2022 </td>
            <td class="td1"style="width:300px" id="td-qhd" class="w3-center">طالب</td>
            <td class="td1"style="width:300px">Raghad</td>
            <td class="td1"style="width:300px">5</td>

          </tr>

          <tr class="tr1">

            <a href="#">
              <td class="td1"style="width:300px" class="w3-center "> <a href="users.html" style="text-decoration: none;text-align:center">  التفاصيل <i  class="fa fa-search" style="font-size: 25px;"></i> </a> </td>
            </a>
            <td class="td1"style="width:300px">2-3-2022</td>
            <td class="td1"style="width:300px" id="td-qhd" class="w3-center">خريج</td>
            <td class="td1"style="width:300px">Raghad</td>
            <td class="td1"style="width:300px">7</td>

          </tr>
        </table>
      </div>
      <br<br><br><hr>
        
    </div>

</body>
</html>