
<?php 

include ("conexion.php");

//Codigo que agrega los registros de guias a la base datos-->
$id = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

$query = "INSERT INTO guia(idGuia, NombreGuia, ApellidoGuia, Telefono, Email, idAdministrador) 
VALUES ('$id','$nombre','$apellido','$telefono','$email','1001160255')";
$resultado = mysqli_query($conex, $query);

if (!$resultado){
    echo "<script> alert ('Error al ingresar registros en la base de datos');
    window.history.go(-1);
    </script>";
} else {
    echo "<script> alert ('Registro exitoso');
    window.history.go(-1);
    </script>";
    
}


?>