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
        <div class="containerpage-company">
            <h3>اضافة قسيمة جديدة  </h3>
            <div class="tab-pane" id="settings" role="tabpanel">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post">

                        @csrf

                        <div class="form-group">
                            <label class="col-md-12"> الوصف </label>
                            <div class="col-md-12">
                                <textarea class="form-control form-control-line" name="description"></textarea>
                            </div>
                        </div>
                    
                    
                        <div class="form-group">
                            <label class="col-md-12">الشركة </label>
                            <select style="text-align:right;color: #2f3d4a;" class="form-select" name="company" aria-label="Default select example">
                                    
                                @foreach($companies as $company)

                                    <option value="{{ $company->id }}">{{ $company->name }} </option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="">
                            <label class="col-md-12">حالة القسيمة </label>
                            <div class="col-md-12">
                                
                                <select style="text-align:right;color: #2f3d4a;" class="form-select" name="status" aria-label="Default select example">
                                    
                                    <option value="inactive">غير فعالة </option>
                                    <option value="active">فعالة</option>

                                </select>

                            </div>

                        </div>


                        <div class="form-group" >
                            <button type="submit" class="form-control-submit-button" href="/profile" id="addB">
                                اضافة
                            </button>
                        </div>
                    </form>
                </div>    
            </div>

            <br>
            <hr>
            <table style="margin-left: 30%;" >
                <tr class="tr1">
                    <th class="th3" class="w3-center" >حذف </th>
                    <th class="th3" class="w3-center" >تعديل</th>
                    <th class="th2" class="w3-center">حالة القسيمة</th>
                    <th class="th2" class="w3-center">اسم الشركة</th>
                    <th class="th1" class="w3-center" >وصف القسيمة</th>



                </tr>

                @foreach($copons as $copon)

                    <tr class="tr1">
                        <td class="td1" class="w3-center " > <a href="/delete-copon/{{ $copon->id }}" style="text-decoration: none;text-align:center">   <i  class="fa fa-trash-o" style="font-size: 25px;"></i> </a> </td>                
                        <td class="td1" class="w3-center " > <a href="/edit-copon/{{ $copon->id }}" style="text-decoration: none;text-align:center">   <i  class="fa fa-edit" style="font-size: 25px;"></i> </a> </td>
                        <td class="td1"  > {{ $copon->status }} </td>                             
                        <td class="td1"  > {{ $copon->company_name }} </td>                           
                        <td class="td1" > {{ $copon->description }} </td>
                    </tr>

                @endforeach

                <tr class="tr1">
                    <td class="td1" class="w3-center " > <a href="/delete-copon/{id}" style="text-decoration: none;text-align:center">   <i  class="fa fa-trash-o" style="font-size: 25px;"></i> </a> </td>                
                    <td class="td1" class="w3-center " > <a href="/edit-copon/{id}" style="text-decoration: none;text-align:center">   <i  class="fa fa-edit" style="font-size: 25px;"></i> </a> </td>
                    <td class="td1"  >فعالة </td>                             
                    <td class="td1"  >الشركة 1</td>                           
                    <td class="td1" >1</td>
                </tr>
        


            </table>


        </div>
</body>
</html>