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
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
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

        <div class="containerpage-privilege">
            <h2>الاعلانات</h2>
            <br><br>

            <section id="events" class="events">
                <div class="container" data-aos="fade-up">

                    <div class="row">

                        @foreach($advertisements as $advertisement)
                        
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset('img/'.$advertisement->img) }}" alt="...">
                                </div>
                                <div class="card-body">
                                    <center>
                                    <h5 class="card-title"><a href="" style="text-decoration: none;"> {{ $advertisement->description}} </a></h5></center>
                                    <p> {{ $advertisement->start_date }} </p>
                                    <p> {{ $advertisement->end_date }} </p>
                                    <p class="card-text">
                                        <a href="/edit-ads/{{ $advertisement->id }}"><i  class="fa fa-edit m-2" aria-hidden="true"></i></i></a>
                                        <a href="/delete-advertisement/{{ $advertisement->id }}"><i class="fa fa-trash-o m-2" aria-hidden="true"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        
                </div>
            
<br><br><hr>
<br>
<h3 >اضافة اعلان جديد </h3>
<br>
        <div class="tab-pane" id="settings" role="tabpanel" style="padding-top: 10%;">
            <div class="card-body">
                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label class="col-md-12">عنوان الاعلان  </label>
                        <div class="col-md-12">
                            <input type="text2" name="description"  class="form-control form-control-line">
                        </div>
                    </div>
                    
                    <div class="form-group" style="margin-right:1% ;">
                        <select style="text-align:right;width:60%;color: #2f3d4a;" class="form-select" name="unit" aria-label="Defaultselect example">
                            <option selected id="one" >مدة الإعلان  </option>
                            <option value="day">يوم</option>
                            <option value="month">شهر </option>
                            <option value="year">سنة </option>
                        </select>
                    </div>                            
                    
                    <br>
                    
                    <div class="form-group">
                        <label class="col-md-12" >المدة </label>
                        <div class="col-md-12">
                            <input type="number" class="form-control form-control-line" name="duration" >
                        </div>
                    </div>
                        
                
                        
                    <div class="form-group" style=" border-radius: 5px;   box-shadow: 0 5px 20px rgb(0 0 0 / 5%);">  
                        <label style="font-size: 25px;padding-bottom: 30px;" name="img"><b>  ارفق صورة الاعلان  </b> </label>
                        <br>
                        <input type="file" name="image" >

                    </div>

                    <div class="form-group">
                        <label for="isText">إعلان كتابي</label>
                        <input type="checkbox" value="1" name="isText" id="isText">
                    </div>


                    <div class="form-group" >
                        <button type="submit" class="form-control-submit-button" id="addB">
                            إضافة
                        </button>
                    </div>

                </form>
            </div>
        </div>

<div>
    @if(isset($filename))

        
        {{ $filename }}

    @endif
</div>

</body>
</html>