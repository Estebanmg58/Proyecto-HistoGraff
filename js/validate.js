
window.addEventListener('load', function () {

    $(document).ready(function () {
        //validaciones de formularios con plugin
        $.validate({
            lang: 'es',
            errorMessagePosition: 'top',
            scrollToTopOnError: true
        });
        //sacar calendario con plugin
        $("form input[name='fecha']").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
        //sacar hora con plugin
        $("#hour").timepicker({

        });

    });

})

