<?php
    
      include ('conexion.php');
      
      $clave=$_POST['clave'];
      $clave1=$_POST['clave1'];
        //verifica si los datos ingresaros del administrador no estan vacidos para proceder a hacer
        //la respectiva actualizacón
     if($clave == $clave1 && $clave != null && $clave1 != null){
         
         $query="UPDATE administrador SET Clave = '$clave' WHERE idAdministrador=1192904074";
         $result=mysqli_query($conex,$query);
         echo"<script>alert('Contraseña actualizada correctamente');
         window.location.href='../LoginAdmin.html';
         </script>";

     } elseif ($clave !== $clave1) {
        echo "<script>alert('Las contraseñas no coinciden');
        window.history.go(-1);</script>";
     }

 ?>