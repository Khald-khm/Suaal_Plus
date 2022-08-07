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
    <link href="css/style.css" rel="stylesheet">

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
        <a href="/allQuestions">
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
            المستخدمين </a>
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

    <br>
    <h3 class="m-3" style="margin: 30px; text-align: right;">تعديل اعلان  </h3>

    <div class="tab-pane" id="settings" role="tabpanel" >
        
        <div class="card-body">
            <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">

                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label class="col-md-12">عنوان الاعلان  </label>
                    <div class="col-md-12">
                        <input type="text2" name="description"  class="form-control form-control-line" value="{{ $ad[0]->description }}">
                    </div>
                </div>
                
                <div class="form-group" style="margin-right:1% ;">
                    <select style="text-align:right;width:60%;color: #2f3d4a;" class="form-select" name="unit" aria-label="Defaultselect example">
                        <option selected id="one" >مدة الإعلان  </option>
                        <option value="day" selected>يوم</option>
                        <option value="month">شهر </option>
                        <option value="year">سنة </option>
                    </select>
                </div>                            
                
                <br>
                
                <div class="form-group">
                    <label class="col-md-12" >المدة </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-line" name="duration" value="{{ $days }}">
                    </div>
                </div>
                    
            
                    
                <div class="form-group" style=" border-radius: 5px;   box-shadow: 0 5px 20px rgb(0 0 0 / 5%);">  
                    <label style="font-size: 25px;padding-bottom: 30px;" name="img"><b>  ارفق صورة الاعلان  </b> </label>
                    <br>
                    <input type="file" name="image" >

                </div>

                <div class="form-group">
                    <label for="isText">إعلان كتابي</label>
                    <input type="checkbox" value="1" name="isText" id="isText" @if($ad[0]->isText == 1) checked @endif>
                </div>


                <div class="form-group" >
                    <button type="submit" class="form-control-submit-button" id="addB">
                        تعديل
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>