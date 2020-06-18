window.addEventListener('load',function(){
      
 $(document).ready(function() {
    //Aqui es donde se hace el proceso para la actualizacion de los registros

    $('#editar').on('submit', function (e) {
        e.preventDefault();
        var foranea = "";
        var datos = new FormData(this);
        var id = $('#id').val();
        datos.append('foranea', foranea);
        datos.append('id', id);
        $.ajax({
            method: 'POST',
            url: '../PhpCod/actualizarGuias.php',
            dataType: 'JSON',
            data: datos,
            contentType: false,
            processData: false,
            success: function (data) {
                if(data.ok != null){
                    swal("Actualizado!", "correctamente!", "success");
                    setTimeout(function(){
                        var url = "/histograff/PhpCod/guias.php";
                        $(location).attr('href',url);
                    },1000);
                }
                if(data.mal != null){
                    alert("mal"); 
                    swal("Error!", "no se pudo actualizar!", "error");
                }
            },
            error: function (err) {
                swal("Actualizado!", "correctamente!", "success");
                setTimeout(function(){
                    var url = "/histograff/PhpCod/guias.php";
                    $(location).attr('href',url);
                },1000);
            }
        })
    })


 //Muestra los campos que sepueden actualizar en el modal
            $(".editar").click(function () {
                let id = $(this).data('id')

                $.ajax({
                    data:{ id },
                    type:'POST',
                    url:'actualizarGuias.php',
                    success: function (response) {
                        let json = JSON.parse(response)

                        json.forEach(json => {
                            $("#id").val(json.id)
                            $("#name").val(json.name)
                            $("#apellido").val(json.apellido)
                            $("#telefono").val(json.telefono)
                            $("#email").val(json.email)
                        })
                    }
        
                })
            })
        
        })
    })
