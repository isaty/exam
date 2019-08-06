//event listener wasn't functional in this script
function schedule() {
    var space = document.getElementById('work-space');
    space.style.display = "block";
    document.getElementById('hid').style.display = "none";
    document.getElementById('back').style.display = "block";

    $(document).ready(function () {

        $('form[name="schedule_form"]').on('submit', function () {
            hour=document.getElementById('hour').value;
            minutes=document.getElementById('minutes').value;
            var time_duration = hour*60*60*1000 + minutes*60*1000;
            var schedule = {
                exam:document.getElementById('exam_id').value ,
                time: document.getElementById('time').value,
                time_end: document.getElementById('time_end').value,
                duration: time_duration
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'schedule',
                type: 'POST',
                data: schedule,
                success: function (data) {
                    // do something with the data via front-end framework
                    // $('form[name="schedule_form"]').trigger('reset');
                    if(data.success)
                    {
                        space.style.display = "none";
                        $('.alert-danger').hide();
                        $('.alert-success').empty();
                   $('.alert-success').show();
                   $('.alert-success').append(' <p>'+data.success+'</p>')
                    }
                    else if(data.errors){
                        $('.alert-danger').empty();
                        $.each(data.errors, function(key,value){
                        $('.alert-danger').show();
                        $('.alert-danger').append(' <p>'+value+'</p>');});
                    }
                    
                },
                error: function (xhr, type, exception) {
                    // if ajax fails display error alert
                    alert("ajax error response type " + type);
                  }

            });

            return false;

        });
    });

}
function addQuestion() {
    document.getElementById('hid').style.display = "none";
    document.getElementById('workspace2').style.display = "block";
    document.getElementById('back').style.display = "block";
    $(document).ready(function () {

        $('form[name="add_questions"]').on('submit', function () {

            var addQuestion = {
                Exam_id:document.getElementById('exam').value,
                Question: document.getElementById('question').value,
                Option1: document.getElementById('option1').value,
                Option2: document.getElementById('option2').value,
                Option3: document.getElementById('option3').value,
                Option4: document.getElementById('option4').value,
                Answer: document.getElementById('answer').value
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'addQuestion',
                type: 'POST',
                data: addQuestion,
                success: function (data) {
                    // do something with the data via front-end framework
                    if(data.success)
                    {     $('.alert-danger').hide();
                          $('.alert-info').hide();
                         $('.alert-success').empty();
                    $('.alert-success').show();
                    $('.alert-success').append(' <p>'+data.success+'</p>');
                    $('form[name="add_questions"]').trigger('reset');}
                    else if(data.errors){
                        $('.alert-success').hide();
                        $('.alert-info').hide();
                        $('.alert-danger').empty();
                        $.each(data.errors, function(key,value){
                            $('.alert-danger').show();
                            $('.alert-danger').append('<p>'+value+'</p>');
                    });}
                    else if(data.info){
                     $('.alert-danger').hide();
                     $('.alert-success').hide();
                         $('.alert-info').empty();
                    $('.alert-info').show();
                    $('.alert-info').append(' <p>'+data.info+'</p>');}
                    
        
                },
                error: function (xhr, type, exception) {
                    // if ajax fails display error alert
                    alert("ajax error response type " + type);
                  }
            });

            return false;

        });
    });

}
function terminate() {
    var output = "";
    document.getElementById('hid').style.display = "none";
    document.getElementById('workspace3').style.display = "block";
    document.getElementById('back').style.display = "block";
    var request = { type: "terminate" };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'exams',
        type: 'POST',
        data: request,
        success: function (data) {
            // do something with the data via front-end framework

            if (data.errors)
            {$('.alert-danger').empty();
            $('.alert-danger').show();
            $('.alert-danger').append('<p>'+data.errors+'</p>');}
            else if(data.info){
                $('.alert-info').empty();
            $('.alert-info').show();
            $('.alert-info').append('<p>'+data.info+'</p>');
            }
            else {
                for (j in data) {
                    output = '<ul>' +
                        '<li>Exam_id: ' + data[j].exam_id + '</li>' +
                        '<li>Start Time:' + data[j].scheduled_time + '</li>' +
                        '<li>End Time: ' + data[j].termination_time + '</li>' +
                        '<li>Status: ' + data[j].status + '</li>' +
                        '</ul>' +
                        '<button id=' + data[j].exam_id + ' onclick=stop(this.id)>Terminate</button>';
                    document.getElementById('workspace3').innerHTML += output;
                }
            }
        },
        error: function (xhr, type, exception) {
            // if ajax fails display error alert
            alert("ajax error response type " + type);
          }
    });

    return false;

}
function stop(id) {
    // alert(id);
    var params = { Exam: id };

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'terminate',
        type: 'POST',
        data: params,
        success: function (data) {
            // do something with the data via front-end framework
            document.getElementById('workspace3').innerHTML = '';
            if(data.success){
                $('.alert-success').empty();
                    $('.alert-success').show();
                    $('.alert-success').append(' <p>'+data.success+'</p>');
            terminate();
        }
            else
            {
                {$('.alert-danger').empty();
                    $('.alert-danger').show();
                    $('.alert-danger').append('<p>'+data.errors+'</p>');}
            }
        },
        error: function (xhr, type, exception) {
            // if ajax fails display error alert
            alert("ajax error response type " + type);
          }
    });

    return false;
}

