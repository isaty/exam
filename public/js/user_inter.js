var j = 0
var question = "";
var time_left = 0;
var searchid = "";
var radio_id = [];
var no_id = [];
var q_id=[];

function search() {
  var space = document.getElementById('workspace');
  space.style.display = "block";
  searchid = { Exam: document.getElementById('search').value };
  if (document.getElementById('search').value) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: 'search',
      type: 'POST',
      data: searchid,
      success: function (data) {

         if(data.errors ){
          console.log(data);
          $('.alert-danger').empty();
            $.each(data.errors, function(key,value){
                $('.alert-danger').show();
                $('.alert-danger').append('<p>'+value+'</p>');});
      }

        else if (data[0].status === 'scheduled') {
          arr = data[0].scheduled_time.split(':');
          // space.innerHTML = searchid.Exam + ' is scheduled and will start soon in';
          $('.alert-danger').hide();
          $('.alert-info').empty();
          $('.alert-info').show();
          $('.alert-info').append('<p>' +searchid.Exam + ' is scheduled and will starts in<p>');
          //  //schedule time minus scheduled time in millisecond
          time = parseInt(arr[0]) * 60 * 60 * 1000 + parseInt(arr[1]) * 60 * 1000;
          var countDown = setInterval(function () {
            $('.alert-info').empty();
            //current time in millisecond
            now = new Date().getHours() * 60 * 60 * 1000 + new Date().getMinutes() * 60 * 1000 + new Date().getSeconds() * 1000;
            //current time minus scheduled time in millisecond
            diff = time - now;
            var hour = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minute = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            var second = Math.floor((diff % (1000 * 60)) / 1000);

            var time_s = hour + "h "
              + minute + "m " + second + "s";
            if (diff < 0) {
              document.getElementById("workspace").innerHTML = " ";
              clearInterval(countDown);
              collect();
            }if(hour!=-1)
            $('.alert-info').append('<p>' +searchid.Exam + ' is scheduled and will starts in<p>'+time_s);
            
          }, 1000);

        }
        else if (data[0].status === 'running') {
          collect();
        }
        else if (data[0].status === 'Terminated' || data[0].status === 'finished') {
          $('.alert-danger').empty();
          $('.alert-info').empty();
          $('.alert-info').show();
          $('.alert-info').append('<p> The Exam was Finished<p>');
        }
        
      },
      error: function (xhr, type, exception) {
        // if ajax fails display error alert
        alert("ajax error response type " + type);
      }
    });
    return false;
  }
  $('.alert-danger').empty();
                $('.alert-danger').show();
                $('.alert-danger').append('<p> Enter the Exam Id</p>');
}

//collect complete
function collect() {
  $('.alert-info').hide();
        $('.alert-danger').hide();
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: 'show',
    type: 'POST',
    data: searchid,
    success: function (data) {
      question = data;
      if (data.errors) {
        $('.alert-info').empty();
        $('.alert-danger').hide();
        $('.alert-danger').empty();
        $.each(data.errors, function(key,value){
            $('.alert-info').show();
            $('.alert-info').append('<p>'+value+'</p>');});
      }
      else{$('.alert-info').hide();
        $('.alert-danger').hide();
        for (i in question) {
          document.getElementById('response').innerHTML += '<button id=' + i + ' class=q_btn onclick=display(this.id)>' + (++i) + '</button>';
          q_id[i-1]=question[i-1].id;
        }
        document.getElementById('info').style.display = "none";
        document.getElementById('response_block').style.display = "block";
        document.getElementById('time_block').style.display = "block";
        timer();
        responsecheck();
        display(0);
        // console.log(question[0].id);
      }
    },
    error: function (xhr, type, exception) {
      // if ajax fails display error alert
      alert("Question collection failed " + type);
    }
  });

}

