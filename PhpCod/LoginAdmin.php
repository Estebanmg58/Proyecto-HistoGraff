<?php

include ("conexion.php");
session_start();

    $usuario=$_POST["usuario"];
    $contraseña=$_POST["contraseña"];

    $sql = "SELECT * FROM administrador WHERE Usuario = '$usuario' AND Clave = '$contraseña' ";
    $query=mysqli_query($conex,$sql);
    $registro = mysqli_num_rows($query);
    
    if ($registro > 0 ) {
        $_SESSION['username'] = $usuario;
        header("Location: Administrador.php");
    }
    else{
        echo "
        <script>
        alert('Usuario y/o contraseña incorrectos');
        window.history.go(-1);
        </script>";
    }
    
    mysqli_free_result($query);
    mysqli_close($conex);
    
   
?>
