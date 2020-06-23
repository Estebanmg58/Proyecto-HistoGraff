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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/validarGuia.js"></script>
</head>
<body style="background-color: rgba(236, 233, 234, 1); padding: 50px">
<header>
                <nav class="navbar navbar-light bg-light fixed-top">
                        <!--Logo-->
                        <a class="navbar-brand " href="Administrador.php">
                        <img src="../Imagenes/HistoGraff.png" width="43" height="35" class="d-inline-block align-top" alt="">
                        HistoGraff
                        </a>
                        <ul class="menu">
                        <!--Botones de navegacion-->
                        <a  href="Guias.php">Guias</a>
                        <a  href="gestionarGraffiti.php">Grafitis</a>
                        <a  href="tourSolicitados.php">Tour Solicitados</a>
                        <a  href="salirSesion.php">Cerrar sesión</a>
                    </ul>   
                </nav>
        </header><br><br><br><br><br>

<center><h1>Registrar Guias</h1></center><br>
<!--Formulario de registro (Guias)-->
<form method="POST" action="insertGuias.php">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" name="nombre"   placeholder="ej : Evelio">
    </div>
    <div class="form-group col-md-6">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" name="apellido"   placeholder="ej : Valencia">
    </div>
  </div>
  <div class="form-group">
    <label for="identificacion">Identificación</label>
    <input type="number" class="form-control" name="identificacion" data-validation="number" placeholder="ej : 1001160243">
  </div>
  <div class="form-group">
    <label for="telefono">telefono</label>
    <input type="number" class="form-control" name="telefono" data-validation="number" placeholder="ej : 3135324736">
  </div>
    <div class="form-group ">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" data-validation="email" placeholder="ej : pepito@gmail.com" >
    </div>
  </div>
  <center><button type="submit" class="btn btn-primary">Enviar</button>
  <button type="reset" class="btn btn-info">Restablecer</button></center>
  
</form>
<!-- Plugin validacion -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</body>
</html>