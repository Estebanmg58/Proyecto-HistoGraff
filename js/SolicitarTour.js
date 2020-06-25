window.document.addEventListener('load', function () {

    $(document).ready(function () {
        var form = $("#form");

        form.onsubmit(function () {
            form.val();
            console.log(form);
        });

    });

})
