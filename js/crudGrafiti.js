window.addEventListener('load',function(){
    $(document).ready(function(){
        //cuando se le da en el biton eliminar se le aplica la eliminacion al grafiti
        $(".btnBorrar").click(function(){
            if(confirm("¿Estas seguro que deseas eliminar el grafiti?")){;
            let id=$(this).attr('id');
            let eliminar= "";
            $.ajax({
                method:'POST',
                url:'../PhpCod/eliminarGrafiti.php',
                dataType:'JSON',
                data:{id:id,eliminar:eliminar},
                success:function(data){
                    if(data.ok !=null){
                        swal("Eliminado","correctamente!","success");
                        setTimeout(function(){
                            var url='/HistoGraff/PhpCod/gestionarGraffiti.php';
                            $(location).attr('href', url);
                        },1000);
                    }
                    if(data.mal !=null){
                        swal("error!","no se pudo eliminar","error");
                    }
                },
                error:function(err){
                    console.log(err);
                }
            })
           }
        })
//Este codigo muestra en el modal la infomacion del graffiti para proceder a hacer su actualizacion
        $(".editar").click(function(){
            let id=$(this).data('id')
            $.ajax({
                data:{id},
                type:"POST",    
                url:"../PhpCod/mostrarRegGraff.php",
                success: function (response){
                    let json = JSON.parse(response)
                    
                    json.forEach(json => {
                        $("#ide").val(json.codGraffiti)
                        $("#nombreGraffitii").val(json.NombreGraffiti)
                        $("#descripcionn").val(json.DescripcionGraffiti)
                    })
                   
                }
            })
        })
//aqui el administrador despues de que haga las respectivas modificaciones y le da en el boton actualizar 
//le mostrara si se actualizo correctamente o no
$('#editarGraff').on('submit', function (e) {
    e.preventDefault();
    let foranea = "";
    let datos = new FormData(this);
    let id = $('#ide').val();
    datos.append('foranea', foranea);
    datos.append('id', id);
    $.ajax({
        method: 'POST',
        url: '../PhpCod/actualizarGrafiti.php',
        dataType: 'JSON',
        data: datos,
        contentType: false,
        processData: false,
        success: function (data) {
            if(data.ok != null){
          
                swal("Actualizado!", "correctamente!", "success");
                setTimeout(function(){
                    var url = "/histograff/PhpCod/gestionarGraffiti.php";
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
})
