$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

});

$(window).on('load',function(){
    if(document.getElementById('errorModal')) {
        $('#errorModal').modal('show');
        window.location.hash = '#register';
    }
    if(document.getElementById('successModal')) {
        $('#successModal').modal('show');
    }
});
