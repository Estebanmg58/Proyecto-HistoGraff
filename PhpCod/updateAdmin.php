<?php

session_start();
  $usuario = $_SESSION['username'];

  if (!isset($usuario)){
    header("location: ../LoginAdmin.html");
  }

    //esta consulta lleva los datos al editAdmin.js para ser mostrados en el formulario  
    include "conexion.php";


    $query="SELECT NombreAdministrador,ApellidoAdministrador,
    telefonoAdministrador,email FROM administrador WHERE idAdministrador=1001160255";
    $result=mysqli_query($conex,$query);
    $array=array();
    while ($row=$result ->fetch_assoc()) {
        $array[]=array(
            "nombre" => $row['NombreAdministrador'],
            "apellido" =>$row['ApellidoAdministrador'],
            "telefono" => $row['telefonoAdministrador'],
            "email" => $row['email']
        );
    }   
    $jsonString = json_encode($array);
    echo $jsonString;


?>