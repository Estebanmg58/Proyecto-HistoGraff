
<?php

session_start();
  $usuario = $_SESSION['username'];

  if (!isset($usuario)){
    header("location: ../LoginAdmin.html");
  } 

// este se encarga de mostrar los elementos en el modal para proceder a la actualizacion
//de  los datos
            include "conexion.php";
            $id = $_POST['id'];
            $sql="SELECT cod_solicitud,nombre,apellido,telefono,Email,cantidad,hora_tour
            ,fecha_tour  FROM solicitar_tour WHERE cod_solicitud='$id'";
                 $resul=mysqli_query($conex,$sql);
                 $array = array();
                 while ($row=$resul -> fetch_assoc()) {
           
                   $array[] = array(
                       "id" => $row['cod_solicitud'],
                       "nombre" => $row['nombre'],
                       "apellido" => $row['apellido'],
                       "tel" => $row['telefono'],
                       "email" => $row['Email'],
                       "cantidad" => $row['cantidad'],
                       "hora" => $row['hora_tour'],
                       "fecha" => $row['fecha_tour'],
                   );
                 }
                 $jsonSting = json_encode($array);
                 echo $jsonSting;

 ?>