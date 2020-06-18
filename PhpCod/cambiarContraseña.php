<?php

include "conexion.php";
    //cambio de contraseña
    if(isset($_POST['update'])){
        $claveActual = $_POST['claveActual'];
        $claveNueva = $_POST['claveNueva'];
        $confirmClave = $_POST['confirmNueva'];
        $query = "SELECT Clave FROM administrador";
        $resul= mysqli_query($conex, $query);
            if($resul = $claveActual) {
            if($claveNueva == $confirmClave && $claveNueva!=null && $confirmClave!=null){
                $update = "UPDATE administrador SET Clave='$claveNueva' WHERE idAdministrador=1001160255";
                $result = mysqli_query($conex,$update);
                if($result){
                    $data["ok"]= "";
                }
            }else {
                $data["confirm"]= "";
            }
        }else{
            $data["mal"] = "";
        }
        $jsonString = json_encode($data);
        echo $jsonString;
    }

?>