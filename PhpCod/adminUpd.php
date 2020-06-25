<?php

session_start();
  $usuario = $_SESSION['username'];

  if (!isset($usuario)){
    header("location: ../LoginAdmin.html");
  } else {

    include "conexion.php";
    //esta consulta actualiza la informacion de el administrador
    if(isset($_POST['exist'])){
        $data = [];
        $nombre = $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $query2= "UPDATE administrador SET NombreAdministrador='$nombre', ApellidoAdministrador='$apellido',
        telefonoAdministrador='$telefono',email='$email' WHERE idAdministrador=1001160255";
        $result2=mysqli_query($conex,$query2);
        if($result2){
            $data["ok"] = "";
        }else{
            $data["mal"] = "";
        }
        echo json_encode($data);
    }

    
  }
?>