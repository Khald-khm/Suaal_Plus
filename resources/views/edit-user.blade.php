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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                <p><a href="profile.html">Raghad Alalem</a> </p>

            </div>
        </div>

        <div class="containerpage-deatils"  >
            <h2 style="margin-top:5%;color: #2f3d4a;"> تعديل معلومات المستخدم</h2><br>
                <form action="/edit-user/{{ request('id') }}" method="post">

                    @csrf
                    @method('PATCH')

                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> الاسم الأول </label>
                            <input type="text" class="form-control-input" id="text" name="first_name" value="{{ $user[0]->first_name }}" required>
                            <label class="label-control" for="lname"></label>
                        </div>

                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> الاسم الأخير </label>
                            <input type="text" class="form-control-input" id="text" name="last_name" value="{{ $user[0]->last_name }}" required>
                            <label class="label-control" for="lname"></label>
                        </div>

                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> رقم الموبايل </label>
                            <input type="text" class="form-control-input" id="text" name="phone" value="{{ $user[0]->phone }}" required>
                            <label class="label-control" for="lname"></label>
                        </div>

                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> اسم المستخدم </label>
                            <input type="text" class="form-control-input" id="text" name="username" value="{{ $user[0]->username }}" required readonly>
                            <label class="label-control" for="lname"></label>
                        </div>

                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> البريد الإلكتروني </label>
                            <input type="email" class="form-control-input" id="text" name="email" value="{{ $user[0]->email }}">
                            <label class="label-control" for="lname"></label>
                        </div>
                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> تاريخ الميلاد  </label>
                            <input type="text2" class="form-control-input" id="birth_date" name="birth_date">
                            <label class="label-control" for="lname"></label>
                        </div>

                        <select style="text-align: right;width:370px;color: #2f3d4a;" class="form-select" aria-label="Default select example" name="country">
                            <option selected id="one"> البلد </option>
                            <option value="أفغانستان">أفغانستان</option>
                            <option value="ألبانيا">ألبانيا</option>
                            <option value="الجزائر">الجزائر</option>
                            <option value="أندورا">أندورا</option>
                            <option value="أنغولا">أنغولا</option>
                            <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                            <option value="الأرجنتين">الأرجنتين</option>
                            <option value="أرمينيا">أرمينيا</option>
                            <option value="أستراليا">أستراليا</option>
                            <option value="النمسا">النمسا</option>
                            <option value="أذربيجان">أذربيجان</option>
                            <option value="البهاما">البهاما</option>
                            <option value="البحرين">البحرين</option>
                            <option value="بنغلاديش">بنغلاديش</option>
                            <option value="باربادوس">باربادوس</option>
                            <option value="بيلاروسيا">بيلاروسيا</option>
                            <option value="بلجيكا">بلجيكا</option>
                            <option value="بليز">بليز</option>
                            <option value="بنين">بنين</option>
                            <option value="بوتان">بوتان</option>
                            <option value="بوليفيا">بوليفيا</option>
                            <option value="البوسنة والهرسك ">البوسنة والهرسك </option>
                            <option value="بوتسوانا">بوتسوانا</option>
                            <option value="البرازيل">البرازيل</option>
                            <option value="بروناي">بروناي</option>
                            <option value="بلغاريا">بلغاريا</option>
                            <option value="بوركينا فاسو ">بوركينا فاسو </option>
                            <option value="بوروندي">بوروندي</option>
                            <option value="كمبوديا">كمبوديا</option>
                            <option value="الكاميرون">الكاميرون</option>
                            <option value="كندا">كندا</option>
                            <option value="الرأس الأخضر">الرأس الأخضر</option>
                            <option value="جمهورية أفريقيا الوسطى ">جمهورية أفريقيا الوسطى </option>
                            <option value="تشاد">تشاد</option>
                            <option value="تشيلي">تشيلي</option>
                            <option value="الصين">الصين</option>
                            <option value="كولومبيا">كولومبيا</option>
                            <option value="جزر القمر">جزر القمر</option>
                            <option value="كوستاريكا">كوستاريكا</option>
                            <option value="ساحل العاج">ساحل العاج</option>
                            <option value="كرواتيا">كرواتيا</option>
                            <option value="كوبا">كوبا</option>
                            <option value="قبرص">قبرص</option>
                            <option value="التشيك">التشيك</option>
                            <option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option>
                            <option value="الدنمارك">الدنمارك</option>
                            <option value="جيبوتي">جيبوتي</option>
                            <option value="دومينيكا">دومينيكا</option>
                            <option value="جمهورية الدومينيكان">جمهورية الدومينيكان</option>
                            <option value="تيمور الشرقية ">تيمور الشرقية </option>
                            <option value="الإكوادور">الإكوادور</option>
                            <option value="مصر">مصر</option>
                            <option value="السلفادور">السلفادور</option>
                            <option value="غينيا الاستوائية">غينيا الاستوائية</option>
                            <option value="إريتريا">إريتريا</option>
                            <option value="إستونيا">إستونيا</option>
                            <option value="إثيوبيا">إثيوبيا</option>
                            <option value="فيجي">فيجي</option>
                            <option value="فنلندا">فنلندا</option>
                            <option value="فرنسا">فرنسا</option>
                            <option value="الغابون">الغابون</option>
                            <option value="غامبيا">غامبيا</option>
                            <option value="جورجيا">جورجيا</option>
                            <option value="ألمانيا">ألمانيا</option>
                            <option value="غانا">غانا</option>
                            <option value="اليونان">اليونان</option>
                            <option value="جرينادا">جرينادا</option>
                            <option value="غواتيمالا">غواتيمالا</option>
                            <option value="غينيا">غينيا</option>
                            <option value="غينيا بيساو">غينيا بيساو</option>
                            <option value="غويانا">غويانا</option>
                            <option value="هايتي">هايتي</option>
                            <option value="هندوراس">هندوراس</option>
                            <option value="المجر">المجر</option>
                            <option value="آيسلندا">آيسلندا</option>
                            <option value="الهند">الهند</option>
                            <option value="إندونيسيا">إندونيسيا</option>
                            <option value="إيران">إيران</option>
                            <option value="العراق">العراق</option>
                            <option value="جمهورية أيرلندا ">جمهورية أيرلندا </option>
                            <option value="فلسطين">فلسطين</option>
                            <option value="إيطاليا">إيطاليا</option>
                            <option value="جامايكا">جامايكا</option>
                            <option value="اليابان">اليابان</option>
                            <option value="الأردن">الأردن</option>
                            <option value="كازاخستان">كازاخستان</option>
                            <option value="كينيا">كينيا</option>
                            <option value="كيريباتي">كيريباتي</option>
                            <option value="الكويت">الكويت</option>
                            <option value="قرغيزستان">قرغيزستان</option>
                            <option value="لاوس">لاوس</option>
                            <option value="لاوس">لاوس</option>
                            <option value="لاتفيا">لاتفيا</option>
                            <option value="لبنان">لبنان</option>
                            <option value="ليسوتو">ليسوتو</option>
                            <option value="ليبيريا">ليبيريا</option>
                            <option value="ليبيا">ليبيا</option>
                            <option value="ليختنشتاين">ليختنشتاين</option>
                            <option value="ليتوانيا">ليتوانيا</option>
                            <option value="لوكسمبورغ">لوكسمبورغ</option>
                            <option value="مدغشقر">مدغشقر</option>
                            <option value="مالاوي">مالاوي</option>
                            <option value="ماليزيا">ماليزيا</option>
                            <option value="جزر المالديف">جزر المالديف</option>
                            <option value="مالي">مالي</option>
                            <option value="مالطا">مالطا</option>
                            <option value="جزر مارشال">جزر مارشال</option>
                            <option value="موريتانيا">موريتانيا</option>
                            <option value="موريشيوس">موريشيوس</option>
                            <option value="المكسيك">المكسيك</option>
                            <option value="مايكرونيزيا">مايكرونيزيا</option>
                            <option value="مولدوفا">مولدوفا</option>
                            <option value="موناكو">موناكو</option>
                            <option value="منغوليا">منغوليا</option>
                            <option value="الجبل الأسود">الجبل الأسود</option>
                            <option value="المغرب">المغرب</option>
                            <option value="موزمبيق">موزمبيق</option>
                            <option value="بورما">بورما</option>
                            <option value="ناميبيا">ناميبيا</option>
                            <option value="ناورو">ناورو</option>
                            <option value="نيبال">نيبال</option>
                            <option value="هولندا">هولندا</option>
                            <option value="نيوزيلندا">نيوزيلندا</option>
                            <option value="نيكاراجوا">نيكاراجوا</option>
                            <option value="النيجر">النيجر</option>
                            <option value="نيجيريا">نيجيريا</option>
                            <option value="كوريا الشمالية ">كوريا الشمالية </option>
                            <option value="النرويج">النرويج</option>
                            <option value="سلطنة عمان">سلطنة عمان</option>
                            <option value="باكستان">باكستان</option>
                            <option value="بالاو">بالاو</option>
                            <option value="بنما">بنما</option>
                            <option value="بابوا غينيا الجديدة">بابوا غينيا الجديدة</option>
                            <option value="باراغواي">باراغواي</option>
                            <option value="بيرو">بيرو</option>
                            <option value="الفلبين">الفلبين</option>
                            <option value="بولندا">بولندا</option>
                            <option value="البرتغال">البرتغال</option>
                            <option value="قطر">قطر</option>
                            <option value="جمهورية الكونغو">جمهورية الكونغو</option>
                            <option value="جمهورية مقدونيا">جمهورية مقدونيا</option>
                            <option value="رومانيا">رومانيا</option>
                            <option value="روسيا">روسيا</option>
                            <option value="رواندا">رواندا</option>
                            <option value="سانت كيتس ونيفيس">سانت كيتس ونيفيس</option>
                            <option value="سانت لوسيا">سانت لوسيا</option>
                            <option value="سانت فنسينت والجرينادينز">سانت فنسينت والجرينادينز</option>
                            <option value="ساموا">ساموا</option>
                            <option value="سان مارينو">سان مارينو</option>
                            <option value="ساو تومي وبرينسيب">ساو تومي وبرينسيب</option>
                            <option value="السعودية">السعودية</option>
                            <option value="السنغال">السنغال</option>
                            <option value="صربيا">صربيا</option>
                            <option value="سيشيل">سيشيل</option>
                            <option value="سيراليون">سيراليون</option>
                            <option value="سنغافورة">سنغافورة</option>
                            <option value="سلوفاكيا">سلوفاكيا</option>
                            <option value="سلوفينيا">سلوفينيا</option>
                            <option value="جزر سليمان">جزر سليمان</option>
                            <option value="الصومال">الصومال</option>
                            <option value="جنوب أفريقيا">جنوب أفريقيا</option>
                            <option value="كوريا الجنوبية">كوريا الجنوبية</option>
                            <option value="جنوب السودان">جنوب السودان</option>
                            <option value="إسبانيا">إسبانيا</option>
                            <option value="سريلانكا">سريلانكا</option>
                            <option value="السودان">السودان</option>
                            <option value="سورينام">سورينام</option>
                            <option value="سوازيلاند">سوازيلاند</option>
                            <option value="السويد">السويد</option>
                            <option value="سويسرا">سويسرا</option>
                            <option value="سوريا" selected>سوريا</option>
                            <option value="طاجيكستان">طاجيكستان</option>
                            <option value="تنزانيا">تنزانيا</option>
                            <option value="تايلاند">تايلاند</option>
                            <option value="توغو">توغو</option>
                            <option value="تونجا">تونجا</option>
                            <option value="ترينيداد وتوباغو">ترينيداد وتوباغو</option>
                            <option value="تونس">تونس</option>
                            <option value="تركيا">تركيا</option>
                            <option value="تركمانستان">تركمانستان</option>
                            <option value="توفالو">توفالو</option>
                            <option value="أوغندا">أوغندا</option>
                            <option value="أوكرانيا">أوكرانيا</option>
                            <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>
                            <option value="المملكة المتحدة">المملكة المتحدة</option>
                            <option value="الولايات المتحدة">الولايات المتحدة</option>
                            <option value="أوروغواي">أوروغواي</option>
                            <option value="أوزبكستان">أوزبكستان</option>
                            <option value="فانواتو">فانواتو</option>
                            <option value="فنزويلا">فنزويلا</option>
                            <option value="فيتنام">فيتنام</option>
                            <option value="اليمن">اليمن</option>
                            <option value="زامبيا">زامبيا</option>
                            <option value="زيمبابوي">زيمبابوي</option>
                        
                        </select>

                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> المحافظة</label>
                            <input type="text" class="form-control-input" id="text" name="city" value="{{ $user[0]->city }}" required>
                            <label class="label-control" for="lname"></label>
                        </div>
                        <select style="text-align:right;width:370px;color: #2f3d4a;" class="form-select" aria-label="Default select example" name="graduated">
                            <option selected id="one" > الحالة </option>
                            <option value="0" @if($user[0]->graduated == "0" ) selected @endif>طالب</option>
                            <option value="1" @if($user[0]->graduated == "1" ) selected @endif>خريج</option>
                            
                        </select><br>
                        <select style="text-align:right;width:370px;color: #2f3d4a;
                        " class="form-select"
                            aria-label="Default select example" name="learning_type">
                            <option selected id="one" > نوع التعليم </option>
                            <option value="عام" @if($user[0]->learning_type == "عام" ) selected @endif>عام</option>
                            <option value="افتراضي" @if($user[0]->learning_type == "افتراضي" ) selected @endif>افتراضي</option>
                            <option value="خاص" @if($user[0]->learning_type == "خاص" ) selected @endif>خاص</option>
                            <option value="مفتوح" @if($user[0]->learning_type == "مفتوح" ) selected @endif>مفتوح</option>


                        </select><br>

                        <select style="text-align:right;width:370px;color: #2f3d4a;" class="form-select" aria-label="Default select example" name="university">
                            <option selected id="one" > الجامعة </option>
                            <option value="1">دمشق</option>
                            <option value="2">حلب</option>

                        </select><br>
                        


                        <select style="text-align: right;width:370px;color: #2f3d4a;" class="form-select" aria-label="Default select example" name="study_year">
                            <option selected id="one"> السنة </option>
                            <option value="1" @if($user[0]->study_year == "1" ) selected @endif>الاولى</option>
                            <option value="2" @if($user[0]->study_year == "2" ) selected @endif>الثانية</option>
                            <option value="3" @if($user[0]->study_year == "3" ) selected @endif>الثالثة</option>
                            <option value="4" @if($user[0]->study_year == "4" ) selected @endif>الرابعة</option>

                        </select>


