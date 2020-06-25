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
        <!--Logo de title-->
        <link rel="icon" type="img/png" href="../Imagenes/favicon.png">
        <!--Estilos Botstrap y mis estilos-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilosIndex.css">
        <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.min.css" />
		<link rel="stylesheet" href="../js/jquery-ui/jquery-ui.structure.min.css" />
        <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.theme.min.css" />
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <!--JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui/jquery-ui.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        <!--Mis scripts-->
        <script src="../js/validate.js"></script>
        <!--Bootstrap JS-->
        <script src="../js/bootstrap.min.js"></script>
        <!--Validacion de recaptcha-->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </head>
    <body style="background: url('../Imagenes/escalas.jpg'); background-repeat: no-repeat;background-size: 100% 180%;">
    <header>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <nav class="navbar navbar-light bg-light fixed-top">
                        <!--Logo-->
                        <a class="navbar-brand" href="Administrador.php">
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
        </header><br><br><br>
        <a href="tourSolicitados.php" ><img  src="../Imagenes/back.png" width="30px" height="30px" title="volver a los tours solicitados"></a>
        <br><!--Formulario para que el usuario solicite el tour-->
        <div class="container" style="width: 45%; background-color:rgba(0,0,0,0.5) !important; border-radius: 10px;margin-top: auto;">
         
        <form action="solicitarTour.php" class="text-white" method="POST"  >
            <br>
                <center><h3>Agendar Tour</h3></center>
                <br>
                <center>  
                <div class="form-group">                
                    <input class="form-control" type="number" style="width:70%"  name="id" placeholder="Número de identificación" data-validation="number">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" style="width:70%"  name="nombre"  placeholder="Nombres">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text"  style="width:70%" name="apellido"  placeholder="Apellidos" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="tel"  style="width:70%" name="cel" placeholder="Teléfono" data-validation="number">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text"  style="width:70%" name="email" placeholder="Email" data-validation="email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="number" style="width:70%"  name="cantidad" id="cantidad" placeholder="Cantidad" data-validation="number" >
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" style="width:70%" name="fecha" id="datepicker" placeholder="Año-Mes-Día" data-validation="date" data-validation-format="yyyy-mm-dd" >    
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" style="width:70%" id="hour"  name="hora" placeholder="Hora" >
                </div>
                <div class="g-recaptcha" data-sitekey="6LflOuMUAAAAAGkZVQUjWKf8AMRVB_8zaJWi6vnJ"></div>
                </center><br>
                <center> <input class="asignar btn btn-primary" type="submit" name="asignar" value="Solicitar tour"></center>
                <br>
            </form>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    </body>
</html>
