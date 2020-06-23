window.addEventListener('load',function(){


$(document).ready(function(){
    //peticion que viene desde guias.php para proceder  a hacer
    //la eliminación de los guias registrados

    $('.btnBorrar').on('click',function(e){
        if(confirm('¿ Esta seguro que desea eliminar el registro ?')){
            
                var id = $(this).attr('id');
                var update = "";
                $.ajax({
                    method: 'POST',
                    url: '../PhpCod/crudGuia.php',
                    dataType: 'JSON',
                    data: {id:id,update:update},
                    success: function (data) {
                        if(data.ok != null){
                            swal("Borrado!", "correctamente!", "success");
                            setTimeout(function(){
                                var url = "/HistoGraff/PhpCod/Guias.php";
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



})
})