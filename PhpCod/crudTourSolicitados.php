<?php

session_start();
  $usuario = $_SESSION['username'];

  if (!isset($usuario)){
    header("location: ../LoginAdmin.html");
  } 

include "conexion.php";


      //la funcionalidad de este codigo es que cuando le de en el boton eliminar 
      //se borre el registro de la base de datos

      if(isset($_POST['update'])){
        $data = [];
        $id=$_POST['id'];
        if ($id){
            $sql="DELETE FROM solicitar_tour where cod_solicitud='$id'";
            $result=mysqli_query($conex,$sql);
            if($result){
                $data["ok"] = "";
            }else{
                $data["error"] = "";
            }
        }else{
            $data["sinId"] = "";
        }
        echo json_encode($data);   
    }

//en este codigo se hace la actualizacion de los registro cuando se le da en el boton guardar de en el modal
//estos datos son estraidos por medio de una peticion Ajax
    if(isset($_POST['foranea'])){
                $data = [];
                $Id=$_POST['id'];
                $nombree=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                $telefono=$_POST['tel'];
                $email=$_POST['email'];
                $cantidad=$_POST['cantidad'];
                $hora=$_POST['hora'];
                $fecha=$_POST['fecha'];
                if($Id){
                    $sql="UPDATE solicitar_tour SET nombre='$nombree', apellido='$apellido', 
                    telefono='$telefono', Email='$email', cantidad='$cantidad', hora_tour='$hora',
                    fecha_tour='$fecha' WHERE cod_solicitud='$Id' ";
                    $resultado=mysqli_query($conex,$sql);
        
                    if($resultado){
                        $data["ok"] = "";
                    }else{
                        $data["mal"] = "";   
                    }
                    echo json_encode($data);
                }
            }
?>