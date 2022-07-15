<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Questions</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
            <a href="/statistics">
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
           
            </div>
        </div>
    
              <div class="containerpage" >
    
                <h2 style="margin-top:5%"> الأسئلة</h2><br>
            <a href="addQuestion" id="edit" class="w3-right" >إضافة سؤال جديد</a>
            <br><br>
            <div style="display:flex">

                <select style="text-align: right;width:200px" class="form-select questionByType questionFilter" aria-label="Default select example">
                    <option value="">نمط السؤال </option>
                    <option value="الاجابة الصحيحة">الاجابة الصحيحة</option>
                    <option value="الاجابة الخاطئة">الاجابة الخاطئة</option>
                    <option value="الاجابة المختلفة">الاجابة المختلفة</option>
                    <option value="الاجابة الأصح">الاجابة الأصح</option>
                </select>

                <select style="text-align: right;width:200px" class="form-select questionBySubject questionFilter" aria-label="Default select example">
                    <option value="">المواد</option>
                    @foreach($subjects as $subject)

                      <option value="{{ $subject->id }}"> {{ $subject->name }} </option>

                    @endforeach
                </select>

                <select style="text-align: right;width:200px" class="form-select questionByLearning questionFilter" aria-label="Default select example">
                  <option value="">نوع التعليم </option>
                  <option value="عام" >عام</option>
                  <option value="خاص" >خاص</option>
                  <option value="مفتوح" >مفتوح</option>
                  <option value="افتراضي" >افتراضي</option>
                </select>

            </div>

            <br>

            <p >

              العدد الكلي : {{ count($all) }}
              
            </p>
            <table class="table1">
                <tr class="tr1">
                    <th class="th1" class="w3-center">التفاصيل </th>
                    <th  class="th1"style="width:300px" class="w3-center">السنة</th>
                    <th  class="th1"style="width:300px" class="w3-center">نوع التعليم</th>
                    <th  class="th1" style="width:300px"class="w3-center">الجامعة</th>
                    <th class="th1"style="width:600px" class="w3-center" >المادة</th>
                    <th class="th1"style="width:900px" class="w3-center">نص السؤال </th>
                    <th class="th1"  class="w3-center">رقم السؤال </th>
                </tr>

            @foreach($all as $row)
                <tr >
                    <td class="td1" class="w3-center "> <a href="{{ url('/detailQuestion/'. $all[$loop->index]->id) }}" style="text-decoration: none;text-align:center">   <i  class="fa fa-search" style="font-size: 25px;"></i> </a> </td>
                    <td  class="td1" class="w3-center ">  {{ $all[$loop->index]->year }} </td>
                    <td  class="td1" class="w3-center "> {{ $all[$loop->index]->learning_type }} </td>
                    <td  class="td1" class="w3-center "> {{  $all[$loop->index]->name}} </td>
                    <td  class="td1" class="w3-center "> {{ $all[$loop->index]->subject_name }} </td>
                    <td   class="td1" class="w3-center "> {{ $all[$loop->index]->title }} </td>
                    <td   class="td1" class="w3-center "> {{ $loop->index + 1 }} </td>

                </tr>
            @endforeach
              
            </table>

<!--     جدول الإجابة المتعددة        
                <table class="table1">
              <tr class="tr1">
                <th class="th1" class="w3-center">التفاصيل </th>
                <th  class="th1"style="width:300px" class="w3-center">السنة</th>
                <th  class="th1"style="width:300px" class="w3-center">نوع التعليم</th>
                <th  class="th1" style="width:300px"class="w3-center">الجامعة</th>
                <th class="th1"style="width:600px" class="w3-center" >المادة</th>
                <th class="th1"style="width:900px" class="w3-center">نص السؤال </th>
                <th class="th1"  class="w3-center">رقم السؤال </th>


              </tr>
              <tr >
                <td class="td1" class="w3-center "> <a href="deatils-question.html" style="text-decoration: none;text-align:center">   <i  class="fa fa-search" style="font-size: 25px;"></i> </a> </td>
                <td  class="td1" class="w3-center ">الاولى </td>
                <td  class="td1" class="w3-center ">افتراضي</td>
                <td  class="td1" class="w3-center ">دمشق </td>
                <td  class="td1" class="w3-center ">المقاولات الادراية </td>
                <td   class="td1" class="w3-center ">ماهي المدن السوريةتتتتتتتتتتتتتتتتتتتتتتتتتتتتتتتتتيييييييييييي؟ </td>
                <td   class="td1" class="w3-center ">50</td>

              </tr>
              
            </table> -->
          </div>
          

</div>
<!-- /.container-fluid -->


<script src=" {{ asset('js/jquery.min.js') }} "></script>
<script src=" {{ asset('js/main.js') }} "></script>



</body>

</html>