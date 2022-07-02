<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        </div>

        <div class="containerpage-privilege">

            <div class="col-div-12">
                <div class="box-8">
                    <div class="content-box">
                        <br />
                        <h3 style="text-align: right;">الصلاحيات</h3>
                        <hr>
        
                        <table class="table-users">
                            <tr class="tr1">
                            
                            @foreach($privilege as $name)

                                <th class="th-privilege" class="w3-center"> {{ $name->name }} </th>

                            @endforeach

                                <th class="th-privilege" class="w3-center">اسم المستخدم</th>
                                <th class="th-privilege" class="w3-center">رقم المستخدم</th>



                            </tr>

                            @foreach($users as $user)

                                <tr class="tr1">
                                    
                                @foreach($privilege as $privileges)

                                <td class="td-privilege" ><input class="privilege" type="checkbox" data-user="{{ $user->id }}" value="{{ $privileges->id }}" @foreach($user_privileges as $priv) @if($priv->user_id == $user->id) @if($privileges->id == $priv->privilege_id) {{ 'checked' }} @endif @endif @endforeach ></td>

                                @endforeach
                                
                                    <td class="td1" > {{ $user->first_name . " " . $user->last_name }} </td>
                                    <td class="td-users" > {{ $loop->index + 1}} </td>



                                </tr>

                            @endforeach
                     
             

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        
        $('.privilege').on('change', function(){

            // alert($(this).val() + "  user_id = " + $(this).attr('data-user'));

            // alert($(this).is(':checked'));

            var checkStatus = $(this).is(':checked');

            // console.log(status);


            let _token = $('meta[name="csrf-token"]').attr('content');

            var form = new FormData();

            
            form.append('_token', _token);

            form.append('user_id' , $(this).attr('data-user'));

            form.append('privilege_id', $(this).val());

            // if($(this).is(':checked') == true)
            // {
            //     form.append('status', true);
            // }
            // else
            // {
            //     form.append('status', false);
            // }

            // // form.append('status', $(this).is(':checked'));
            
            form.append('checkStatus', checkStatus);


            $.ajax({
                type: 'POST',
                url: '/privilege',
                data: form,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data){
                    console.log(data);

                    alert('success');
                },
                error: function(error){
                    console.log(error);

                    alert('error');
                }
            });

            
        });

    </script>


</body>
</html>
