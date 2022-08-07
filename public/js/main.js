var correct = 2;
var wrong = 2;

let _token = $('meta[name="csrf-token"]').attr('content');


$('.addCorrect').on('click', function(){

    $('.correctAnswers').append('<input type="text" class="form-control-input mt-2 mb-2 addedCorrect" name="correctAnswer_' + correct + '" id="correct_' + correct + '" placeholder="جواب صحيح" autocomplete="off">');

    correct += 1;

    if(correct == 3)
    {
        $('.minusCorrect').removeClass('d-none');
    }

});

$('.addWrong').on('click', function(){

    $('.wrongAnswers').append('<input type="text" class="form-control-input mt-2 mb-2 addedWrong" name="wrongAnswer_' + wrong + '" id="wrong_' + wrong + '" placeholder="جواب خطأ" autocomplete="off">');

    wrong += 1;

    if(wrong == 3)
    {
        $('.minusWrong').removeClass('d-none');
    }
});



$('.minusCorrect').on('click', function(){

    const current = '#correct_' + (correct-1);
    $(current).remove();

    correct -= 1;

    if(correct == 2)
    {
        $('.minusCorrect').addClass('d-none');
    }

});


$('.minusWrong').on('click', function(){

    const current = '#wrong_' + (wrong-1);
    $(current).remove();

    wrong -= 1;

    if(wrong == 2)
    {
        $('.minusWrong').addClass('d-none');
    }

});





$('#learning_type').on('change', function(){

    var learning_type = $('#learning_type').val();

    let form = new FormData();

    form.append('learning_type', learning_type);
    form.append('_token', _token);

    $.ajax({
        type: 'POST',
        url: '/Request/university',
        data: form,
        processData: false,
        contentType: false,
        success: function(data){
            console.log(data);
            

            for(var row in data.university)
            {
                $('#university').append('<option value="'+ data.university[row].id +'" class="universityOption"> '+ data.university[row].name +' </option>');
            }
        },
        error: function(error){
            console.log(error);
        }
    });

    $('#year').val('');
    $('.universityOption').remove();
    $('.subjectOption').remove();
    $('.chapterOption').remove();
    $('.subChapterOption').remove();
    $('#semester').val('');
    $('#type').val('');

});


$('#university').on('change', function(){

    $('#year').val('');
    $('.subjectOption').remove();
    $('.chapterOption').remove();
    $('.subChapterOption').remove();
    $('#semester').val('');
    $('#type').val('');

})


$('#year').on('change', function(){
    if($('#university').val() == '')
    {
        $('.errorMessage').html('pleas fill the university field');
    }
    else
    {
        let form = new FormData();

        form.append('_token', _token);
        form.append('university', $('#university').val());
        form.append('year', $('#year').val());

        $.ajax({
            type: 'POST',
            data: form,
            url: '/Request/subject',
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data);


                for(var row in data.subject)
                {
                    $('#subject').append('<option value="'+ data.subject[row].id +'" class="subjectOption"> '+ data.subject[row].name +' </option>');
                }

            },
            error: function(data){
                console.log(data);
            }
        })
    }

    
    $('.subjectOption').remove();
    $('.chapterOption').remove();
    $('.subChapterOption').remove();
    $('#semester').val('');
    $('#type').val('');
});


$('#subject').on('change', function(){
    if($('#year').val() == '')
    {
        $('.errorMessaeg').html('please fill the year field');
    }
    else
    {
        let form = new FormData();

        form.append('_token', _token);
        form.append('subject', $('#subject').val());

        $.ajax({
            type: 'POST',
            data: form,
            url: '/Request/chapter',
            contentType: false,
            processData: false,
            success: function(data){
                console.log(data);
                


                for(var row in data.chapter)
                {
                    $('#chapter').append('<option value="'+ data.chapter[row].id +'" class="chapterOption"> '+ data.chapter[row].name +' </option>');
                }

            }
        });
        
    }


    $('.chapterOption').remove();
    $('.subChapterOption').remove();
    $('#type').val('');
});


$('#chapter').on('change', function(){
    if($('#subject').val() == '')
    {
        $('#errorMessage').html('please fill the subject field');
    }
    else
    {
        let form = new FormData();

        form.append('_token', _token);
        form.append('chapter', $('#chapter').val());

        $.ajax({
            type: 'POST',
            data: form,
            url: '/Request/subChapter',
            contentType: false,
            processData: false,
            success: function(data){
                console.log(data);

                for(var row in data.subChapter)
                {
                    $('#sub_chapter').append('<option value="'+ data.subChapter[row].id +'" class="subChapterOption"> '+ data.subChapter[row].name +' </option>');
                }
            }
        })

    }

    $('.subChapterOptoin').remove();

})




