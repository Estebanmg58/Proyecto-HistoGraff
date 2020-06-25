

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HistoGraff</title>
    <!--icono del titulo-->
    <link rel="icon" type="img/png" href="../Imagenes/favicon.png">
    <!--Bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Plugin de iconos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Mis stilos-->
    <link rel="stylesheet" href="../css/LoginAdmin.css">
    <!--Mis scripts-->
    <script type="text/javascript" src="../js/cofimClave.js"></script>
</head>
<body>

    <!--Confirmar contraseña para proceder a hacer el cambio-->
		<div class="container">
			<div class="d-flex justify-content-center h-100 txt">
				<div class="card">
                    <br>
                    <br>
                    <br>
					<div class="card-header">
						<center><h3>Ingresa tu nueva contraseña</h3></center>
                    </div>
					<div class="card-body">
						<form  action="actualizarContraseña.php" method="POST" onsubmit="return valida()">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
                                <input type="password" name="clave" id="clave" class="form-control" placeholder="Nueva contraseña" require>
                            </div>
                            <div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
                                <input type="password" name="clave1" id="clave1" class="form-control" placeholder="Confirmar contraseña" require>
                            </div>
							<center><input type="submit" name="Enviar" value="Cambiar" class="btn login_btn" style="width: 100%; background-color:#253BFF;"></center>
                        </form>
					</div>
				</div>
			</div>
		</div>
</body>
</html>