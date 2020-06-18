window.addEventListener('load', function () {
    $(document).ready(function () {

        $.validate({
            modules: 'security',
            lang: 'es',
            errorMessagePosition: 'top',
            scrollToTopOnError: true,
        });


        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
          });
    })
})