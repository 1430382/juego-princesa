<?php
// Permite mostrar los errores
	error_reporting(E_ALL);
ini_set('display_errors', '1');

// Inicia la sesión, necesario para usar las utilidades de SESSION
session_start();
// Se incluye el archivo con la clase Database
include ("backend/conexion.php");

/////////

///

$objeto='';
///// VALIDATE THE POST
if(isset($_POST['objeto'])){
 	 $objeto=$_POST['objeto'];
}
if(isset($_POST['users'])){
	$users=$_POST['users'];
}
////////
if(isset($_POST['registrar'])){


	 $query = "INSERT INTO INVENTARIO_ITEMS (idjugadores,iditems) VALUES ('".$users."','".$objeto."')";
	 //$query = "UPDATE  JUGADORES SET iditems='".$objeto."' WHERE idjugadores='".$users."'";
	 if($con ->query($query)== TRUE){
	 	$conn=mysqli_connect("localhost","root","","test") or die("Error in connection");
		$query = mysqli_query($conn,"UPDATE  JUGADORES SET iditems='".$objeto."' WHERE idjugadores='".$users."'");
		///////////


		echo"<div class='alert alert-success alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
		<strong>Exitoso!</strong> La compra se ha guardado correctamente.
	</div>";

	}else{
		echo "<div class='alert alert-danger alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
		<strong>Problema!</strong> No se pudo guardar la compra, vuelva a intentar.
		</div>";
			}
	$con->close();
	$conn->close();

//   }
}
 ?>

<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- MINECRAFT FONT -->
	<link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' type='text/css'>

		<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/tienda.css">

	<title>Tienda</title>
</head>

<body style="background-image: url(img/background-tienda.jpg);">
<style media="screen">
.desc { color:#6b6b6b;}
.desc a {color:#0092dd;}

.dropdown dd, .dropdown dt, .dropdown ul { margin:0px; padding:0px; }
.dropdown dd { position:relative; }
.dropdown a, .dropdown a:visited { color:#816c5b; text-decoration:none; outline:none;}
.dropdown a:hover { color:#5d4617;}
.dropdown dt a:hover { color:#5d4617; border: 1px solid #d0c9af;}
.dropdown dt a {background:#e4dfcb url('http://www.jankoatwarpspeed.com/wp-content/uploads/examples/reinventing-drop-down/arrow.png') no-repeat scroll right center; display:block; padding-right:20px;
							border:1px solid #d4ca9a; width:150px;}
.dropdown dt a span {cursor:pointer; display:block; padding:5px;}
.dropdown dd ul { background:#e4dfcb none repeat scroll 0 0; border:1px solid #d4ca9a; color:#C5C0B0; display:none;
								left:0px; padding:5px 0px; position:absolute; top:2px; width:auto; min-width:170px; list-style:none;}
.dropdown span.value { display:none;}
.dropdown dd ul li a { padding:5px; display:block;}
.dropdown dd ul li a:hover { background-color:#d0c9af;}

.dropdown img.flag { border:none; vertical-align:middle; margin-left:10px; }
.flagvisibility { display:none;}
</style>
	<!---
	  HEADER
	   -------------->
	<?php include "header.php" ?>

	<div class="container">
		<div class="row">

			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-3">
						<img src="img/tienda/welcomeTienda.gif" id="mensaje">
						<img src="img/tienda/aldeano.png" id="aldeano">
					</div>
					<div class="col-sm-3">
						<img src="img/tienda/button.png" class="center" id="boton">
						<img src="img/tienda/items/sandclock.png" class="center" id="item" >
					</div>
					<div class="col-sm-6" id="tablero" >
						<h1 class="center-text">RELOJ DE ARENA</h1>
						<p class="center-text">Permite aumentar el tiempo de efecto del hechizo para un jugador</p>
					</div>
				</div>
			</div>

			<div class="col-sm-6" >
				<div class="row center" >
					<div class="col-sm-12 center" id="tabla">

						<div class="row">
<!--  style= "width: 500px; height: 500px; float:left;margin-left:200px;margin-top:61px;
---->
<div class="col-sm-12">
<img src="img/tienda/items/tear.png" alt="" width="50" style="float:left;margin-left:400px;margin-top:61px;">
<img src="img/tienda/items/mayor.png" alt="" width="50" style="float:left;margin-left:400px;margin-top:11px;">
<img src="img/tienda/items/menor.png" alt="" width="50" style="float:left;margin-left:400px;margin-top:11px;">
<img src="img/tienda/items/muerte.png" alt="" width="50" style="float:left;margin-left:400px;margin-top:11px;">
<img src="img/tienda/items/muertePrematura.png" alt="" width="50" style="float:left;margin-left:400px;margin-top:11px;">
<img src="img/tienda/items/sandclock.png" alt="" width="50" style="float:left;margin-left:400px;margin-top:11px;">
<img src="img/tienda/items/teleport.png" alt="" width="50" style="float:left;margin-left:400px;margin-top:11px;">
<img src="img/tienda/items/teleport.png" alt="" width="50" style="float:left;margin-left:400px;margin-top:11px;">
</div>

<form class="center" id="form-margins" method="post">
<!--
<button type="submit" name="registrar">
<img src="img/tienda/items/tear.png" width="50" />
</button>
-->

		<div class="form-check" style="margin-left: 10.25em;margin-top: -500px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="1">
												<label class="form-check-label" for="lagrimas">
													Lagrimass de amigos
												</label>
											</div>

		<div class="form-check" style="margin-left: 10.25em;margin-top: 40px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="8">
												<label class="form-check-label" for="veneno">
													Veneno mayor
												</label>

											</div>
											<div class="form-check" style="margin-left: 10.25em;margin-top: 30px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="7">
												<label class="form-check-label" for="venenomen">
													Veneno menor
												</label>

											</div>
											<div class="form-check" style="margin-left: 10.25em;margin-top: 30px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="4">
												<label class="form-check-label" for="clon">
													Clon de sombras
												</label>

											</div>
											<div class="form-check" style="margin-left: 10.25em;margin-top: 50px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="9">
												<label class="form-check-label" for="tortura">
													Tortura simple
												</label>

											</div>
													<div class="form-check" style="margin-left: 10.25em;margin-top: 40px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="3">
												<label class="form-check-label" for="lagrimas">
													Reloj de arena
												</label>

											</div>
											<div class="form-check" style="margin-left: 10.25em;margin-top: 30px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="5">
												<label class="form-check-label" for="lagrimas">
													teletransportacion menor
												</label>

											</div>
											<div class="form-check" style="margin-left: 10.25em;margin-top: 30px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="6">
												<label class="form-check-label" for="lagrimas">
													Teletransportacion mayor
												</label>

											</div>
													<select name="users" id="users" style="margin-left: 10.25em;margin-top: 20px;">
							<?php
					 			$res="select idjugadores,CONCAT(nombre,' ',apellidos,' ') as JUGADORES FROM JUGADORES;";
					 			$res=$con->query($res);
					 			while ($row = $res->fetch_array()) {
					 				?>
					 				<option value="<?php echo $row['idjugadores'];?>">
					 				<?php echo $row['JUGADORES'];?>
					 				</option>
					 				<?php
					 			}
					 		?>
</select>
<!--
--->
						<button class="button button1" type="submit" name="registrar" style= "float:left;margin-left:100px;margin-top:-1px;" >Comprar</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-right" >
		<a href="reglas.html">
			<img src="img/book.png" alt="Reglas del juego" class="center" id="navbar-img">
			<h1 class="center-text">Reglas</h1>
		</a>
	</div>
</body>
</html>
