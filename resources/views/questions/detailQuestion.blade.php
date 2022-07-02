<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Question Details</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body >
 
   <div class="sidebarn">
      <div class="search">
        <form action="/action_page.php">
            <input type="text" placeholder="...ابحث" name="search">
          </form>
        </div>
      <a href="/dashboard">
        <i class="fa fa-dashboard" aria-hidden="true"></i>
لوحة التحكم         </a>
      <a href="/chart">
        <i class="fa fa-pie-chart icons" aria-hidden="true"></i>
        الاحصائيات
              </a>
      <a href="/allQuestion">
        <i class="fa fa-list" aria-hidden="true"></i>
        الأسئلة        </a>
        <a href="/subject">
            <i class="fa fa-book" aria-hidden="true"></i>
        المواد </a>
      <a href="request.html">
        <i class="fa fa-envelope-open" aria-hidden="true"></i>
        طلبات الاشتراك        </a>
      <a href="/users">
        <i class="fa fa-group" aria-hidden="true"></i>
        المستخدمين        </a>
      <a href="/profile">
          <i class="fa fa-address-card" aria-hidden="true"></i>
          الملف الشخصي          </a>
        <a href="/privilege">
          <i class="fa fa-cubes" aria-hidden="true"></i>
          الصلاحيات          </a>
         <a href="pages.html">
          <i class="fa fa-clone" aria-hidden="true"></i>
          الصفحات          </a>
          <a href="/company">
              <i class="fa fa-building" aria-hidden="true"></i>
              الشركات
            </a>
        <a href="/advertisement">
          <i class="fa fa-laptop icons" aria-hidden="true"></i>
اعلانات          </a>
       
        </div>

        <div class="head">
          <div class="col-div-6">
  <p class="nav"> Dashboard</p>
  
  </div>
      
  <div class="col-div-6">

      <div class="profile">
  
        <img src="{{ asset('img/icons8-admin-settings-male-50.png') }}"class="pro-img" />
        <p>Manoj Adhikari </p>
          <div class="profile-div">
              <p><i class="fa fa-user"></i> &nbsp;&nbsp;Profile</p>
              <p><i class="fa fa-cogs"></i> &nbsp;&nbsp;Settings</p>
              <p><i class="fa fa-power-off"></i> &nbsp;&nbsp;Log Out</p>
          </div>
      </div>
  </div>

        <div class="containerpage" >
                      <h2 class="w3-right">تفاصيل السؤال </h2><br><br><br>
             <a href="/editQuestion/{{ $details[0]->id }}" id="edit" class="w3-right" >تعديل</a>
             <a href="/deleteQuestion/{{ $details[0]->id }}" id="edit" class="w3-right">حذف</a>

             <table  class="table1" class="w3-table-all"  >
              <tr class="tr2">
                <th class="th2" class="w3-center" >البيانات </th>
                <th class="th2"class="w3-center">الحقل </th>
                  </tr>
              

            <tr class="tr2">

                <td class="td2" class="w3-center" > {{ $details[0]->learning_type }} </td>
            <td class="td2" class="w3-center">نوع التعليم </td>
            
              </tr>
              <tr class="tr2">

                <td class="td2" class="w3-center" > {{ $details[0]->university_name }} </td>
            <td class="td2" class="w3-center" >الجامعة </td>
            
              </tr>
              <tr class="tr2">

                <td class="td2" class="td2" class="w3-center" > {{ $details[0]->subject_name }} </td>
            <td class="td2" class="w3-center" >المادة</td>
            
              </tr>
              <tr class="tr2">
                <td class="td2" class="td2" class="w3-center"  > @if(isset($chapter[0]->name)) {{ $chapter[0]->name }} @else - @endif </td>
            <td class="td2" class="w3-center">الفصل-الفهرس </td>
            
              </tr>
              <tr class="tr2">

                <td class="td2"   class="w3-center" >  @if(isset($details[0]->sub_chapter)) {{ $details[0]->sub_chapter }} @else - @endif </td>
            <td class="td2" class="w3-center">الباب-الفهرس </td>
            
              </tr>
              <tr class="tr2">
                <td class="td2"   class="w3-center" > {{ $details[0]->year_time }} </td>
            <td class="td2"  class="w3-center">الدورة </td>
            
              </tr>
              <tr class="tr2">

                <td class="td2"   class="w3-center" > @if(isset($details[0]->library)) {{ $details[0]->library }} @else - @endif</td>
            <td class="td2"  class="w3-center">المكتبة</td>
            
              </tr>
              <tr class="tr2">

                <td class="td2"   class="w3-center" > {{ $details[0]->type }} </td>
            <td class="td2"  class="w3-center">نوع السؤال</td>
            
              </tr> 
               <tr class="tr2">
            
              </tr>
              <tr class="tr2">
                <td class="td2"  class="w3-center"  > {{ $specialize[0]->specialize_name }} </td>
            <td class="td2"  class="w3-center">اختصاص المادة </td>
            
              </tr>
              <tr class="tr2">

                <td class="td2"   class="w3-center" >  {{ $details[0]->title }}  </td>
            <td class="td2"  class="w3-center">نص السؤال </td>
            
            </tr>


            @foreach($correct as $row)

              <tr class="tr2">
                <td class="td2 w3-center" > {{ $row->title }} </td>
                <td class="td2 w3-center">الجواب الصحيح</td>
              </tr>
            
            @endforeach
            
            @foreach($wrong as $row)

              <tr class="tr2">
                <td class="td2 w3-center"  > {{ $row->title }} </td>
                <td class="td2 w3-center">الجواب الخطأ</td>
              </tr>

            @endforeach
            
            
             
            </table>
          </div>
          

</div>
<!-- /.container-fluid -->
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>