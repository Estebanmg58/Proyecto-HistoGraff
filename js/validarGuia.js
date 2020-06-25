window.addEventListener('load', function(){


$(document).ready(function(){
    $.validate({
        lang: 'es',
        errorMessagePosition: 'top',
        scrollToTopOnError: true,
        modules : 'security'
    });
    
   $( "#datepicker" ).datepicker({

    });
    $('#hour').timepicker({

    });

    $(document).ready( function () {
        $('#myTable').DataTable();
    })

})
})
