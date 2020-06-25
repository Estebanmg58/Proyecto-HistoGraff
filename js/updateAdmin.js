
window.addEventListener('load', function(){

    $(document).ready(function(){
                    //actualiza de forma dinamica los datos 
                    $('#editarOne').on('submit', function(e){
                        e.preventDefault();
                        var exist= "";
                        var datos = new FormData(this);
                        datos.append('exist', exist);
                        $.ajax({
                            method: 'POST',
                            url: '../PhpCod/adminUpd.php',
                            dataType:'JSON',
                            data:datos,
                            contentType: false,
                            processData: false,
                            success: function(data){
                                if(data.ok != null){
                                    swal("Actualizado!", "correctamente!", "success");
                                    setTimeout(function(){
                                        var url = "/histograff/PhpCod/editAdmin.php";
                                        $(location).attr('href',url);
                                    },1000);
                                }
                                if(data.mal != null){
                                    alert("mal"); 
                                    swal("Error!", "no se pudo actualizar!", "error");                
                                }
                            },
                            error: function (err){
                                console.log(err);
                            }
                        })
                    })


            //muestra en el formulario los datos del admin
            $.ajax({
                method:'POST',
                url:'updateAdmin.php',
                success: function (response){
                    let json = JSON.parse(response)
                    json.forEach(json => {
                        $("#nombre").val(json.nombre)
                        $("#apellido").val(json.apellido)
                        $("#telefono").val(json.telefono)
                        $("#email").val(json.email)
                    })
                }
            })

            //actualizar clave
        $("#updateClave").on('submit', function(e){
            e.preventDefault();
            var update = "";
            var datos =new FormData(this);
            datos.append('update', update);
            $.ajax({
                method: 'POST',
                url: 'cambiarContraseña.php',
                dataType: 'JSON',
                data: datos,
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.ok != null){
                        swal("Contraseña actualizada!", "correctamente!", "success");
                        setTimeout(function(){
                            var url = "/histograff/PhpCod/editAdmin.php";
                            $(location).attr('href',url);
                        },1000);
                    }
                    if(data.mal != null){
                        swal("Error!", "no se pudo actualizar!", "error");              
                    }
                    if(data.confirm != null){
                        swal("Error!", "Las contraseñas no coinciden", "error");
                    }
                },
                error: function (err){
                    console.log(err);
                }
                
            })
        })
    })
})