$('.submitForm').on('click', function(){



    // if($('input[name=year_time]').val() == '')
    // {
    //     $('.errorMessage').html('Please fill year_time field');
    // }

    if($('#learning_type').val() == '')
    {
        $('.errorMessage').html('Please fill learning_type field');
    }

    else if($('#university').val() == '')
    {
        $('.errorMessage').html('Please fill university field');
    }
    
    else if($('#year').val() == '')
    {
        $('.errorMessage').html('Please fill year field');
    }
    
    else if($('#subject').val() == '')
    {
        $('.errorMessage').html('Please fill subject field');
    }
    
    else if($('#type').val() == '')
    {
        $('.errorMessage').html('Please fill type field');
    }

    else if($('#title').val() == '')
    {
        $('.errorMessage').html('Please fill title field');
    }

    else if($('#correct_1').val() == '')
    {
        $('.errorMessage').html('Please fill first correct answer field');
    }

    else if($('#wrong_1').val() == '')
    {
        $('.errorMessage').html('Please fill first wrong answer field');
    }
    
  
    else
    {   

        let form = new FormData();

        if($('#library').val() != '')
        {
            form.append('library', $('#library').val());
        }
        
        if($('#year_time').val() != '')
        {
            form.append('year_time', $('#year_time').val());
        }

        form.append('_token', _token);
        form.append('title', $('#title').val());
        form.append('year', $('#year').val());
        form.append('subject', $('#subject').val());
        form.append('university', $('#university').val());
        form.append('type', $('#type').val());
        form.append('learning_type', $('#learning_type').val());

        var correctAdded = 0;

        if($('#correct_1').val() != "")
        {
            form.append('correctArr[]', $('#correct_1').val());

            correctAdded = 1;
        }

        for(var i = 2; i < correct; i++)
        {
            if($('#correct_' + i).val() != '')
            {
                correctAdded += 1;
                form.append('correctArr[]', $('#correct_' + i).val());

            }
        }

        form.append('correctNum', correctAdded);
        
    

        var wrongAdded = 0;
        // var wrongArr = [];

        if($('#wrong_1').val() != "")
        {
            form.append('wrongArr[]', $('#wrong_1').val());
            

            wrongAdded = 1;
        }


        for(var i = 2; i < wrong; i++)
        {
            if($('#wrong_' + i).val() != '')
            {
                wrongAdded += 1;
                
                form.append('wrongArr[]', $('#wrong_' + i).val());
                
            }
        }
        
        form.append('wrongNum', wrongAdded);
        

        if($(this).attr('id') == 'submitBtnAdd')
        {

            
            
            $.ajax({
                url: 'tryAjax',
                type: 'POST',
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $("#submitBtnAdd").css("pointer-events","none");
                    $('#submitBtnAdd').html('');
                    $('#submitBtnAdd').html('<span class="lds-dual-ring"></span>');
                },
                success: function(response){
                    
                    // console.log(response);

                    // window.location = '/allQuestion';
                    $("#submitBtnAdd").css("pointer-events","auto");


                    $('#submitBtnAdd').html('إضافة');


                    $('#title').val('');

                    $('#correct_1').val('');
                    $('#wrong_1').val('');
                    $('.addedCorrect').val('');
                    $('.addedWrong').val('');

                    Swal.fire({
                        icon: 'success',
                        title: 'تم إضافة السؤال بنجاح',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    
                },
                error: function(error){
                    
                    $('.errorMessage').html(error.responseJSON.errors);
                    console.log(error);
                }
                
            });
        }
        else if($(this).attr('id') == 'edit')
        {
            form.append('id', $('#question_id').val());

            $.ajax({
                url: '/tryAjax/edit',
                type: 'POST',
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    window.location = "/allQuestion";
                },
                error: function(error){
                    alert('error happend');
                    console.log(error);
                }
            })
        }
    }
    
});




