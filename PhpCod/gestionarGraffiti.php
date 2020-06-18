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
    <!--Logo de title-->
    <link rel="icon" type="img/png" href="../Imagenes/favicon.png">
    <!--Estilos-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilosIndex.css">
    <!--JQUERY-->
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>   
    <!--Mis scripts-->
    <script src="../js/crudGrafiti.js"></script>
    <!--Plugin al eliminar o borrar graffitis-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                        <a  href="#">Grafitis</a>
                        <a  href="tourSolicitados.php">Tour Solicitados</a>
                        <a  href="salirSesion.php">Cerrar sesión</a>
                    </ul>   
                </nav>
        </header><br><br><br><br>

    <!-- Boton que abre el modal para hacer registros de grafitis -->
<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Ingresar grafitis
</button></center>

<!-- Modal en el cual se pueden hacer registros -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><b>Registar grafitis</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <!--Formulario para insertar graffitis-->
      <form  method="post" action="addGraffiti.php" enctype="multipart/form-data" >
        <input type="hidden" type="text" name="id" id="id">
      
      <div class="form-group"> 
        <label for="nombreGraffiti">Nombre del grafiti</label>
        <input class="form-control" type="text" name="nombreGraffiti" title="Nombre del grafiti"  id="nombreGraffiti" placeholder="Nombre">
      </div>

      <div class="form-group">
        <label for="descripcion">descripcion</label>
        <textarea class="form-control" name="descripcion" id="descripcion" title="Descripción del grafiti"  placeholder="Descripción"></textarea>
      </div>

      <div class="form-group">
        <label for="foto">Foto de el grafiti</label>
        <input class="form-control" type="file" name="foto" id="foto">
      </div> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" id="submit" class="btn btn-primary" value="Guardar grafiti">
        <button class="btn btn-info" type="reset">Restablecer</button>
      </div>
      </form>
    </div>
  </div>
</div>
      <!--Aqui muestra los graffitis ya insertados-->
      <div class="container">
      <table class="table table-responsive table-striped">
      <thead>
      <tr>
        <td>Código Grafiti</td>
        <td>Nombre Grafiti</td>
        <td>Descripción</td>
        <td>Foto</td>
        <td>Editar Grafiti</td>
        <td>Eliminar Grafiti</td>
      </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          include ('conexion.php');
          $query="SELECT * FROM graffiti";
          $result=mysqli_query($conex,$query);
          while($row = $result -> fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $row['codGraffiti']?></td>     
            <td><?php echo $row['NombreGraffiti']?></td>
            <td><?php echo $row['DescripcionGraffiti']?></td>
            <td><img class="img-circle" height="100px" width="150px"  src="data:image/jpg;base64,<?php echo base64_encode($row['fotoGraffiti']) ?> " alt="error"></td>      
            <td><button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#staticBackdrop">
            <a data-target="#staticBackdrop" class="editar" data-id="<?php echo $row['codGraffiti'];?>" href="#staticBackdrop?id=<?php echo $row['codGraffiti'];?>"
            style="color:white">Editar</a>
            </button></td>
            <td><button class="btn btn-danger btnBorrar" id="<?php echo $row['codGraffiti'];?>">Eliminar</button></td>
          </tr>
          <?php
          }
          ?>
        </tr>
      </tbody>
      </table>
    </div>

    <!--Modal de editar Graffitis sale al presionar en el boton editar-->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Actualizar Grafiti</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <!--Formulario de actualizacion de grafitis-->
      <form id="editarGraff" method="POST">
        
      <div class="modal-body">
        <input type="hidden" type="text" name="ide" value="" id="ide">

      <div class="form-group"> 
        <input class="form-control" type="text" name="nombreGraffitii"  id="nombreGraffitii" value="" placeholder="Nombre">
      </div>

      <div class="form-group">
        <textarea class="form-control" name="descripcionn" value="" id="descripcionn"  placeholder="Descripción" ></textarea>
      </div>

      <div class="form-group">
        <label for="foto">Foto de el grafiti</label>
        <input class="form-control" type="file" name="foto" id="foto" title="la foto del grafiti no se puede actualizar" disabled>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="" class="btn btn-primary">Guardar</button>
        </div>
          </div>
        </form>
          </div>
          </div>              
          </div>
        </body>
</html>