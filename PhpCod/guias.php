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
    <!--Icono de Histograff title-->
    <link rel="icon" type="img/png" href="../Imagenes/favicon.png">
    <!--Estilos bootstrap y mis estilos-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilosIndex.css">
    <!--Link de los lotipos-->
    <!--load-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--plugin de alerta al actualizar un registro o eliminarlo-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    <script type="text/javascript" src="../js/guias.js"></script>

</head>
<body>
    <!--Barrra lateral-->
    <header>
                <nav class="navbar navbar-light bg-light fixed-top">
                        <!--Logo-->
                        <a class="navbar-brand " href="Administrador.php">
                        <img src="../Imagenes/HistoGraff.png" width="43" height="35" class="d-inline-block align-top" alt="">
                        HistoGraff
                        </a>
                        <ul class="menu">
                        <!--Botones de navegacion-->
                        <a  href="#">Guias</a>
                        <a  href="gestionarGraffiti.php">Grafitis</a>
                        <a  href="tourSolicitados.php">Tour Solicitados</a>
                        <a  href="salirSesion.php">Cerrar sesión</a>
                    </ul>   
                </nav>
        </header><br><br><br>
     <!--Boton para registrar guias-->
     <center><h1 id="text">Guias vinculados a HistoGraff</h1></center>
    <center><a href="addGuias.php" class="btn btn-info boton">Agregar guía</a></center><br>
        <!--Tabla que muestra los guias registrados-->
       
        <center><table class="table table-responsive table-striped " id="tables">
            <thead>
                <tr>
                    <td>Identificación</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Teléfono</td>
                    <td>Email</td>
                    <td>Borrar guía</td>
                    <td>Actualizar guía</td>
                </tr>
            </thead>
            <!--Consulta para hacer el ciclo de cada vez que halla un registro en los guias-->
            <?php
            include ("conexion.php");
            $consulta="SELECT * FROM guia";
            $resultado=mysqli_query($conex,$consulta);
            while($mostrar=mysqli_fetch_array($resultado)) {
            ?>
            <tbody>
                <tr>    
                    <td><?php echo $mostrar ['idGuia'] ?></td>
                    <td><?php echo $mostrar ['NombreGuia'] ?></td>
                    <td><?php echo $mostrar ['ApellidoGuia'] ?></td>
                    <td><?php echo $mostrar ['Telefono'] ?></td>
                    <td><?php echo $mostrar ['Email'] ?></td>
                    <td>
                        <!--Boton para eliminar guias-->
                        <button class="btn btn-danger btnBorrar" id="<?php echo $mostrar['idGuia']; ?>">
                            Borrar
                        </button>
                    </td>
                     <!--Boton para actualizar guias-->
                     <td>
                     <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#staticBackdrop">
                    <a data-target="#staticBackdrop" class="editar" data-id="<?php echo $mostrar['idGuia'];?>" href="#staticBackdrop?id=<?php echo $mostrar['idGuia'];?>"
                    style="color:white">Editar</a>
                   
                    </td>  
                </tr>
                <!--Corchete que cierra el ciclo-->
                <?php
                }
                ?>
            </tbody>
        </table></center>
              
              <!--Modal de editar tour -->
          <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel">Actualizar guias</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <!--Formulario que muestra los datos por medio de Ajax-->
            <form id="editar" method="POST">
            <div class="modal-body">

            <input type="hidden" type="text" name="id" id="id" value="" >
            
            <div class="form-group">
            <input class="form-control" type="text" name="name" id="name" value="">
            </div>

            <div class="form-group">
            <input type="text" class="form-control" name="apellido" id="apellido" value="">
            </div>

            <div class="form-group">
            <input type="number" class="form-control" name="telefono" id="telefono" value="">
            </div>

            <div class="form-group">
               <input type="text"  class="form-control" name="email" id="email" value="">
            </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="" class="btn btn-primary">Guardar cambios</button>
       </div>
        </form>
          </div>
          </div>              
          </div>  
          <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
          <script type="text/javascript" src="../js/bootstrap.min.js"></script>
          <script type="text/javascript" src="../js/actualizarGuias.js"></script>
</body>
</html>