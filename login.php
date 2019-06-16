<?php
	// Permite mostrar los errores
    error_reporting(E_ALL);
	ini_set('display_errors', '1');

	// Inicia la sesión, necesario para usar las utilidades de SESSION
	session_start();
	// Se incluye el archivo con la clase Database
	include ("backend/conexion.php");
	// Se crea una instancia de Database
//
if(isset($_GET['status'])){
	$status = $_GET['status'];
	if($status == 1){
		echo "<script>
		$(function(){
			Materialize.toast('El usuario o contraseña es incorrecto', 2200, 'rounded')
		});
	</script>";
}else if($status == 2){
		echo "<script>
		$(function(){
			Materialize.toast('Ha ocurrido un error, intente nuevamente', 2200, 'rounded')
		});
	</script>";
}
}
//
  if (isset($_POST['submit_ver'])) {
    // Se asigna a sus respectivas variables
  	$username = htmlspecialchars($_POST['username']);
  	$password = htmlspecialchars($_POST['password']);
    // Luego se llama el procedimiento almacenado
  	if (!($res=$con->query("CALL iniciar_sesion('$username','$password')"))) {
  		header("location: login.php?status=2");
  	}else{
  		/*E imprimimos el resultado para ver que el ejemplo ha funcionado*/
  		if($row = $res->fetch_assoc()){
        //Se guarda el rol y el id del id_usuario
        // Para utilizarlo posteriormente
  			$_SESSION['rol']=$row['id_rol'];
  			$_SESSION['usuario']=$row['idusuarios'];        
  		if($row['id_rol']==1){
          //var_dump($_SESSION['usuario']);
          //var_dump($_SESSION['rol']);
  				header("location: registrar.php");
  			}
        if($row['id_rol']==2){
    				header("location: profile2.php");
    			}
  		}else{

  		}
  	}
  }
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Iniciar sesión</title>
</head>

<body style="background-image: url(img/bg_login.jpg);">
<main>
  <?php
        /*
				// Se revisa que se enviaron datos mediante el método POST
				if(isset($_POST) && !empty($_POST)){
					// Se guardan en variables los valores del metodo post
					$nombre = $log->sanitize($_POST['nombre']);
					$pass = $log->sanitize($_POST['pass']);
					// Llama al metodo que da funcionamiento al login
					$res = $log->login($nombre);
					if($res){
						// Si es exitoso
						// Comapra si la contraseña es correcta
						if(strcmp ($res->contrasena , $pass ) == 0){
							// Se guardan los valores enviados en variables de SESSION
							$_SESSION['nombre'] = $nombre;
							$_SESSION['pass'] = $pass;
              $_SESSION['id_rol']=$rol;
							// Y redirecciona a index
							header('Location: registrar.php');
						}
					} else{
						// Si no lo es, muestra mensaje de error
						$message = "Usuario o contraseña incorrecta";
						$class = "alert alert-danger";

			?>
						<div class="<?php echo $class; ?>">
							<?php echo $message; ?>
						</div>
			<?php
					}
          ///


          ///
				}*/
			?>
	<div class="col-sm-8 loginForm">
		<img class="navbar-logo center" style="margin-bottom: 2em;" src="img/navbar/logo.png">
		<form method="post" action="" name="login">
			<input class="formInput center" type="text" id="username" name="username" placeholder="usuario">
			<br>
			<input class="formInput center" type="password" id="password" name="password" placeholder="Password">
			<br>
			<div class="container-login100-form-btn">
		<button type="submit" name="submit_ver" style="margin-left:500px;width:200px">Ingresar</button>
		</div>
		</form>
		</main>
		<!--	<a href='registrar.php'>Ingresar</a> -->
	</div>
</body>
</html>
<style type="text/css">
	a {
		cursor: pointer;
	}
	.loginForm {
		position: absolute;
		top: 50%;
		left: 50%;
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
		margin: auto;
    .formInput {
	}
		width: 30%;
		height: auto;
	}
</style>
