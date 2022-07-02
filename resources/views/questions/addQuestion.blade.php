<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Add Question</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>

<body >
 
    <div class="sidebarn">
        <div class="search">
            <input type="text" placeholder="...ابحث" name="search">
        </div>
          <a href="dashboard">
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

            <h2 style="margin-top:5%;color: #2f3d4a;"> تفاصيل السؤال</h2><br>

            <form method="post" action="/storeQuestion">

            @csrf
                
                <table id="t1"  class="w3-table-all">
                    <tr id="t1-1">

                        <td id="t1-2">



                            <select style="text-align: right;width:200px;color: #2f3d4a;" id="learning_type" name="learning_type" class="form-select" aria-label="Default select example">
                                <option value="" selected id="one">نوع التعليم </option>
                                <option value="عام">عام</option>
                                <option value="خاص">خاص</option>
                                <option value="مفتوح">مفتوح</option>
                                <option value="افتراضي">افتراضي</option>

                            </select>

                        </td>

                        <td id="t1-2">

                            <input type="number" style="text-align: right;width:200px; height: 40px;color: #2f3d4a;" id="year_time" name="year_time" placeholder="الدورة" class="form-control-input">
                                



                        </td>
                        <td id="t1-2">



                            <input type="text" style="text-align: right;width:200px; height: 40px;color: #2f3d4a;" id="library" placeholder="المكتبة" name="library" class="form-input">
                                

                        </td>
                        <h4 style="text-align:right;margin-right:80px;color:#100668"> 
                            @if(isset($error))
                                {{ $error }}
                            @endif
                        </h4>


                    </tr>
                    <tr id="t1-1">

                        <td id="t1-2">



                            <select style="text-align: right;width:200px;color: #2f3d4a;" id="subject" name="subject" class="form-select" aria-label="Default select example">
                                <option value="" selected id="">المادة </option>
                                


                            </select>
                        </td>

                        
                        <td id="t1-2">



                            <select style="text-align: right;width:200px;color: #2f3d4a;" id="year" name="year" class="form-select" aria-label="Default select example">
                                <option value="" selected id="one">السنة </option>
                                <option value="1">الاولى </option>
                                <option value="2">الثانية </option>
                                <option value="3">الثالثة </option>
                                <option value="4">الرابعة </option>

                            </select>
                        </td>
                        <td id="t1-2">
    
    
    
                            <select style="text-align: right;width:200px;color: #2f3d4a;" id="university" name="university" class="form-select" aria-label="Default select example">
                                <option value="" selected id="one">الجامعة </option>
                                
                                
                            </select>
    
                        </td>
                        
                    </tr>


                    
                    <tr id="t1-1">

                       
                        <td id="t1-2">



                            <select style="text-align: right;width:200px;color: #2f3d4a;" class="form-select" id="type" name="type" aria-label="Default select example">
                                <option value="" selected id="one">نمط الإجابة  </option>
                                <option value="الاجابة الصحيحة">الاجابة الصحيحة</option>
                                <option value="الاجابة الخاطئة">الاجابة الخاطئة</option>
                                <option value="الاجابة المختلفة">الاجابة المختلفة</option>
                                <option value="الاجابة الأصح">الاجابة الأصح</option>
                            </select>

                        </td>

                        <td id="t1-2">



                            <select style="text-align: right;width:200px;color: #2f3d4a;" id="sub_chapter" name="sub_chapter" class="form-select" aria-label="Default select example">
                                <option value="" selected> الفهرس - الباب </option>
                                
                            </select>

                        </td>

                        <td id="t1-2">



                            <select style="text-align: right;width:200px;color: #2f3d4a;" id="chapter" name="chapter" class="form-select" aria-label="Default select example">
                                <option value="" selected id="one"> الفهرس - الفصل </option>
                            </select>

                        </td>

                    </tr>
                </table>
                <div class="form-group" style="display: inline-block">

                    <label id="l1"> نص السؤال  </label>
                    <!-- <input type="text" class="form-control-input" id="title" name="title" required> -->

                    <textarea class="form-control-input" name="title" id="title" cols="30" rows="10" required></textarea>
                    <label class="label-control" for="lname"></label>
                </div><br>

                <!--  الإجابة الوحيدة 
                    <div class="form-group" style="display: inline-block">

                    <label id="l1"> الاجابة الصحيحة  </label>
                    <input type="text" class="form-control-input" id="text" name="text" required>
                    <label class="label-control" for="lname"></label>
                </div>
                <div class="form-group" style="display: inline-block">

                    <label id="l1"> الاجابة الخاطئة  </label>
                    <input type="text" class="form-control-input" id="text" name="text" required>
                    <label class="label-control" for="lname"></label>
                </div>
                <div class="form-group" style="display: inline-block">

                    <label id="l1"> الاجابة الخاطئة  </label>
                    <input type="text" class="form-control-input" id="text" name="text" required>
                    <label class="label-control" for="lname"></label>
                </div>
                <div class="form-group" style="display: inline-block">

                    <label id="l1"> الاجابة الخاطئة </label>
                    <input type="text" class="form-control-input" id="text" name="text" required>
                    <label class="label-control" for="lname"></label>
                </div> -->
                

                <div class="form-group correctAnswers" style="display: inline-block">
                        <label id="l1"> الأجوبة الصحيحة </label>
                        <input type="text" class="form-control-input" name="correctAnswer_1" id="correct_1" placeholder="جواب صحيح" autocomplete="off">
                            
                </div>

                <div class="form-group mt-0" style="display: inline-block">
                    
                    <label id="add" class="addCorrect"> + </label>
                    
                    <label id="add" class="minusCorrect d-none"> - </label>

                </div>

                <div class="form-group wrongAnswers" style="display: inline-block">
                        <label id="l1">الأجوبة الخاطئة </label>
                        <input type="text" class="form-control-input" name="wrongAnswer_1" id="wrong_1" placeholder="جواب خطأ" autocomplete="off">
                        <!-- <datalist id="browsers">
                            <option value="Edge">
                            <option value="Firefox">
                            <option value="Chrome">
                            <option value="Opera">
                            <option value="Safari">
                        </datalist> -->
                        <!-- <label id="add" class="addWrong"> + </label> -->
                </div>

                <div class="form-group mt-0" style="display: inline-block">
                    
                    <label id="add" class="addWrong"> + </label>
                    
                    <label id="add" class="minusWrong d-none"> - </label>

                </div>

                
                <div class="errorMessage">

                </div>

                <br>
                <div class="form-group" style="display: inline-block">


                    <label class="form-control-submit-button submitForm" id="submitBtnAdd"> إضافة   </label>
                    <!-- </button> -->
                </div>
                <div class="form-message">
                    <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                </div>
            </form>


            <!-- <button class="makeAjax btn btn-success m-4" id="add">Ajax</button> -->

            
        </div>

    </center>
</div>


    </table>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
    <script src="{{ asset('js/jquery.min.js') }}"></script>


    <script src="{{ asset('js/main.js') }}"></script>



</body>

</html>