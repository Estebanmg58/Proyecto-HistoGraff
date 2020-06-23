<?php
  session_start();
  $usuario = $_SESSION['username'];

  if (!isset($usuario)){
    header("location: ../LoginAdmin.html");
  } 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <title>HistoGraff</title>
    <!--Iconono de HistoGraff-->
    <link rel="icon" type="img/png" href="../Imagenes/favicon.png">
    <!--sTILOS botstrap y mis estilos-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilosIndex.css">
    <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.min.css" />
		<link rel="stylesheet" href="../js/jquery-ui/jquery-ui.structure.min.css" />
    <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.theme.min.css" />
    
    <!--Mis scripts-->
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/validateAdmin.js"></script>
    <script type="text/javascript" src="../js/updateAdmin.js"></script>
    <!--Plugin de alertas-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
<body style="background-color: rgba(236, 233, 234, 1); padding: 50px">
<header>
                <nav class="navbar navbar-light bg-light fixed-top">
                        <!--Logo-->
                        <a class="navbar-brand " href="Administrador.php">
                        <img src="../Imagenes/HistoGraff.png" width="43" height="35" class="d-inline-block align-top" alt="">
                        HistoGraff
                        </a>    
                </nav>
        </header><br>
<center><h1>Editar registros Administrador</h1></center>
<!--Formulario de registro (Guias)-->
<form method="POST" id="editarOne">

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="nombre"   placeholder="ej : Evelio" value="">
    </div>
    <div class="form-group col-md-6">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" name="apellido" id="apellido"   placeholder="ej : Valencia" value="">
    </div>
  </div>

  <div class="form-group">
    <label for="telefono">telefono</label>
    <input type="number" class="form-control" name="telefono" id="telefono" data-validation="number" placeholder="ej : 3135324736" value="">
  </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" data-validation="email" placeholder="ej : pepito@gmail.com" value="">
    </div>

    <a href="#staticBackdrop" data-toggle="modal" data-target="#staticBackdrop" class="btn text-info">Cambiar contraseña</a>

  <center><button type="submit" class="btn btn-primary">Actualizar</button>
  <button type="reset" class="btn btn-info">Restablecer</button></center>
  <br><br>
</form>

<!--Modal para cambar la contraseña-->

<div  class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Datos del tour</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="updateClave" method="POST">
      <div class="modal-body">
      <div class="form-group">
        <label for="claveActual">Ingrese la clave actual</label>
        <input type="password" name="claveActual" class="form-control">
      </div><br>

      <div class="form-group">
        <label for="claveNueva">Ingresar nueva contraseña</label>
        <input type="password" name="claveNueva" class="form-control">
      </div>

      <div class="form-group">
        <label for="confirmNueva">Confirma la contraseña</label>
        <input type="password" name="confirmNueva" class="form-control">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
          </form>
          </div>
          </div>              
          </div> 

<!-- Plugin validacion -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</body>
</html>