<!--معلومات الخريج

                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> رقم المستخدم </label>
                            <input type="text" class="form-control-input" id="text" name="text" required readonly>
                            <label class="label-control" for="lname"></label>
                        </div>

                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> اسم المستخدم </label>
                            <input type="text" class="form-control-input" id="text" name="text" required>
                            <label class="label-control" for="lname"></label>
                        </div>

                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> البريد الإلكتروني </label>
                            <input type="text" class="form-control-input" id="text" name="text" >
                            <label class="label-control" for="lname"></label>
                        </div>
                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> تاريخ الميلاد  </label>
                            <input type="date" class="form-control-input" id="text" name="text" required>
                            <label class="label-control" for="lname"></label>
                        </div>

                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> رقم الموبايل </label>
                            <input type="text" class="form-control-input" id="text" name="text" required>
                            <label class="label-control" for="lname"></label>
                        </div>
                        <div class="form-group" style="display: inline-block">

                            <label id="l1"> المحافظة</label>
                            <input type="text" class="form-control-input" id="text" name="text" required>
                            <label class="label-control" for="lname"></label>
                        </div>
                       


                        <select style="text-align:right;width:370px;color: #2f3d4a;
                        " class="form-select"
                            aria-label="Default select example">
                            <option selected id="one" > الحالة </option>
                            <option value="1">طالب</option>
                            <option value="2">خريج</option>
                            


                        </select><br>
                        <select style="text-align: right;width:370px;color: #2f3d4a;
                        " class="form-select"
                            aria-label="Default select example">
                            <option selected id="one"> البلد </option>
                            <option value="أفغانستان">أفغانستان</option>
                            <option value="ألبانيا">ألبانيا</option>
                            <option value="الجزائر">الجزائر</option>
                            <option value="أندورا">أندورا</option>
                            <option value="أنغولا">أنغولا</option>
                            <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                            <option value="الأرجنتين">الأرجنتين</option>
                            <option value="أرمينيا">أرمينيا</option>
                            <option value="أستراليا">أستراليا</option>
                            <option value="النمسا">النمسا</option>
                            <option value="أذربيجان">أذربيجان</option>
                            <option value="البهاما">البهاما</option>
                            <option value="البحرين">البحرين</option>
                            <option value="بنغلاديش">بنغلاديش</option>
                            <option value="باربادوس">باربادوس</option>
                            <option value="بيلاروسيا">بيلاروسيا</option>
                            <option value="بلجيكا">بلجيكا</option>
                            <option value="بليز">بليز</option>
                            <option value="بنين">بنين</option>
                            <option value="بوتان">بوتان</option>
                            <option value="بوليفيا">بوليفيا</option>
                            <option value="البوسنة والهرسك ">البوسنة والهرسك </option>
                            <option value="بوتسوانا">بوتسوانا</option>
                            <option value="البرازيل">البرازيل</option>
                            <option value="بروناي">بروناي</option>
                            <option value="بلغاريا">بلغاريا</option>
                            <option value="بوركينا فاسو ">بوركينا فاسو </option>
                            <option value="بوروندي">بوروندي</option>
                            <option value="كمبوديا">كمبوديا</option>
                            <option value="الكاميرون">الكاميرون</option>
                            <option value="كندا">كندا</option>
                            <option value="الرأس الأخضر">الرأس الأخضر</option>
                            <option value="جمهورية أفريقيا الوسطى ">جمهورية أفريقيا الوسطى </option>
                            <option value="تشاد">تشاد</option>
                            <option value="تشيلي">تشيلي</option>
                            <option value="الصين">الصين</option>
                            <option value="كولومبيا">كولومبيا</option>
                            <option value="جزر القمر">جزر القمر</option>
                            <option value="كوستاريكا">كوستاريكا</option>
                            <option value="ساحل العاج">ساحل العاج</option>
                            <option value="كرواتيا">كرواتيا</option>
                            <option value="كوبا">كوبا</option>
                            <option value="قبرص">قبرص</option>
                            <option value="التشيك">التشيك</option>
                            <option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option>
                            <option value="الدنمارك">الدنمارك</option>
                            <option value="جيبوتي">جيبوتي</option>
                            <option value="دومينيكا">دومينيكا</option>
                            <option value="جمهورية الدومينيكان">جمهورية الدومينيكان</option>
                            <option value="تيمور الشرقية ">تيمور الشرقية </option>
                            <option value="الإكوادور">الإكوادور</option>
                            <option value="مصر">مصر</option>
                            <option value="السلفادور">السلفادور</option>
                            <option value="غينيا الاستوائية">غينيا الاستوائية</option>
                            <option value="إريتريا">إريتريا</option>
                            <option value="إستونيا">إستونيا</option>
                            <option value="إثيوبيا">إثيوبيا</option>
                            <option value="فيجي">فيجي</option>
                            <option value="فنلندا">فنلندا</option>
                            <option value="فرنسا">فرنسا</option>
                            <option value="الغابون">الغابون</option>
                            <option value="غامبيا">غامبيا</option>
                            <option value="جورجيا">جورجيا</option>
                            <option value="ألمانيا">ألمانيا</option>
                            <option value="غانا">غانا</option>
                            <option value="اليونان">اليونان</option>
                            <option value="جرينادا">جرينادا</option>
                            <option value="غواتيمالا">غواتيمالا</option>
                            <option value="غينيا">غينيا</option>
                            <option value="غينيا بيساو">غينيا بيساو</option>
                            <option value="غويانا">غويانا</option>
                            <option value="هايتي">هايتي</option>
                            <option value="هندوراس">هندوراس</option>
                            <option value="المجر">المجر</option>
                            <option value="آيسلندا">آيسلندا</option>
                            <option value="الهند">الهند</option>
                            <option value="إندونيسيا">إندونيسيا</option>
                            <option value="إيران">إيران</option>
                            <option value="العراق">العراق</option>
                            <option value="جمهورية أيرلندا ">جمهورية أيرلندا </option>
                            <option value="فلسطين">فلسطين</option>
                            <option value="إيطاليا">إيطاليا</option>
                            <option value="جامايكا">جامايكا</option>
                            <option value="اليابان">اليابان</option>
                            <option value="الأردن">الأردن</option>
                            <option value="كازاخستان">كازاخستان</option>
                            <option value="كينيا">كينيا</option>
                            <option value="كيريباتي">كيريباتي</option>
                            <option value="الكويت">الكويت</option>
                            <option value="قرغيزستان">قرغيزستان</option>
                            <option value="لاوس">لاوس</option>
                            <option value="لاوس">لاوس</option>
                            <option value="لاتفيا">لاتفيا</option>
                            <option value="لبنان">لبنان</option>
                            <option value="ليسوتو">ليسوتو</option>
                            <option value="ليبيريا">ليبيريا</option>
                            <option value="ليبيا">ليبيا</option>
                            <option value="ليختنشتاين">ليختنشتاين</option>
                            <option value="ليتوانيا">ليتوانيا</option>
                            <option value="لوكسمبورغ">لوكسمبورغ</option>
                            <option value="مدغشقر">مدغشقر</option>
                            <option value="مالاوي">مالاوي</option>
                            <option value="ماليزيا">ماليزيا</option>
                            <option value="جزر المالديف">جزر المالديف</option>
                            <option value="مالي">مالي</option>
                            <option value="مالطا">مالطا</option>
                            <option value="جزر مارشال">جزر مارشال</option>
                            <option value="موريتانيا">موريتانيا</option>
                            <option value="موريشيوس">موريشيوس</option>
                            <option value="المكسيك">المكسيك</option>
                            <option value="مايكرونيزيا">مايكرونيزيا</option>
                            <option value="مولدوفا">مولدوفا</option>
                            <option value="موناكو">موناكو</option>
                            <option value="منغوليا">منغوليا</option>
                            <option value="الجبل الأسود">الجبل الأسود</option>
                            <option value="المغرب">المغرب</option>
                            <option value="موزمبيق">موزمبيق</option>
                            <option value="بورما">بورما</option>
                            <option value="ناميبيا">ناميبيا</option>
                            <option value="ناورو">ناورو</option>
                            <option value="نيبال">نيبال</option>
                            <option value="هولندا">هولندا</option>
                            <option value="نيوزيلندا">نيوزيلندا</option>
                            <option value="نيكاراجوا">نيكاراجوا</option>
                            <option value="النيجر">النيجر</option>
                            <option value="نيجيريا">نيجيريا</option>
                            <option value="كوريا الشمالية ">كوريا الشمالية </option>
                            <option value="النرويج">النرويج</option>
                            <option value="سلطنة عمان">سلطنة عمان</option>
                            <option value="باكستان">باكستان</option>
                            <option value="بالاو">بالاو</option>
                            <option value="بنما">بنما</option>
                            <option value="بابوا غينيا الجديدة">بابوا غينيا الجديدة</option>
                            <option value="باراغواي">باراغواي</option>
                            <option value="بيرو">بيرو</option>
                            <option value="الفلبين">الفلبين</option>
                            <option value="بولندا">بولندا</option>
                            <option value="البرتغال">البرتغال</option>
                            <option value="قطر">قطر</option>
                            <option value="جمهورية الكونغو">جمهورية الكونغو</option>
                            <option value="جمهورية مقدونيا">جمهورية مقدونيا</option>
                            <option value="رومانيا">رومانيا</option>
                            <option value="روسيا">روسيا</option>
                            <option value="رواندا">رواندا</option>
                            <option value="سانت كيتس ونيفيس">سانت كيتس ونيفيس</option>
                            <option value="سانت لوسيا">سانت لوسيا</option>
                            <option value="سانت فنسينت والجرينادينز">سانت فنسينت والجرينادينز</option>
                            <option value="ساموا">ساموا</option>
                            <option value="سان مارينو">سان مارينو</option>
                            <option value="ساو تومي وبرينسيب">ساو تومي وبرينسيب</option>
                            <option value="السعودية">السعودية</option>
                            <option value="السنغال">السنغال</option>
                            <option value="صربيا">صربيا</option>
                            <option value="سيشيل">سيشيل</option>
                            <option value="سيراليون">سيراليون</option>
                            <option value="سنغافورة">سنغافورة</option>
                            <option value="سلوفاكيا">سلوفاكيا</option>
                            <option value="سلوفينيا">سلوفينيا</option>
                            <option value="جزر سليمان">جزر سليمان</option>
                            <option value="الصومال">الصومال</option>
                            <option value="جنوب أفريقيا">جنوب أفريقيا</option>
                            <option value="كوريا الجنوبية">كوريا الجنوبية</option>
                            <option value="جنوب السودان">جنوب السودان</option>
                            <option value="إسبانيا">إسبانيا</option>
                            <option value="سريلانكا">سريلانكا</option>
                            <option value="السودان">السودان</option>
                            <option value="سورينام">سورينام</option>
                            <option value="سوازيلاند">سوازيلاند</option>
                            <option value="السويد">السويد</option>
                            <option value="سويسرا">سويسرا</option>
                            <option value="سوريا" selected>سوريا</option>
                            <option value="طاجيكستان">طاجيكستان</option>
                            <option value="تنزانيا">تنزانيا</option>
                            <option value="تايلاند">تايلاند</option>
                            <option value="توغو">توغو</option>
                            <option value="تونجا">تونجا</option>
                            <option value="ترينيداد وتوباغو">ترينيداد وتوباغو</option>
                            <option value="تونس">تونس</option>
                            <option value="تركيا">تركيا</option>
                            <option value="تركمانستان">تركمانستان</option>
                            <option value="توفالو">توفالو</option>
                            <option value="أوغندا">أوغندا</option>
                            <option value="أوكرانيا">أوكرانيا</option>
                            <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>
                            <option value="المملكة المتحدة">المملكة المتحدة</option>
                            <option value="الولايات المتحدة">الولايات المتحدة</option>
                            <option value="أوروغواي">أوروغواي</option>
                            <option value="أوزبكستان">أوزبكستان</option>
                            <option value="فانواتو">فانواتو</option>
                            <option value="فنزويلا">فنزويلا</option>
                            <option value="فيتنام">فيتنام</option>
                            <option value="اليمن">اليمن</option>
                            <option value="زامبيا">زامبيا</option>
                            <option value="زيمبابوي">زيمبابوي</option>
                        


                        </select>

                  <br>
                        
                        <select style="text-align: right;width:370px;color: #2f3d4a;"
class="form-select"
                            aria-label="Default select example">
                            <option selected id="one"> المهنة</option>
                            <option >محامي</option>
                            <option >قاضي</option>
                            <option>قطاع عام</option>
                            <option >غير ذلك</option>

                        </select>

                        -->
                        <div class="form-group" style="display: inline-block">


                            <button type="submit" class="form-control-submit-button" href="login-register.html" id="addB">تعديل
                            </button>
                        </div>

                        
                </form>

            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>