function display(j) {
  if (j < 0)
    j = 0;
  else if (j > question.length)
    j = question.length - 1;
  document.getElementById('workspace').innerHTML = question[j].question + '<br>' +
    '<input type="radio" id="opt1" name="opt" value=1 >' + question[j].option1 + '<br>' +
    '<input type="radio" id="opt2" name="opt" value=2>' + question[j].option2 + '<br>' +
    '<input type="radio" id="opt3" name="opt" value=3>' + question[j].option3 + '<br>' +
    '<input type="radio" id="opt4" name="opt" value=4>' + question[j].option4 + '<br>' +
    '<button type="submit" id=save onclick=save()>Save</button>' +
    ' <button   id=next onclick=next() >next</button>' +
    '<button id=prev onclick=prev()>previous</button>' +
    '<button id=clear onclick=clea()>Submit</button>';
  for (i in radio_id) {
    if (no_id[i] == j) {
      id = radio_id[i];
      document.getElementById(id).checked = true;
    }
  }
}
function next() {
  j++;
  if (j >= question.length)
    j = question.length - 1;

  display(j);
}
function prev() {
  j--;
  if (j < 0)
    j = 0;
  display(j);
}


function save() {
  // time_left=to be send in millisecond
  var answer = document.querySelector('input[name="opt"]:checked').value;
  var response = {
    remaining: time_left,
    feed: answer,
    Exam: searchid.Exam,
    id: q_id[j]
  };
  if (answer) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: 'save',
      type: 'POST',
      data: response,
      success: function (data) {
        if (data.errors) {
          console.log(data);
        } else if(data.redirect) {
          console.log(data);
          clea();
        }
        else{
          document.getElementById(j).style.background = 'green';
          radio_id.push("opt" + answer);
          no_id.push(j);
          next();
        }
      },
      error: function (xhr, type, exception) {
        // if ajax fails display error alert
        alert("ajax error response type " + type);
      }
    });
  }
  else{
  $('.alert-danger').empty();
                $('.alert-danger').show();
                $('.alert-danger').append('<p> Enter the Exam Id</p>');}
}

function responsecheck() {
  document.getElementById('response_block').style.display = "block";
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: 'check',
    type: 'POST',
    data: searchid,
    success: function (data) {
                if(!data.errors && !data.info){
          for (i in data) {
          no_id[i] = data[i].question_id - 1;
          radio_id[i] = "opt" + data[i].response;
          console.log(no_id[i]);
          document.getElementById(no_id[i]).style.background = "green";
          
          if (j === no_id[i])
            document.getElementById(radio_id[i]).checked = true;
        }
      
      }
    },
    error: function (xhr, type, exception) {
      // if ajax fails display error alert
      alert("ajax failed to collect responses " + type);
    }
  });
}
function timer() {
  document.getElementById('time_block').style.display = "block";
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: 'duration',
    type: 'POST',
    data: searchid,
    success: function (data) {
       if(data.errors){
         $('.alert-danger').empty();
                $('.alert-danger').show();
                $('.alert-danger').append('<p>'+ data.errors+'</p>');
       }
      else
      {time_left = data;
      var countdown = setInterval(function () {
        time_left = time_left - 1000;
        var hour = Math.floor((time_left % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minute = Math.floor((time_left % (1000 * 60 * 60)) / (1000 * 60));
        var second = Math.floor((time_left % (1000 * 60)) / 1000);

        document.getElementById("time_alert").innerHTML = hour + "h "
          + minute + "m " + second + "s";

        if (time_left < 0) {
          document.getElementById("time_alert").innerHTML = "TIME OUT!!";
          clearInterval(countdown);
          clea();
        }
      }, 1000);}

    },
    error: function (xhr, type, exception) {
      // if ajax fails display error alert
      alert("ajax failed to collect timer data " + type);
    }

  });
  return false;
}

function clea() {
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: 'timeout',
    type: 'POST',
    data: searchid,
    success: function (data) {
      // document.getElementById('wrokspace').innerHTML=data;
      if(data.errors)
      {
                 $('.alert-danger').empty();
                $('.alert-danger').show();
                $('.alert-danger').append('<p>'+ data.errors+'</p>');
      }
    else
      window.location = "/thankyou";
    },
    error: function (xhr, type, exception) {
      // if ajax fails display error alert
      alert("could not redirect " + type);
    }
  });
}