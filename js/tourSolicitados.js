window.addEventListener('load',function(){

    $(document).ready(function() {
        /*Boton para eliminar registros de la tabla de tour solicitados*/
        $('.btnBorrar').on('click',function(e){
        if(confirm('¿Esta seguro que desea eliminar el registro?')){
            var id = $(this).attr('id');
            var update = "";
            $.ajax({
                method: 'POST',
                url: '../PhpCod/crudTourSolicitados.php',
                dataType: 'JSON',
                data: {id:id,update:update},
                success: function (data) {
                    if(data.ok != null){
                        swal("Borrado!", "correctamente!", "success");
                        setTimeout(function(){
                            var url = "/histograff/PhpCod/tourSolicitados.php";
                            $(location).attr('href',url);
                        },1000);
                    }
                    if(data.error != null){
                    
                        swal("Error!", "no se pudo eliminar!", "error");
                    }
                },
                error:function(err){
                    console.log(err);
                }
            })
        }
        });

/*Boton para editan registros de la tabla de tour solicitados*/ 
$('#editar').on('submit', function (e) {
e.preventDefault();
var foranea = "";
var datos = new FormData(this);
var id = $('#id').val();
datos.append('foranea', foranea);
datos.append('id', id);
$.ajax({
    method: 'POST',
    url: '../PhpCod/crudTourSolicitados.php',
    dataType: 'JSON',
    data: datos,
    contentType: false,
    processData: false,
    success: function (data) {
        if(data.ok != null){
      
            swal("Actualizado!", "correctamente!", "success");
            setTimeout(function(){
                var url = "/histograff/PhpCod/tourSolicitados.php";
                $(location).attr('href',url);
            },1000);
        }
        if(data.mal != null){
            alert("mal"); 
            swal("Error!", "no se pudo actualizar!", "error");
        }
      
    },
    error: function (err) {
        console.log(err);
    }
})
})
})
        //Mostrar el tour solicitado en el modal para asi ser actualizado
    $(".editar").click(function () {
        let id = $(this).data('id')
    
        $.ajax({
            data: { id },
            type: "POST",
            url: "mostrarRegModal.php",
            success: function (response) {
                let json = JSON.parse(response)
                json.forEach(json => {
                    $("#id").val(json.id)
                    $("#nombre").val(json.nombre)
                    $("#apellido").val(json.apellido)
                    $("#tel").val(json.tel)
                    $("#email").val(json.email)
                    $("#cantidad").val(json.cantidad)
                    $("#hora").val(json.hora)
                    $("#fecha").val(json.fecha)
                })
            }
        })
    })   
    
})


