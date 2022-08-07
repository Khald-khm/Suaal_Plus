<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>law</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
     <a href="dashboard.html">
            <i class="fa fa-dashboard" aria-hidden="true"></i>
            لوحة التحكم </a>
        <a href="chart.html">
            <i class="fa fa-pie-chart icons" aria-hidden="true"></i>
            الاحصائيات
        </a>
        <a href="question-home.html">
            <i class="fa fa-list" aria-hidden="true"></i>
            الأسئلة </a>
            <a href="subject.html">
            <i class="fa fa-book" aria-hidden="true"></i>
            المواد </a>
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
       
        
        <a href="company.html">
            <i class="fa fa-building" aria-hidden="true"></i>
            الشركات
        </a>
        <a href="advertisement.html">
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
        <div class="containerpage-company">
        <h3>تعديل معلومات القسيمة  </h3>
        <div class="tab-pane" id="settings" role="tabpanel">
            <div class="card-body">
                <form class="form-horizontal form-material" action="/edit-copon/{{ request('id') }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label class="col-md-12"> الوصف </label>
                        <div class="col-md-12">
                            <input type="text" name="description" class="form-control form-control-line" value="{{$coponInfo[0]->description}}">
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label class="col-md-12">الشركة </label>
                        <select style="text-align:right;color: #2f3d4a;" class="form-select" name="company_id" aria-label="Default select example">
                                
                            @foreach($companies as $company)

                                <option value="{{ $company->id }}" @if($coponInfo[0]->company_id == $company->id) selected @endif>{{ $company->name }} </option>

                                
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group" style="margin-right:5% ;">

                    <select style="text-align:right;width:200px;color: #2f3d4a;" name="status" class="form-select" aria-label="Default select example">
                        <option selected id="one" >حالة القسيمة  </option>
                        <option value="inactive" @if($coponInfo[0]->status == "inactive") selected @endif> غير فعالة </option>
                        <option value="active" @if($coponInfo[0]->status == "active") selected @endif>فعالة</option>
                        
                    </select>

</div>

    <div class="form-group" >


        <button type="submit" class="form-control-submit-button" href="profile.html" id="addB">تعديل
        </button>
    </div>

    <br>
</div>

</body>
</html>