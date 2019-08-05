var auto=setInterval(function(){
    $.ajax({
       headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       },
       type:'GET',
       url:'start',
       success: function(data){
           if(data==='exam started' || data==='no exam scheduled to be started')
           {
               clearInterval(auto);
               end();
           }
           console.log(data);
       }

    });
    return false;
},10000);