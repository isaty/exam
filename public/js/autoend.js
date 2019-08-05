function end()
{
var end=setInterval(function(){
    $.ajax({
       headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       },
       type:'GET',
       url:'end',
       success: function(data){
           if(data==='exam finished' || data==='no exam scheduled to be terminated')
           {
               clearInterval(end);
           }
           console.log(data);
       }

    });
    return false;
},10000);
}