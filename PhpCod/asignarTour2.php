<?php

session_start();
  $usuario = $_SESSION['username'];

include "conexion.php";
$id=$_REQUEST['idGuia'];
$query = "UPDATE guia SET estado=0 WHERE idGuia='$id' ";
$result=mysqli_query($conex,$query);
header("location:tourSolicitados.php");
?>