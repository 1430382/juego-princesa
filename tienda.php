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
$idjugador=$_SESSION['_idjugador'];
//echo $idjugador;
//$objeto='';
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

	 if($con ->query($query)== TRUE)
	 {
		echo"<div class='alert alert-success alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
		<strong>Exitoso!</strong> La compra se ha guardado correctamente.
	</div>";
	if (!($res=$con->query("
	SELECT JUGADORES.matricula,JUGADORES.nombre,JUGADORES.apellidos,JUGADORES.equipo,
	JUGADORES.genero,JUGADORES.vida,JUGADORES.fantasma,JUGADORES.idusuarios,
	INVENTARIO_ITEMS.iditems,INVENTARIO_ITEMS.idjugadores, ITEMS.fecha FROM JUGADORES
	INNER JOIN INVENTARIO_ITEMS
	ON JUGADORES.idjugadores ='$idjugador'
	INNER JOIN ITEMS ON ITEMS.iditems = INVENTARIO_ITEMS.iditems"))) {
		}else{
			/*E imprimimos el resultado para ver que el ejemplo ha funcionado*/
			if($row = $res->fetch_assoc()){
				$_SESSION['iditems']=$row['iditems'];
				$iditems=$_SESSION['iditems'];
				$_SESSION['equipo']=$row['equipo'];
        $equipo=$_SESSION['equipo'];

				if($row['iditems']==1)
				{
						if (!$con->query("UPDATE JUGADORES SET vida=vida-15  WHERE idjugadores='$idjugador'"))
							{
								echo"<div class='alert alert-success alert-dismissable'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
								<strong>Exitoso!</strong> El objeto se a utilizado correctamente.
							</div>";
							}

				}else if($row['iditems']==2)
				{
					if (!$con->query("UPDATE JUGADORES SET vida=vida-15  WHERE equipo='$equipo'"))
						{
							echo"<div class='alert alert-success alert-dismissable'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
							<strong>Exitoso!</strong> El objeto se a utilizado correctamente.
						</div>";
						}
				}
				else if($row['iditems']==3)
				{
					if (!$con->query("UPDATE JUGADORES SET vida=vida-5  WHERE idjugadores='$idjugador'"))
						{
							echo"<div class='alert alert-success alert-dismissable'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
							<strong>Exitoso!</strong> El objeto se a utilizado correctamente.
						</div>";
						}
				}
				else if($row['iditems']==4)
				{
					if (!$con->query("UPDATE JUGADORES SET vida=vida-5  WHERE idjugadores='$idjugador'"))
						{
							echo"<div class='alert alert-success alert-dismissable'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
							<strong>Exitoso!</strong> El objeto se a utilizado correctamente.
						</div>";
						}
				}
				else if($row['iditems']==5)
				{
					if (!$con->query("UPDATE JUGADORES SET vida=vida-7  WHERE idjugadores='$idjugador'"))
						{
							echo"<div class='alert alert-success alert-dismissable'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
							<strong>Exitoso!</strong> El objeto se a utilizado correctamente.
						</div>";
						}
				}
				else if($row['iditems']==6)
				{
					if (!$con->query("UPDATE JUGADORES SET vida=vida-40  WHERE equipo='$equipo'"))
						{
							echo"<div class='alert alert-success alert-dismissable'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
							<strong>Exitoso!</strong> El objeto se a utilizado correctamente.
						</div>";
						}
				}
				else if($row['iditems']==7)
				{
			//veneno menor
			if (!$con->query("UPDATE JUGADORES SET vida=vida-10  WHERE idjugadores='$idjugador'"))
				{
					echo"<div class='alert alert-success alert-dismissable'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
					<strong>Exitoso!</strong> El objeto se a utilizado correctamente.
				</div>";
				}
				}
				else if($row['iditems']==8)
				{
					if (!$con->query("UPDATE JUGADORES SET vida=vida-10  WHERE equipo='$equipo'"))
						{
							echo"<div class='alert alert-success alert-dismissable'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
							<strong>Exitoso!</strong> El objeto se a utilizado correctamente.
						</div>";
						}
				}
				else if($row['iditems']==9)
				{
					echo '<script language="javascript">';
					echo 'alert("El de tortura simple no funciona.")';
					echo '</script>';
				}

			}else{
				echo "No existen más items";
			}

		}

$con->close();

	}else{
		echo "<div class='alert alert-danger alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
		<strong>Problema!</strong> No se pudo guardar la compra, vuelva a intentar.
		</div>";
			}

	//$con->close();

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

label {
  width:200px;
  display: inline-block;
}

</style>
	<!---
	  HEADER
	   -------------->
	<?php include "header.php" ?>

	<div class="container">
		<div class="row">

			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-3" style="float:left;margin-left:-100px;margin-top:10px;">
						<img src="img/tienda/welcomeTienda.gif" id="mensaje">
						<img src="img/tienda/aldeano.png" id="aldeano">
					</div>
					<div class="col-sm-12 center" id="tabla" style="float:left;margin-left:550px;margin-top:-290px;display:inline-block;">
					<div class="col-sm-3">
				<!--		<img src="img/tienda/button.png" class="center" id="boton"> -->
						<img src="img/tienda/items/tear.png" width="100px" height="100px" id="image2" style="float:left;margin-left:-550px;margin-top:150px;display:none;" alt="image2"/>
						 <label for="image2" style="color:#DC143C;float:left;margin-left:-400px;margin-top:150px;display:none;font-size:20px;"
						 id="label2" alt="label2">15 ps *integrante El jugador obtiene +5 cuando esta en status fantasma </label>
						 <!-- --->
						<img src="img/tienda/items/muertePrematura.png" width="100px" height="100px" id="image1" style="float:left;margin-left:-550px;margin-top:150px;display:none;" alt="image1">
						<label for="image1" style="color:#DC143C;float:left;margin-left:-400px;margin-top:150px;display:none;font-size:20px;"
						id="label1" alt="label1">15 ps El jugador obtiene +1 cuando esta en status fantasma </label>
						<!-- --->
					 <img src="img/tienda/items/mayor.png" width="100px" height="100px" id="image3"  alt="image3" style="float:left;margin-left:-550px;margin-top:150px;display:none;">
					 <label for="image3" style="color:#DC143C;float:left;margin-left:-400px;margin-top:150px;display:none;font-size:20px;"
					 id="label3" alt="label3">20 ps 3 inicial y -1 ps diario por una semana a todos los jugadores, a los miembros del equipo del lanzador </label>

					<!-- --->
				 <img src="img/tienda/items/menor.png" width="100px" height="100px" id="image4"  alt="image4" style="float:left;margin-left:-550px;margin-top:150px;display:none;">
				 <label for="image4" style="color:#DC143C;float:left;margin-left:-400px;margin-top:150px;display:none;font-size:20px;"
				 id="label4" alt="label4">15 ps 3 inicial y -1 ps diario por una semana a todos los jugadores, a los miembros del equipo del lanzador </label>

				<!-- --->
				 <img src="img/tienda/items/clonSombra.jpg" width="100px" height="100px" id="image5"  alt="image5" style="float:left;margin-left:-550px;margin-top:150px;display:none;">
				 <label for="image5" style="color:#DC143C;float:left;margin-left:-400px;margin-top:150px;display:none;font-size:20px;"
				 id="label5" alt="label5">7 ps 3 Permite borrar el registro de una falta </label>
			 <!-- --->
				<img src="img/tienda/items/muerte.png" width="100px" height="100px" id="image6"  alt="image6" style="float:left;margin-left:-550px;margin-top:150px;display:none;">
				<label for="image6" style="color:#DC143C;float:left;margin-left:-400px;margin-top:150px;display:none;font-size:20px;"
				id="label6" alt="label6">5 ps Asigna un hechizo aleatorio a un jugador objetivo </label>
			<!-- --->
			 <img src="img/tienda/items/sandclock.png" width="100px" height="100px" id="image7"  alt="image7" style="float:left;margin-left:-550px;margin-top:150px;display:none;">
			 <label for="image7" style="color:#DC143C;float:left;margin-left:-400px;margin-top:150px;display:none;font-size:20px;"
			 id="label7" alt="label7">5 ps Permite aumentar el tiempo de efecto del hechizo para el jugador </label>
		 	<!-- --->
		 	 <img src="img/tienda/items/teleport.png" width="100px" height="100px" id="image8"  alt="image8" style="float:left;margin-left:-550px;margin-top:150px;display:none;">
		 	 <label for="image8" style="color:#DC143C;float:left;margin-left:-400px;margin-top:150px;display:none;font-size:20px;"
		 	 id="label8" alt="label8">7 ps Permite intercambiar el objetivo de un hechizo inmediato </label>
			 <!-- --->
 		 	 <img src="img/tienda/items/teleport.png" width="100px" height="100px" id="image9"  alt="image9" style="float:left;margin-left:-550px;margin-top:150px;display:none;">
 		 	 <label for="image9" style="color:#DC143C;float:left;margin-left:-400px;margin-top:150px;display:none;font-size:20px;"
 		 	 id="label9" alt="label9">10 * integrante Permite intercambiar todo el equipo objetivo de un hechizo </label>
				</div>
			</div>

			<div class="col-sm-6" >
				<div class="row center" >


						<div class="row">
<!--  style= "width: 500px; height: 500px; float:left;margin-left:200px;margin-top:61px;
---->
<div class="col-sm-12">
<img src="img/tienda/items/muertePrematura.png" alt="" width="50" style="float:left;margin-left:980px;margin-top:-640px;">
<img src="img/tienda/items/tear.png" alt="" width="50" style="float:left;margin-left:980px;margin-top:-590px;">
<img src="img/tienda/items/mayor.png" alt="" width="50" style="float:left;margin-left:980px;margin-top:-540px;">
<img src="img/tienda/items/menor.png" alt="" width="50" style="float:left;margin-left:980px;margin-top:-490px;">
<img src="img/tienda/items/clonSombra.jpg" alt="" width="50" style="float:left;margin-left:980px;margin-top:-440px;">
<img src="img/tienda/items/muerte.png" alt="" width="50" style="float:left;margin-left:980px;margin-top:-390px;">
<img src="img/tienda/items/sandclock.png" alt="" width="50" style="float:left;margin-left:980px;margin-top:-340px;">
<img src="img/tienda/items/teleport.png" alt="" width="50" style="float:left;margin-left:980px;margin-top:-290px;">
<img src="img/tienda/items/teleport.png" alt="" width="50" style="float:left;margin-left:980px;margin-top:-240px;">
</div>

<form class="center" id="form-margins" method="post">

											<div class="form-check" style="margin-left: 45.25em;margin-top: -670px;">

												<input  class="form-check-input"  type="radio" name="objeto" id="objeto" value="1">
												<label class="form-check-label" for="muertePrematura">
													Muerte Prematura
												</label>
											</div>
													<div class="form-check" style="margin-left: 45.25em;margin-top: 30px;">
												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="2">
												<label class="form-check-label" for="lagrimas">
													Lagrimas de amigos
												</label>
											</div>
											<br>
											<div class="form-check" style="margin-left: 45.25em;margin-top: 10px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="8">
												<label class="form-check-label" for="veneno">
													Veneno mayor
												</label>

											</div>
											<div class="form-check" style="margin-left: 45.25em;margin-top: 30px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="7">
												<label class="form-check-label" for="venenomen">
													Veneno menor
												</label>

											</div>

											<div class="form-check" style="margin-left: 45.25em;margin-top: 20px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="4">
												<label class="form-check-label" for="clon">
													Clon de sombras
												</label>

											</div>
											<div class="form-check" style="margin-left: 45.25em;margin-top: 20px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="9">
												<label class="form-check-label" for="tortura">
													Tortura simple
												</label>

											</div>
													<div class="form-check" style="margin-left: 45.25em;margin-top: 20px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="3">
												<label class="form-check-label" for="relojdearena">
													Reloj de arena
												</label>

											</div>
											<div class="form-check" style="margin-left: 45.25em;margin-top: 20px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="5">
												<label class="form-check-label" for="teletransportacionmenor">
													teletransportacion menor
												</label>

											</div>
											<div class="form-check" style="margin-left: 45.25em;margin-top: 30px;">

												<input  class="form-check-input" type="radio" name="objeto" id="objeto" value="6">
												<label class="form-check-label" for="teletransportacionmayor">
													Teletransportacion mayor
												</label>

											</div>


								<select name="users" id="users" style="margin-left: 45.25em;margin-top: 20px;">
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
<br>
						<button class="button button1" type="submit" name="registrar" style= "float:left;margin-left:700px;margin-top:-150px;" >Comprar</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--

------>



<!-- reglas --->
<div class="bottom-right" >
	<a href="reglas.php">
		<img src="img/book.png" alt="Reglas del juego" class="center" id="navbar-img">
		<h1 class="center-text">Reglas</h1>
	</a>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.2.3/jquery.min.js"></script>
<script type="text/javascript">
$("input:radio[type=radio]").click(function() {
  var value = $(this).val();
  if(value == 1)
    {
			$('#image9').hide();
			$('#label9').hide();
			$('#image8').hide();
			$('#label8').hide();
			$('#image7').hide();
			$('#label7').hide();
			$('#image6').hide();
			$('#label6').hide();
			$('#image5').hide();
			$('#label5').hide();
			$('#image4').hide();
			$('#label4').hide();
			$('#image3').hide();
			$('#label3').hide();
      $('#image2').hide();
			$('#label2').hide();
      $('#image1').show();
			$('#label1').show();
    }
  else if(value == 2)
    {
			$('#image9').hide();
			$('#label9').hide();
			$('#image8').hide();
			$('#label8').hide();
			$('#image7').hide();
			$('#label7').hide();
			$('#image6').hide();
			$('#label6').hide();
			$('#image5').hide();
			$('#label5').hide();
			$('#image4').hide();
			$('#label4').hide();
			$('#image3').hide();
			$('#label3').hide();
      $('#image2').show();
			$('#label2').show();
      $('#image1').hide();
			$('#label1').hide();
    }
		else if(value == 8)
		{
			$('#image9').hide();
			$('#label9').hide();
			$('#image8').hide();
			$('#label8').hide();
			$('#image7').hide();
			$('#label7').hide();
			$('#image6').hide();
			$('#label6').hide();
			$('#image5').hide();
			$('#label5').hide();
			$('#image4').hide();
			$('#label4').hide();
			$('#image3').show();
			$('#label3').show();
			$('#image2').hide();
			$('#label2').hide();
			$('#image1').hide();
			$('#label1').hide();
		}
		else if(value == 7)
		{
			$('#image9').hide();
			$('#label9').hide();
			$('#image8').hide();
			$('#label8').hide();
			$('#image7').hide();
			$('#label7').hide();
			$('#image6').hide();
			$('#label6').hide();
			$('#image5').hide();
			$('#label5').hide();
			$('#image4').show();
			$('#label4').show();
			$('#image3').hide();
			$('#label3').hide();
			$('#image2').hide();
			$('#label2').hide();
			$('#image1').hide();
			$('#label1').hide();
		}
		else if(value == 4)
		{
			$('#image9').hide();
			$('#label9').hide();
			$('#image8').hide();
			$('#label8').hide();
			$('#image7').hide();
			$('#label7').hide();
			$('#image6').hide();
			$('#label6').hide();
			$('#image5').show();
			$('#label5').show();
			$('#image4').hide();
			$('#label4').hide();
			$('#image3').hide();
			$('#label3').hide();
			$('#image2').hide();
			$('#label2').hide();
			$('#image1').hide();
			$('#label1').hide();
		}
		else if(value == 9)
		{
			$('#image9').hide();
			$('#label9').hide();
			$('#image8').hide();
			$('#label8').hide();
			$('#image7').hide();
			$('#label7').hide();
			$('#image6').show();
			$('#label6').show();
			$('#image5').hide();
			$('#label5').hide();
			$('#image4').hide();
			$('#label4').hide();
			$('#image3').hide();
			$('#label3').hide();
			$('#image2').hide();
			$('#label2').hide();
			$('#image1').hide();
			$('#label1').hide();
		}
		else if(value == 3)
		{
			$('#image9').hide();
			$('#label9').hide();
			$('#image8').hide();
			$('#label8').hide();
			$('#image7').show();
			$('#label7').show();
			$('#image6').hide();
			$('#label6').hide();
			$('#image5').hide();
			$('#label5').hide();
			$('#image4').hide();
			$('#label4').hide();
			$('#image3').hide();
			$('#label3').hide();
			$('#image2').hide();
			$('#label2').hide();
			$('#image1').hide();
			$('#label1').hide();
		}
		else if(value == 5)
		{
			$('#image9').hide();
			$('#label9').hide();
			$('#image8').show();
			$('#label8').show();
			$('#image7').hide();
			$('#label7').hide();
			$('#image6').hide();
			$('#label6').hide();
			$('#image5').hide();
			$('#label5').hide();
			$('#image4').hide();
			$('#label4').hide();
			$('#image3').hide();
			$('#label3').hide();
			$('#image2').hide();
			$('#label2').hide();
			$('#image1').hide();
			$('#label1').hide();
		}
		else if(value == 6)
		{
			$('#image9').show();
			$('#label9').show();
			$('#image8').hide();
			$('#label8').hide();
			$('#image7').hide();
			$('#label7').hide();
			$('#image6').hide();
			$('#label6').hide();
			$('#image5').hide();
			$('#label5').hide();
			$('#image4').hide();
			$('#label4').hide();
			$('#image3').hide();
			$('#label3').hide();
			$('#image2').hide();
			$('#label2').hide();
			$('#image1').hide();
			$('#label1').hide();
		}


  $('#showoption').html(value);
});
</script>