$('.questionFilter').on('change', function(){

    var form = new FormData();

    form.append('_token', _token);


    if($('.questionBySubject').val() == '' && $('.questionByLearning').val() == '' && $('.questionByType').val() == '')
    {
        $.ajax({
            type: 'POST',
            data: form,
            url: '/Request/questionBySubject',
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){


                $('.table1').html(
                    '<tr class="tr1">'
                        +'<th class="th1" class="w3-center">التفاصيل </th>'
                        +'<th  class="th1"style="width:300px" class="w3-center">السنة</th>'
                        +'<th  class="th1"style="width:300px" class="w3-center">نوع التعليم</th>'
                        +'<th  class="th1" style="width:300px"class="w3-center">الجامعة</th>'
                        +'<th class="th1"style="width:600px" class="w3-center" >المادة</th>'
                        +'<th class="th1"style="width:900px" class="w3-center">نص السؤال </th>'
                        +'<th class="th1"  class="w3-center">رقم السؤال </th>'
                    +'</tr>'
                );

                var i = 1;

                for(var question in data.questions)
                {
                    $('.table1').append('<tr >'
                            +'<td class="td1" class="w3-center "> <a href="/detailQuestion/' + data.questions[question].id +'" style="text-decoration: none;text-align:center">   <i  class="fa fa-search" style="font-size: 25px;"></i> </a> </td>'
                            +'<td  class="td1" class="w3-center ">  ' + data.questions[question].year +' </td>'
                            +'<td  class="td1" class="w3-center "> ' + data.questions[question].learning_type +' </td>'
                            +'<td  class="td1" class="w3-center "> ' + data.questions[question].university +' </td>'
                            +'<td  class="td1" class="w3-center "> ' + data.questions[question].subject +' </td>'
                            +'<td   class="td1" class="w3-center "> ' + data.questions[question].title +' </td>'
                            +'<td   class="td1" class="w3-center "> ' + i +' </td>'
                        +'</tr>'
                    );

                    i++;
                }

                
                console.log(data);
                
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    else
    {

        if($('.questionBySubject').val() != '')
        {
            form.append('subject', $('.questionBySubject').val());
        }
        if($('.questionByLearning').val() != '')
        {
            form.append('learning_type', $('.questionByLearning').val());
        }
        if($('.questionByType').val() != '')
        {
            form.append('type', $('.questionByType').val());
        }

        $.ajax({
            type: 'POST',
            data: form,
            url: '/Request/questionBySubject',
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){

                $('.table1').html(
                    '<tr class="tr1">'
                        +'<th class="th1" class="w3-center">التفاصيل </th>'
                        +'<th  class="th1"style="width:300px" class="w3-center">السنة</th>'
                        +'<th  class="th1"style="width:300px" class="w3-center">نوع التعليم</th>'
                        +'<th  class="th1" style="width:300px"class="w3-center">الجامعة</th>'
                        +'<th class="th1"style="width:600px" class="w3-center" >المادة</th>'
                        +'<th class="th1"style="width:900px" class="w3-center">نص السؤال </th>'
                        +'<th class="th1"  class="w3-center">رقم السؤال </th>'
                    +'</tr>'
                );

                var i = 1;

                for(var question in data.questions)
                {
                    $('.table1').append('<tr >'
                            +'<td class="td1" class="w3-center "> <a href="/detailQuestion/' + data.questions[question].id +'" style="text-decoration: none;text-align:center">   <i  class="fa fa-search" style="font-size: 25px;"></i> </a> </td>'
                            +'<td  class="td1" class="w3-center ">  ' + data.questions[question].year +' </td>'
                            +'<td  class="td1" class="w3-center "> ' + data.questions[question].learning_type +' </td>'
                            +'<td  class="td1" class="w3-center "> ' + data.questions[question].university +' </td>'
                            +'<td  class="td1" class="w3-center "> ' + data.questions[question].subject +' </td>'
                            +'<td   class="td1" class="w3-center "> ' + data.questions[question].title +' </td>'
                            +'<td   class="td1" class="w3-center "> ' + i +' </td>'
                        +'</tr>'
                    );

                    i++;
                }



                console.log(data);
            },
            error: function(error){
                console.log(error);
            }
        });

    }



});





$('.filteringUser').on('change', function(){

    var role = $('#userFilter').val();

    var form = new FormData();

    form.append('_token', _token);
    

    if(role == 'all')
    {
        $('#countryFilter').removeClass('d-none');
        $('#yearFilter').addClass('d-none');
        $('#yearFilter').val('');
        $('#universityFilter').addClass('d-none');
        $('#universityFilter').val('');
        $('#learning_typeFilter').addClass('d-none');
        $('#learning_typeFilter').val('');
    }
    else if(role == 'student')
    {
        $('#countryFilter').removeClass('d-none');
        $('#yearFilter').removeClass('d-none');
        $('#universityFilter').removeClass('d-none');
        $('#learning_typeFilter').removeClass('d-none');
    }
    else if(role == 'graduated')
    {
        $('#countryFilter').removeClass('d-none');
        $('#yearFilter').addClass('d-none');
        $('#yearFilter').val('');
        $('#universityFilter').addClass('d-none');
        $('#universityFilter').val('');
        $('#learning_typeFilter').addClass('d-none');
        $('#learning_typeFilter').val('');
    }
    else
    {
        $('#countryFilter').addClass('d-none');
        $('#countryFilter').val('');
        $('#yearFilter').addClass('d-none');
        $('#yearFilter').val('');
        $('#universityFilter').addClass('d-none');
        $('#universityFilter').val('');
        $('#learning_typeFilter').addClass('d-none');
        $('#learning_typeFilter').val('');
    }

    form.append('user', $('#userFilter').val());

    if($('#countryFilter').val() != '')
    {
        form.append('country', $('#countryFilter').val());
    }
    
    if($('#yearFilter').val() != '')
    {
        form.append('year', $('#yearFilter').val());
    }
    
    if($('#universityFilter').val() != '')
    {
        form.append('university', $('#universityFilter').val());
    }
    
    if($('#learning_typeFilter').val() != '')
    {
        form.append('learning_type', $('#learning_typeFilter').val());
    }

    $.ajax({
        type: 'POST',
        url: '/userFilter',
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
            console.log('pleas wait...');
        },
        success: function(data){

            if(role == 'all')
            {
                $('.table-users').html(
                    '<tr class="tr1">'
                        +'<th class="th1" class="w3-center">حذف </th>'
                        +'<th class="th1" class="w3-center">تعديل</th>'
                        +'<th class="th-users" class="w3-center">الحالة </th>'
                        +'<th class="th-users" class="w3-center">رقم الموبايل</th>'
                        +'<th class="th-users" class="w3-center">المحافظة</th>'
                        +'<th class="th-users" class="w3-center">البلد</th>'
                        +'<th class="th-users" class="w3-center">البريد الإلكتروني</th>'
                        +'<th class="th-users" class="w3-center">اسم المستخدم</th>'
                        +'<th class="th-users"  >رقم المستخدم</th>'
                    +'</tr>'
                );

                
                var i = 1;
                for(var user in data.users)
                {
                    var userRole = 'طالب';
                    if(data.users[user].graduated == true )
                    {
                        userRole = 'خريج';
                    }
                    
                    

                    $('.table-users').append(
                        '<tr>'
                            +'<td class="td1" class="w3-center "> <a href="/delete-user/' + data.users[user].id + '" style="text-decoration: none;text-align:center">   <i  class="fa fa-trash-o" style="font-size: 25px;"></i> </a> </td>'
                            +'<td class="td1" class="w3-center "> <a href="/edit-user/' +  data.users[user].id + '" style="text-decoration: none;text-align:center">   <i  class="fa fa-edit" style="font-size: 25px;"></i> </a> </td>'
                            +'<td class="td-users"> ' + userRole + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].phone + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].city + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].country + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].email + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].first_name + ' ' + data.users[user].last_name + ' </td>'
                            +'<td class="td-users"> ' + i + ' </td>'
                        +'</tr>'
                    )

                    i++;
                }
            }
            
            if(role == 'student')
            {
                $('.table-users').html(
                    '<tr class="tr1">'
                        +'<th class="th1" class="w3-center">حذف </th>'
                        +'<th class="th1" class="w3-center">تعديل</th>'
                        +'<th class="th-users" class="w3-center">الحالة </th>'
                        +'<th class="th-users" class="w3-center">رقم الموبايل</th>'
                        +'<th class="th-users" class="w3-center">المحافظة</th>'
                        +'<th class="th-users" class="w3-center">البلد</th>'
                        +'<th class="th-users" class="w3-center">السنة </th>'
                        +'<th class="th-users" class="w3-center">الجامعة</th>'
                        +'<th class="th-users" class="w3-center">نوع التعليم</th>'
                        +'<th class="th-users" class="w3-center">البريد الإلكتروني</th>'
                        +'<th class="th-users" class="w3-center">اسم المستخدم</th>'
                        +'<th class="th-users"  >رقم المستخدم</th>'
                    +'</tr>'
                );

                var i = 1;

                var university_name = 'بدون';

                for(var user in data.users)
                {
                    for(var uni in data.university)
                    {
                        if(data.users[user].university_id == data.university[uni].id)
                        {
                            university_name = data.university[uni].name;
                        }
                    }

                    $('.table-users').append(
                        '<tr>'
                            +'<td class="td1" class="w3-center "> <a href="/delete-user/' + data.users[user].id + '" style="text-decoration: none;text-align:center">   <i  class="fa fa-trash-o" style="font-size: 25px;"></i> </a> </td>'
                            +'<td class="td1" class="w3-center "> <a href="/edit-user/' +  data.users[user].id + '" style="text-decoration: none;text-align:center">   <i  class="fa fa-edit" style="font-size: 25px;"></i> </a> </td>'
                            +'<td class="td-users">طالب </td>'
                            +'<td class="td-users"> ' + data.users[user].phone + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].city + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].country + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].study_year + ' </td>'
                            +'<td class="td-users"> ' + university_name + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].learning_type + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].email + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].first_name + ' ' + data.users[user].last_name + ' </td>'
                            +'<td class="td-users"> ' + i + ' </td>'
                        +'</tr>'
                    )

                    i++;
                }
            }
            else if(role == 'graduated')
            {
                $('.table-users').html(
                    '<tr class="tr1">'
                        +'<th class="th1" class="w3-center">حذف </th>'
                        +'<th class="th1" class="w3-center">تعديل</th>'
                        +'<th class="th-users" class="w3-center">الحالة </th>'
                        +'<th class="th-users" class="w3-center">رقم الموبايل</th>'
                        +'<th class="th-users" class="w3-center">المحافظة</th>'
                        +'<th class="th-users" class="w3-center">البلد</th>'
                        +'<th class="th-users" class="w3-center">البريد الإلكتروني</th>'
                        +'<th class="th-users" class="w3-center">اسم المستخدم</th>'
                        +'<th class="th-users"  >رقم المستخدم</th>'
                    +'</tr>'
                );

                var i = 1;

                for(var user in data.users)
                {
                    $('.table-users').append(
                        '<tr>'
                            +'<td class="td1" class="w3-center "> <a href="/delete-user/' + data.users[user].id + '" style="text-decoration: none;text-align:center">   <i  class="fa fa-trash-o" style="font-size: 25px;"></i> </a> </td>'
                            +'<td class="td1" class="w3-center "> <a href="/edit-user/' +  data.users[user].id + '" style="text-decoration: none;text-align:center">   <i  class="fa fa-edit" style="font-size: 25px;"></i> </a> </td>'
                            +'<td class="td-users"> خريج </td>'
                            +'<td class="td-users"> ' + data.users[user].phone + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].city + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].country + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].email + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].first_name + ' ' + data.users[user].last_name + ' </td>'
                            +'<td class="td-users"> ' + i + ' </td>'
                        +'</tr>'
                    )

                    i++;
                }
            }


            else if(role == 'admin')
            {
                $('.table-users').html(
                    '<tr class="tr1">'
                        +'<th class="th1" class="w3-center">حذف </th>'
                        +'<th class="th1" class="w3-center">تعديل</th>'
                        +'<th class="th-users" class="w3-center">الحالة </th>'
                        +'<th class="th-users" class="w3-center">البريد الإلكتروني</th>'
                        +'<th class="th-users" class="w3-center">اسم المستخدم</th>'
                        +'<th class="th-users"  >رقم المستخدم</th>'
                    +'</tr>'
                );

                var i = 1;
                for(var user in data.users)
                {
                    $('.table-users').append(
                        '<tr>'
                            +'<td class="td1" class="w3-center "> <a href="/delete-user/' + data.users[user].id + '" style="text-decoration: none;text-align:center">   <i  class="fa fa-trash-o" style="font-size: 25px;"></i> </a> </td>'
                            +'<td class="td1" class="w3-center "> <a href="/edit-user/' +  data.users[user].id + '" style="text-decoration: none;text-align:center">   <i  class="fa fa-edit" style="font-size: 25px;"></i> </a> </td>'
                            +'<td class="td-users"> ادمن </td>'
                            +'<td class="td-users"> ' + data.users[user].email + ' </td>'
                            +'<td class="td-users"> ' + data.users[user].first_name + ' ' + data.users[user].last_name + ' </td>'
                            +'<td class="td-users"> ' + i + ' </td>'
                        +'</tr>'
                    );

                    i++;
                }

            }

        },
        error: function(error){
            console.log(error);
        }
    })

})