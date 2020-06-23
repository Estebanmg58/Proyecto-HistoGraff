window.addEventListener('load', function () {
    $(document).ready(function () {
        //validacion del actualizar datos del administrador
        $.validate({
            modules: 'security',
            lang: 'es',
            errorMessagePosition: 'top',
            scrollToTopOnError: true,
        });

        //mostrar modal para actualizar contraseña
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
          });
    })
})