function show() {
    var output = "";
    document.getElementById('hid').style.display = "none";
    document.getElementById('workspace3').style.display = "block";
    document.getElementById('back').style.display = "block";
    var request = { type: "show" };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'exams',
        type: 'POST',
        data: request,
        success: function (data) {
            // do something with the data via front-end framework
            if (data.errors)
            {$('.alert-danger').empty();
            $('.alert-danger').show();
            $('.alert-danger').append('<p>'+data.errors+'</p>');}
            else if(data.info){
                $('.alert-info').empty();
            $('.alert-info').show();
            $('.alert-info').append('<p>'+data.info+'</p>');
            }
            else {
                for (j in data) {
                    output = '<ul>' +
                        '<li>Exam_id: ' + data[j].exam_id + '</li>' +
                        '<li>Start Time:' + data[j].scheduled_time + '</li>' +
                        '<li>End Time: ' + data[j].termination_time + '</li>' +
                        '<li>Status: ' + data[j].status + '</li>' +
                        '</ul>';
                    document.getElementById('workspace3').innerHTML += output;
                }
            }
        },
        error: function (xhr, type, exception) {
            // if ajax fails display error alert
            alert("ajax error response type " + type);
          }
    });

    return false;
}
function user() {
    var output = "";
    document.getElementById('hid').style.display = "none";
    document.getElementById('workspace3').style.display = "block";
    document.getElementById('back').style.display = "block";

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'users',
        type: 'GEt',
        success: function (data) {
            if (data.errors)
                {$('.alert-info').empty();
                    $('.alert-info').show();
                    $('.alert-info').append('<p>'+data.errors+'</p>');}
            else {
                for (j in data) {
                    output = '<ul>' +
                        '<li>Name: ' + data[j].name + '</li>' +
                        '<li>Email:' + data[j].email + '</li>' +
                        '</ul>';
                    document.getElementById('workspace3').innerHTML += output;
                }
            }
        },
        error: function (xhr, type, exception) {
            // if ajax fails display error alert
            alert("ajax error response type " + type);
          }
    });
    return false;
}
function search(){
    document.getElementById('hid').style.display = "none";
    document.getElementById('workspace4').style.display = "block";
    document.getElementById('back').style.display = "block";
    var button=$("#btn");
    button.text(button.data("text-swap"));
    $('#btn').on('click', function () {
     exam=document.getElementById('examid').value;
    if(exam)
    Question(exam);
    }
);
}

