<?php

session_start();
  $usuario = $_SESSION['username'];

  if (!isset($usuario)){
    header("location: ../LoginAdmin.html");
  } else {

include ('conexion.php');
    //En este codigo el administrador puede agregar registros 
    //y tambien hay una validacion por si los campos entas vacidos
    $name=$_POST['nombreGraffiti'];
    $desc=$_POST['descripcion'];
    $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    if($foto==null || $desc==null || $name==null){
        echo "<script>alert('Todos los campos son obligatorios para hacer un registro');
        window.history.go(-1);
        </script>";
        return false;
    }else{
    $query="INSERT INTO graffiti (codGraffiti,NombreGraffiti,DescripcionGraffiti,fotoGraffiti)VALUES('','$name','$desc','$foto')";
    $result=mysqli_query($conex,$query);
    echo "<script>alert('El grafiti ha sido ingresado con exito');
    window.history.go(-1);
    </script>";
    }
  }

?>