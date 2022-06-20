<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Edit Question</title>

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
          <a href="/dashboard">
          <i class="fa fa-dashboard" aria-hidden="true"></i>
لوحة التحكم         </a>
        <a href="chart.html">
          <i class="fa fa-pie-chart icons" aria-hidden="true"></i>
          الاحصائيات
                </a>
        <a href="/allQuestion">
          <i class="fa fa-list" aria-hidden="true"></i>
          الأسئلة        </a>
        <a href="request.html">
          <i class="fa fa-envelope-open" aria-hidden="true"></i>
          طلبات الاشتراك        </a>
        <a href="users.html">
          <i class="fa fa-group" aria-hidden="true"></i>
          المستخدمين        </a>
        <a href="profile.html">
            <i class="fa fa-address-card" aria-hidden="true"></i>
            الملف الشخصي          </a>
          <a href="privilege.html">
            <i class="fa fa-cubes" aria-hidden="true"></i>
            الصلاحيات          </a>
           <a href="pages.html">
            <i class="fa fa-clone" aria-hidden="true"></i>
            الصفحات          </a>
            <a href="company.html">
                <i class="fa fa-building" aria-hidden="true"></i>
                الشركات
              </a>
          <a href="advertisement.html">
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
            <p> Admin </p>
        
        </div>
    </div>

        <div class="containerpage" >

            <h2 style="margin-top:5%;color: #2f3d4a;"> تفاصيل السؤال</h2><br>

            <!-- <form method="post" action=""> -->

            @csrf
                
                <table id="t1"  class="w3-table-all">
                    <tr id="t1-1">


                         <td id="t1-2">



                            <select style="text-align: right;width:200px;color: #2f3d4a;" id="learning_type" name="learning_type" class="form-select" aria-label="Default select example">
                                <option value="" selected id="one">نوع التعليم </option>
                                <option value="عام" @if($details[0]->learning_type == "عام") selected @endif>عام</option>
                                <option value="خاص" @if($details[0]->learning_type == "خاص") selected @endif>خاص</option>
                                <option value="مفتوح" @if($details[0]->learning_type == "مفتوح") selected @endif>مفتوح</option>
                                <option value="افتراضي" @if($details[0]->learning_type == "افتراضي") selected @endif>افتراضي</option>

                            </select>

                        </td>


                        <td id="t1-2">

                            <input type="number" style="text-align: right;width:200px; height: 40px;color: #2f3d4a;" id="year_time" name="year_time" placeholder="الدورة" value="{{ $details[0]->year_time }}" class="form-control-input">
                                


                            </select>

                        </td>
                        <td id="t1-2">



                            <input type="text" style="text-align: right;width:200px; height: 40px;color: #2f3d4a;" id="library" name="library" placeholder="المكتبة" value="{{ $details[0]->library }}" class="form-control-input">
                            

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

                                @foreach($subject as $row)

                                    <option value="{{$row->id}}" class="subjectOption" @if($row->id == $details[0]->subject_id) selected @endif> {{$row->name}} </option>
                                
                                @endforeach


                            </select>
                        </td>

                        
                        <td id="t1-2">



                            <select style="text-align: right;width:200px;color: #2f3d4a;" id="year" name="year" class="form-select" aria-label="Default select example">
                                <option value="" selected>السنة </option>
                                <option value="1" @if($details[0]->year == 1) selected @endif>الاولى </option>
                                <option value="2" @if($details[0]->year == 2) selected @endif>الثانية </option>
                                <option value="3" @if($details[0]->year == 3) selected @endif>الثالثة </option>
                                <option value="4" @if($details[0]->year == 4) selected @endif>الرابعة </option>

                            </select>
                        </td>
                        <td id="t1-2">
    
    
    
                            <select style="text-align: right;width:200px;color: #2f3d4a;" id="university" name="university" class="form-select" aria-label="Default select example">
                                <option value="" selected id="one">الجامعة </option>
                                
                                @foreach($university as $row)
                                
                                    <option value="{{ $row->id }}" class="universityOption" @if($row->id == $details[0]->university_id) selected @endif > {{ $row->name }} </option>

                                @endforeach
                                
                                
                            </select>
    
                        </td>
                        
                    </tr>

                    <tr id="t1-1">

                        
                        
                        <td id="t1-2">



                            <select style="text-align: right;width:200px;color: #2f3d4a;" class="form-select" id="type" name="type" aria-label="Default select example">
                                <option value="" selected>نمط الإجابة  </option>
                                <option value="الاجابة الصحيحة" @if($details[0]->type == "الاجابة الصحيحة") selected @endif>الاجابة الصحيحة</option>
                                <option value="الاجابة الخاطئة" @if($details[0]->type == "الاجابة الخاطئة") selected @endif>الاجابة الخاطئة</option>
                                <option value="الاجابة المختلفة" @if($details[0]->type == "الاجابة الخاطئة") selected @endif>الاجابة المختلفة</option>
                                <option value="الاجابة الأصح" @if($details[0]->type == "الاجابة الأصح") selected @endif>الاجابة الأصح</option>
                            </select>

                        </td>

                        <td id="t1-2">



                            <select style="text-align: right;width:200px;color: #2f3d4a;" id="sub_chapter" name="sub_chapter" class="form-select" aria-label="Default select example">
                                <option value="" selected> الفهرس - الباب </option>

                                @if($sub_chapters)
                                @foreach($sub_chapters as $row)
                                    
                                    <option value="{{$row->id}}" class="subChapterOption" @if($row->id == $details[0]->sub_chapter_id) selected @endif> {{$row->name}} </option>

                                @endforeach
                                @endif
                                
                            </select>

                        </td>
                        
                        
                        <td id="t1-2">



                            <select style="text-align: right;width:200px;color: #2f3d4a;" id="chapter" name="chapter" class="form-select" aria-label="Default select example">
                                <option value="" selected id="one"> الفهرس - الفصل </option>

                                @if($chapter)
                                @foreach($chapter as $row)

                                    <option value="{{$row->id}}" class="chapterOption" @if($row->id == $sub_chapter[0]->chapter_id) selected @endif> {{$row->name}} </option>

                                @endforeach
                                @endif

                            </select>

                        </td>

                    </tr>
                </table>
                <div class="form-group" style="display: none">

                    <label id="l1"> نص السؤال  </label>
                    <input type="text" class="form-control-input" id="question_id" name="question_id" value="{{ $details[0]->question_id }}" required>
                    <label class="label-control" for="lname"></label>
                </div><br>

                <div class="form-group" style="display: inline-block">

                    <label id="l1"> نص السؤال  </label>
                    <input type="text" class="form-control-input" id="title" name="title" value="{{ $details[0]->title }}" required>
                    <label class="label-control" for="lname"></label>
                </div><br>
                

                

                <div class="form-group correctAnswers" style="display: inline-block">
                        <label id="l1"> الأجوبة الصحيحة </label>
                        
                        @if(!empty($correct[0]))

                            @foreach($correct as $row)

                                <input type="text" class="form-control-input  mt-2 mb-2" name="correctAnswer_1" id="correct_{{$loop->index + 1}}" value="{{ $row->title }}" placeholder="جواب صحيح">
                                
                            @endforeach
                        
                        @else

                            <input type="text" class="form-control-input" name="correctAnswer_1" id="correct_1"  placeholder="جواب صحيح">

                        @endif

                            
                </div>

                <div class="form-group mt-0" style="display: inline-block">
                    
                    <label id="add" class="addCorrect"> + </label>
                    
                    <label id="add" class="minusCorrect d-none"> - </label>

                </div>

                <div class="form-group wrongAnswers" style="display: inline-block">
                        <label id="l1">الأجوبة الخاطئة </label>

                        @if(!empty($wrong[0]))

                            @foreach($wrong as $row)

                                <input type="text" class="form-control-input  mt-2 mb-2" name="wrongAnswer_1" id="wrong_{{ $loop->index + 1}}" value="{{ $row->title }}" placeholder="جواب خطأ">
                                
                            @endforeach
                        
                        @else

                            <input type="text" class="form-control-input" name="wrongAnswer_1" id="wrong_1" placeholder="جواب خطأ">

                        @endif
                        
                </div>

                <div class="form-group mt-0" style="display: inline-block">
                    
                    <label id="add" class="addWrong"> + </label>
                    
                    <label id="add" class="minusWrong d-none"> - </label>

                </div>

                <div class="errorMessage">

                </div>

                <br>
                <div class="form-group" style="display: inline-block">


                    <label class="form-control-submit-button submitForm" id="edit">تعديل</label>
                    <!-- </button> -->
                </div>
                <div class="form-message">
                    <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                </div>
            <!-- </form> -->

            

            <!-- <button class="makeAjax btn btn-success m-4" id="edit" >Ajax</button> -->

            
        </div>

    </center>
</div>


    </table>



    
<script src="{{ asset('js/jquery.min.js') }}"></script>


<script src="{{ asset('js/main.js') }}"></script>


<script>

    @if(count($correct) > 1);
        correct = 2 + {{count($correct)}} - 1;

        $('.minusCorrect').removeClass('d-none');

    @else
        correct = 2;
        
    @endif
    
    
    @if(count($wrong) > 1);
        wrong = 2 + {{count($wrong)}} - 1;

        $('.minusWrong').removeClass('d-none');

    @else
        wrong = 2;
        
    @endif
        
    console.log(correct);
    console.log(wrong);
</script>





</body>

</html>