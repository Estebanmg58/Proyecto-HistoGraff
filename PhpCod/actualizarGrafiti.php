<?php


  session_start();
  $usuario = $_SESSION['username'];

  if (!isset($usuario)){
    header("location: ../LoginAdmin.html");
  } else {
    


include "conexion.php";
//Acá se hace la actualizacion de los grafitis 
if(isset($_POST['foranea'])){
    $data=[];
    $id=$_POST['id'];
    $nombreGraffitii=$_POST['nombreGraffitii'];
    $descripcionn=$_POST['descripcionn'];
    if($id){
        $query="UPDATE graffiti SET NombreGraffiti='$nombreGraffitii',
         DescripcionGraffiti='$descripcionn' WHERE codGraffiti='$id'";
        $result=mysqli_query($conex,$query);
            if($result){
                $data["ok"]="";
            }else{
                $data["mal"]="";
            }
            echo json_encode($data);
    }
}

  }

?>