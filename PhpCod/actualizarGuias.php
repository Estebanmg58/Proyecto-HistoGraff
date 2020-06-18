<?php

session_start();
  $usuario = $_SESSION['username'];

  if (!isset($usuario)){
    header("location: ../LoginAdmin.html");
  } else {

//codigo que muestra los registros de los guias en el modal para proceder
//a hacer la actualización
include "conexion.php";

$id2=$_POST['id'];
$query2="SELECT idGuia,NombreGuia,ApellidoGuia,Telefono,Email FROM guia WHERE idGuia='$id2'";
$array=array();
$result=mysqli_query($conex,$query2);

while( $row= $result -> fetch_assoc()) {

    $array[]=array(
        "id" => $row['idGuia'],
        "name" => $row['NombreGuia'],
        "apellido" => $row['ApellidoGuia'],
        "telefono" => $row['Telefono'],
        "email" => $row['Email'],
    );
}
$jsonString=json_encode($array);
echo $jsonString;

//cuando el administrador le da en el boton actualizar entonces se actualizan
//los datos con el siguiente codigo
if(isset($_POST['foranea'])){
    $data = [];
    $Id=$_POST['id'];
    $name=$_POST['name'];
    $apellido=$_POST['apellido'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];
    if($Id){
        $query="UPDATE guia SET  NombreGuia='$name', ApellidoGuia='$apellido',
        Telefono='$telefono',Email='$email' WHERE idGuia='$Id'";
        $result=mysqli_query($conex,$query);

        if($result){
            $data["ok"] = "";
        }else{
            $data["mal"] = "";
        }
        echo json_encode($data);
    }
}

  }

?>