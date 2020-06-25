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
    <!--Etiquetas meta interp texto-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <!--Mis estilos-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/perfilAdmin.css">
    <!--Logo de title-->
    <link rel="icon" type="img/png" href="../Imagenes/favicon.png">
    <!--Link de los lotipos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>HistoGraff</title>
    <!--JQuery-->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <!--Popper-->
    <script src="../js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/perfilAdmin.js"></script>
    <script type="text/javascript" src="../js/updateAdmin.js"></script>
    
  </head>
  <body>

  <div class="area">
  <nav class="main-menu">
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">
          <img class="img-responsive" src="../Imagenes/HistoGraff.png" width="40%" height="30%" title="HistoGraff">
        HistoGraff</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div id="linea"></div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" width="100%" height="100%" title="Foto perfil Admin" src="../imagenes/Esteban.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
              <!--Notificaciones-->
    <?php
    include ('conexion.php');
    $consulta="SELECT * FROM notificaciones ORDER BY fecha DESC"; 
    $result=mysqli_query($conex,$consulta);
    ?>
      <div class="dropdown notify">
      <a class="btn btn-secondary dropdown-toggle" style="border-radius:20px" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-bell" style="color:red"></i>
    <span class="label label-warning text-warning"></span>
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <?php
    
    while($row=mysqli_fetch_array($result)){
    ?>
    <a class="dropdown-item" title=" <?php echo $row['mensaje'] ." ". $row['fecha']
    ?>" href="TourSolicitados.php"><?php echo $row['fecha']; ?></a>
    <?php
    }
    ?>
  </div>
</div>
          <span class="user-status">
            <i class="fa fa-circle"></i>
          </span>
        </div>
      </div>
      <!--Boton para gestionar Guias-->
            <ul>
                <li class="has-subnav">
                    <a href="guias.php">
                        <i class="fa fa-id-card fa-2x"></i>
                        <span class="nav-text">
                            Guia
                        </span>
                    </a>
                </li>
                <!--Boton para ver los tures solicitados y gestionarlos-->
                <li class="has-subnav">
                    <a href="tourSolicitados.php">
                        <i class="fa fa-list-ol fa-2x" aria-hidden="true"></i>
                        <span class="nav-text">
                            Tour solicitados
                        </span>
                    </a>
                </li>
                <!--Boton para editar galeria-->
                <li class="has-subnav">
                    <a href="gestionarGraffiti.php">
                       <i class="fa fa-pencil-square fa-2x"></i>
                        <span class="nav-text">
                            Editar galeria
                        </span>
                    </a>  
                </li>
            </ul>
            <li class="has-subnav">
                    <a href="editAdmin.php" id="editar">
                       <i class="fa fa-tasks fa-2x"></i>
                        <span class="nav-text" >
                          Editar datos
                        </span>
                    </a>  
                </li>
            </ul>
            <!--Cerrar session-->
            <ul class="logout">
                <li>
                   <a href="salirSesion.php">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Cerrar sesión
                        </span>
                    </a>
                </li>  
            </ul>
            
            </div>
          </div>
          </div>
</div>
</div>
        </nav>
    

    <!--Bienvenida de el administrador-->
    <br><br><br><br><br>
    <center><h1 class="letras">Bienvenido Administrador HistoGraff</h1>
    <img class="imagenLogo" src="../Imagenes/HistoGraff.png" title="HistoGraff" alt="Error al cargar"></center>


  </body>
</html>
