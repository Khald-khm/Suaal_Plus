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

        <div class="containerpage">

            
            <div class="tab-pane" id="settings" role="tabpanel">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="/edit-user/{{ request('id') }}" method="post">

                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label class="col-md-12"> الاسم الاول </label>
                            <div class="col-md-12">
                                <input type="text2" name="first_name" class="form-control form-control-line" value="{{ $user[0]->first_name }}" required>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="col-md-12"> الاسم الاخير </label>
                            <div class="col-md-12">
                                <input type="text2" name="last_name" class="form-control form-control-line" value="{{ $user[0]->last_name }}" required>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="col-md-12"> البريد الالكتروني </label>
                            <div class="col-md-12">
                                <input type="text2" name="email" class="form-control form-control-line" value="{{ $user[0]->email }}" readonly>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="col-md-12">كلمة المرور</label>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control form-control-line" >
                            </div>
                        </div>

                        <div class="form-group">

                            @if(isset($error))
                                {{ $error }}
                            @endif

                        </div>

                        <div class="form-group" >
                            <button type="submit" class="form-control-submit-button" id="addB">
                                تعديل
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>