
window.addEventListener('load',function(){

    $(document).ready(function(){
        $.validate({
            lang: 'es',
            errorMessagePosition: 'top',
            scrollToTopOnError: true
        });
        $("form input[name='fecha']").datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $("#hour").timepicker({
    
        });
        
    });
    
    })

