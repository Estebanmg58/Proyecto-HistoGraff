<?php 

session_start();
  $usuario = $_SESSION['username'];

  if (!isset($usuario)){
    header("location: ../LoginAdmin.html");
  } 

include "conexion.php";
//En este codigo se refleja la eliminacion de los grafitis
            if(isset($_POST['eliminar'])){
                $data=[];
                $id=$_POST['id'];
                if($id){
                $sql="DELETE FROM graffiti WHERE codGraffiti='$id'";
                $resul=mysqli_query($conex,$sql);         
                }
                if($resul){
                    $data["ok"]="";
                }else{
                    $data["mal"]="";
                }
                echo json_encode($data);
            }

?>