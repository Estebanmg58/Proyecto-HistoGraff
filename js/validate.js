
window.addEventListener('load',function(){
    //validaciones de formularios con plugin
    $(document).ready(function(){
        $.validate({
            lang: 'es',
            errorMessagePosition: 'top',
            scrollToTopOnError: true
        });
        //sacar calendario con plugin
        $("form input[name='fecha']").datepicker({
            dateFormat: 'yy-mm-dd'
        });
        //sacar hora con plugin
        $("#hour").timepicker({
    
        });
        
    });
    
    })

