<?php

session_start();
  $usuario = $_SESSION['username'];

  if (!isset($usuario)){
    header("location: ../LoginAdmin.html");
  } 

include "conexion.php";
$id = $_POST['id'];
$sql="SELECT codGraffiti,NombreGraffiti,DescripcionGraffiti FROM graffiti WHERE codGraffiti='$id'";
$result=mysqli_query($conex,$sql);
$array=array();

while( $row = $result -> fetch_assoc()) {
    
    $array[]=array(
        "codGraffiti" => $row['codGraffiti'],
        "NombreGraffiti" => $row['NombreGraffiti'],
        "DescripcionGraffiti"=> $row['DescripcionGraffiti'],
    );  
}

$jsonSting=json_encode($array);
echo $jsonSting;

?>