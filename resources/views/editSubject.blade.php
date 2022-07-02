<!DOCTYPE html>
<html lang="ar" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>law</title>

    <!-- Custom fonts for this template-->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link href="css/style.css" rel="stylesheet" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
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
        <p class="nav">Dashboard</p>
      </div>

      <div class="col-div-6">
        <div class="profile">
          <img src="img/icons8-admin-settings-male-50.png" class="pro-img" />
          <p><a href="/profile">Raghad Alalem</a></p>
        </div>
      </div>

      <div class="containerpage-deatils">
        <h2 style="margin-top: 5%; color: #2f3d4a">تعديل مادة</h2>
        <br />
        
        <form action="/edit-subject" method="post">
        
            @csrf

            <input type="text" name="id" value="{{ $subject[0]->subject_id }}" hidden>

            <div class="form-group" style="display: inline-block">
            <label id="l1"> اسم المادة </label>
            <input
                type="text"
                class="form-control-input"
                id="text"
                name="name" value="{{ $subject[0]->subject_name }}"
                required
            />
            <label class="label-control" for="lname"></label>
            </div>

            <select
            style="text-align: right; width: 370px; color: #2f3d4a"
            class="form-select"
            aria-label="Default select example" name="university">

            <option id="one">الجامعة</option>
            @foreach($university as $university)

                <option value="{{ $university->id }}" @if($university->id == $subject[0]->university_id) selected @endif > {{ $university->name }} </option>
            
            @endforeach
            </select><br />
            <select
            style="text-align: right; width: 370px; color: #2f3d4a"
            class="form-select"
            aria-label="Default select example" name="year"
            >
            <option id="one">السنة</option>
            <option value="1" @if($subject[0]->year == 1) selected @endif >السنة الاولى</option>
            <option value="2" @if($subject[0]->year == 2) selected @endif>السنة الثانية</option>
            <option value="3" @if($subject[0]->year == 3) selected @endif>السنة الثالثة</option>
            <option value="4" @if($subject[0]->year == 4) selected @endif>السنة الرابعة</option>
            </select>
            <br />
            <select
            style="text-align: right; width: 370px; color: #2f3d4a"
            class="form-select"
            aria-label="Default select example" name="specialize"
            >
            <option id="one">اختصاص المادة</option>
            @foreach($specialize as $specialize)

                <option value="{{ $specialize->id }}" @if($subject[0]->specialize_id == $specialize->id) selected @endif> {{ $specialize->name }} </option>
            
            @endforeach
            </select>
            <br />

            <div>
                @if(isset($error))
                    {{ $error }}
                @endif
            </div>

            <div class="form-group" style="display: inline-block">
            <button
                type="submit"
                class="form-control-submit-button"
                id="addB"
            >
                تعديل
            </button>
            </div>
        
        </form>
      </div>
    </div>
  </body>
</html>