function Question(exam){
    var output = "";
    document.getElementById('hid').style.display = "none";
    document.getElementById('workspace3').style.display = "block";
    document.getElementById('workspace4').style.display = "none";
    document.getElementById('back').style.display = "block";
     var search={id:exam};
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'showadmin',
        type: 'POST',
        data: search,
        success: function (data) {
            if (data.errors){
            $('.alert-danger').empty();
            $.each(data.errors, function(key,value){
                $('.alert-danger').show();
                $('.alert-danger').append('<p>'+value+'</p>');});
            }
               else if (data.info)
                {   $('.alert-danger').hide();
                    $('.alert-info').empty();
                    $('.alert-info').show();
                    $('.alert-info').append('<p>'+data.info+'</p>');}
            else {
                for (j in data) {
                    output ='<ul>'+ 
                    '<li> Question : '+ data[j].question+'</li>'+
                    '<li>Option 1: '+ data[j].option1+'</li>'+
                    '<li>Option 2: '+ data[j].option2+'</li>'+
                    '<li>Option 3: '+ data[j].option3+'</li>'+
                    '<li>Option 4: '+ data[j].option4+'</li>'+
                    '<li>Answer : '+ data[j].answer+'</li>'+           
                    '</ul>'+
                    '<button id=' + data[j].id + ' onclick=edit(this.id)>Edit</button>';
                    document.getElementById('workspace3').innerHTML += output;
                }
            }
        },
        error: function (xhr, type, exception) {
            // if ajax fails display error alert
            alert("ajax error response type " + type);
          }
    });

} 
function edit(Qid){
    // var output = "";
    var button=$("#add");
    button.text(button.data("text-swap"));
    document.getElementById('hid').style.display = "none";
    document.getElementById('workspace3').innerHTML = "";
    document.getElementById('back').style.display = "block";
    document.getElementById('workspace2').style.display="block";
    
    $(document).ready(function () {

        $('form[name="add_questions"]').on('submit', function () {
                  var exam=document.getElementById('exam').value;
            var editQuestion = {id:Qid,
                Exam_id: exam,
                Question: document.getElementById('question').value,
                Option1: document.getElementById('option1').value,
                Option2: document.getElementById('option2').value,
                Option3:document.getElementById('option3').value,
                Option4:document.getElementById('option4').value,
                Answer: document.getElementById('answer').value
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'edit',
                type: 'POST',
                data: editQuestion,
                success: function (data) {
                    // do something with the data via front-end framework
                    if (data.errors){
                        $('.alert-danger').empty();
                        $.each(data.errors, function(key,value){
                            $('.alert-danger').show();
                            $('.alert-danger').append('<p>'+value+'</p>');});
                        }
                           else if (data.info)
                            {   $('.alert-danger').hide();
                                $('.alert-info').empty();
                                $('.alert-info').show();
                                $('.alert-info').append('<p>'+data.info+'</p>');}
                                else{ 
                                    $('.alert-danger').hide();
                                    $('.alert-success').empty();
                                    $('.alert-success').show();
                                    $('.alert-success').append('<p>'+data.success+'</p>');
                    document.getElementById('workspace2').style.display="none";
                    Question(exam); }
                },
                error: function (xhr, type, exception) {
                    // if ajax fails display error alert
                    alert("ajax error response type " + type);
                  }
            });

            return false;

        });
    });

}
function result(){
    document.getElementById('hid').style.display = "none";
    document.getElementById('workspace4').style.display = "block";
    document.getElementById('back').style.display = "block";
  
    $(document).ready(function () {

    $('#btn').on('click', function () {
     var exam = {Exam:document.getElementById('examid').value};
     $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'compile',
        type: 'POST',
        dataType: "json",
        data:exam,
        success: function (data) {
            // do something with the data via front-end framework
            if(data.errors){
                $('.alert-danger').empty();
            $.each(data.errors, function(key,value){
                $('.alert-danger').show();
                $('.alert-danger').append('<p>'+value+'</p>');
            });
        $('form[name="compile"]').trigger('reset');
    }
            else{
            $('form[name="compile"]').trigger('reset');
            for (j in data) {
                output = '<ul>' +
                    '<li>User: ' + data[j].user_id + '</li>' +
                    '<li>Exam:' + data[j].exam_id + '</li>' +
                    '<li>Result:' + data[j].result + '</li>'+
                    '</ul>';
                document.getElementById('workspace3').innerHTML += output;
            }
        }
            document.getElementById('workspace4').style.display = "none";
            
            
        },
        error: function (xhr, type, exception) {
            // if ajax fails display error alert
            alert("ajax error response type " + type);
          }
     });
    return false;  

});
});
}

