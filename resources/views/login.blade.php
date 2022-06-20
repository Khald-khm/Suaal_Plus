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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  
</head>

<body>


    <div class="head-login" >
    
        <center>
        <h2>تسجيل الدخول </h2>
        </center>

        <div class="containerpage">

            
            <div class="tab-pane" id="settings" role="tabpanel">
                <div class="card-body">
                    <form action="/login" method="post" class="form-horizontal form-material">
                        @csrf
                        <div style="margin-right:20% ;">
                            <div class="form-group">
                                <label class="col-md-12">اسم المستخدم</label>

                                <div class="col-md-12">
                                    <input type="text" name="username" class="form-control form-control-line">
                                </div>

                            <div class="underline">
                            </div>

                        </div>
                      
                        <div class="form-group">
                            <label class="col-md-12">كلمة المرور</label>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control form-control-line">
                            </div>
                            <div class="underline">
                            </div>

                        </div>
                        <div class="form-group" >


                            <button type="submit" name="submit" class="form-control-submit-button" id="addB">
                                تسجيل دخول
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            </center>
        </div>
    </div>
</body>
</html>