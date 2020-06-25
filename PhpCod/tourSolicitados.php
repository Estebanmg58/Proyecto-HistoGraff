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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>HistoGraff</title>
    <link rel="icon" type="img/png" href="../Imagenes/favicon.png">
    <!--Estilos de la pagina-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilosIndex.css">
    <link rel="stylesheet" href="../css/stylosTour.css">
    <!--Jquery-->  
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <!--Logos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   <!--Plugin de alertas-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Mis Scripts-->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/tourSolicitados.js"></script>
</head>
<body>

      <!--Barra de navegación-->
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
                        <a  href="#">Tour Solicitados</a>
                        <a  href="salirSesion.php">Cerrar sesión</a>
                    </ul>   
                </nav>
        </header><br><br><br><br>
<!--Boton para agrgar más registros -->
<center><a href="agendarTourAdmin.php" class="btn btn-info boton">Agregar Registros</a></center>
<center><h1 id="text">Tours Solicitados</h1></center>
<!--Tabla de tours solicitados-->
<table id="tabla" class="table table-responsive table-striped tabla text-center" >
    <thead>
    <tr>
        <td>Codigo solicitud</td>
        <td>Identificación solicitante</td>
        <td>Nombres</td>
        <td>Apellidos</td>
        <td>Teléfono</td>
        <td>Email</td>
        <td>Cantidad de personas</td>
        <td>Fecha Tour</td>
        <td>Hora Tour</td>
        <td>Borrar registro</td>
        <td>Actualizar registro</td>
        <td>Asignar Guía</td>
            
    </tr>
  </thead>
    <?php
    include ("conexion.php");
    $consulta="SELECT * FROM solicitar_tour ORDER BY fecha_tour ASC";
    $resultado=mysqli_query($conex,$consulta);
    while($mostrar=mysqli_fetch_array($resultado)) {
    ?>
    <tbody>
    <tr>
    <td><?php echo $mostrar ['cod_solicitud']; ?></td>
    <td><?php echo $mostrar ['id_solicitante']; ?></td>
    <td><?php echo $mostrar ['nombre']; ?></td>
    <td><?php echo $mostrar ['apellido']; ?></td>
    <td><?php echo $mostrar ['telefono']; ?></td>    
    <td><?php echo $mostrar ['Email']; ?></td>
    <td><?php echo $mostrar ['cantidad']; ?></td>
    <td><?php echo $mostrar ['fecha_tour']; ?></td>
    <td><?php echo $mostrar ['hora_tour']; ?></td>
    <td>
        <button class="btn btn-danger btnBorrar" id="<?php echo $mostrar['cod_solicitud']; ?>">
          Borrar
        </button>
    </td>
    <td>
        <!-- Button Actualizar -->
        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#staticBackdrop">
        <a data-target="#staticBackdrop" class="editar" data-id="<?php echo $mostrar['cod_solicitud'];?>" href="#staticBackdrop?id=<?php echo $mostrar['cod_solicitud'];?>"
        style="color:white">Editar</a>
        </button> 
    </td>
    <td>
    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#staticBackdrop1">
    <a style="color:white" data-target="#staticBackdrop1" class="asignar" href="#staticBackdrop1?id=<?php echo $mostrar['cod_solicitud'];?>" data-id="<?php echo $mostrar['cod_solicitud'];?>">Asignar</a>
    </button>
    </td>
  </tr>
    <?php
    }
    ?>
    </tbody>
</table>
    <!--Modal asignar tour a los Guias-->
    
    <div class="modal fade" id="staticBackdrop1" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Informe guía</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-responsive table-striped">
          <thead>
          <tr>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Teléfono</td>
          <td>Estado</td>
         </tr>
        </thead>
            <?php
            include "conexion.php";
            $query="SELECT idGuia,NombreGuia,ApellidoGuia,Telefono FROM guia";
            $result=mysqli_query($conex,$query);
            while($row=mysqli_fetch_array($result)) {
            ?>
        <tbody>
          <tr> 
            <input type="hidden" value="<?php $idGuia = $row['idGuia'];?>">
            <td><?php echo $row ['NombreGuia'];?></td>
            <td><?php echo $row ['ApellidoGuia'];?></td>
            <td><?php echo $row ['Telefono'];?></td>
            <td>
              <?php       
              $sql = mysqli_query($conex, "SELECT * FROM guia WHERE idGuia='$idGuia'");
            
              while ($fila = mysqli_fetch_assoc($sql)) {
              
              ?>
       <?php if($fila['estado'] == 0){ ?>

             <a class="text-info" id="text" href="asignarTour.php?idGuia=<?=$fila['idGuia']?>">
             Disponible</a>

             
         <?php } else{ ?>
             <a class="text-danger" id="text" href="asignarTour2.php?idGuia=<?=$fila['idGuia']?>">No disponible</a>
         <?php } ?>
            </td>
            <?php } ?>
          </tr>
          
        </tbody>
          <?php
          }
          ?>
        </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
          </div>
          </div> 
          </div> 

<!-- Modal editar tour -->

<div  class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Datos del tour</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editar" method="POST">
      <div class="modal-body">

        <input type="hidden" type="text" name="id" id="id" value="">

      <div class="form-group"> 
        <input class="form-control" type="text" name="nombre"  id="nombre" value="" >
      </div>

      <div class="form-group">
        <input class="form-control" type="text" name="apellido" id="apellido" value="">
      </div>

      <div class="form-group">
        <input class="form-control" type="number" name="tel" id="tel"value="" >
      </div>

      <div class="form-group">
        <input class="form-control" type="email" name="email" id="email"value="" >
      </div>

      <div class="form-group">
        <input class="form-control" type="text" name="cantidad" id="cantidad" value="">
      </div>

      <div class="form-group">
        <input class="form-control" type="time" name="hora" id="hora" value="">
      </div>

      <div class="form-group">
        <input class="form-control" type="text" name="fecha" id="fecha" value="">
      </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="" class="btn btn-primary">Guardar</button>
          </div>
          </form>
          </div>
          </div>              
          </div> 


</body>
</html>