var correct = 2;
var wrong = 2;

let _token = $('meta[name="csrf-token"]').attr('content');


$('.addCorrect').on('click', function(){

    $('.correctAnswers').append('<input type="text" class="form-control-input mt-2 mb-2" name="correctAnswer_' + correct + '" id="correct_' + correct + '" placeholder="جواب صحيح">');

    correct += 1;

    if(correct == 3)
    {
        $('.minusCorrect').removeClass('d-none');
    }

});

$('.addWrong').on('click', function(){

    $('.wrongAnswers').append('<input type="text" class="form-control-input mt-2 mb-2" name="wrongAnswer_' + wrong + '" id="wrong_' + wrong + '" placeholder="جواب خطأ">');

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



    if($('input[name=year_time]').val() == '')
    {
        $('.errorMessage').html('Please fill year_time field');
    }

    else if($('#learning_type').val() == '')
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

    else if($('input[name=title]').val() == '')
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

        form.append('_token', _token);
        form.append('title', $('#title').val());
        form.append('year', $('#year').val());
        form.append('year_time', $('#year_time').val());
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
        

        if($(this).attr('id') == 'add')
        {

            
            
            $.ajax({
                url: 'tryAjax',
                type: 'POST',
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response){
                    
                    // console.log(response);

                    window.location = '/allQuestion';
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
                console.log(data);
            },
            error: function(error){
                console.log(error);
            }
        });

    }



})