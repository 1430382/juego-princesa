<?php
include 'backend/conexion.php';
if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}
if($_SESSION['rol']==0){
	header("location: login.php");
}
$usuario = $_SESSION['usuario'];
$rol=$_SESSION['id_rol'];
//var_dump($usuario);
///////


/////////
$matricula='';
$nombre='';
$apellidos='';
$equipo='';
$genero='';
$vida=0;
$fantasma=0;
///// VALIDATE THE POST
if(isset($_POST['matricula'])){
	 $matricula=$_POST['matricula'];
}
if(isset($_POST['nombre'])){
	 $nombre=$_POST['nombre'];
}
if(isset($_POST['apellidos'])){
	 $apellidos=$_POST['apellidos'];
}
if(isset($_POST['equipo'])){
	 $equipo=$_POST['equipo'];
 }
if(isset($_POST['genero'])){
	 $genero=$_POST['genero'];
 }
if(isset($_POST['vida'])){
	 $vida=$_POST['vida'];
}
if(isset($_POST['fantasma'])){
 	 $fantasma=$_POST['fantasma'];
}
//////////////REGISTRAR
if(isset($_POST['registrar'])){
	//var_dump($fantasma);
	 $query = "INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma) VALUES ('".$matricula."','".$nombre."','".$apellidos."','".$equipo."','".$genero."','".$vida."','".$fantasma."')";
	if($con ->query($query)== TRUE){
		echo"<div class='alert alert-success alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
		<strong>Exitoso!</strong> La tarea se ha guardado correctamente.
	</div>";

	}else{
		echo "<div class='alert alert-danger alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
		<strong>Problema!</strong> No se pudo guardar la tarea, vuelva a intentar.
		</div>";
			}
	$con->close();
//   }

}
/////MODIFICAR
if(isset($_POST['modificar'])){
$query = "UPDATE JUGADORES SET matricula='".$matricula."', nombre='".$nombre."', apellidos='".$apellidos."',equipo='".$equipo."', genero='".$genero."',vida='".$vida."',fantasma='".$fantasma."' WHERE matricula='".$matricula."' ";
if($con ->query($query)== TRUE){
	echo"<div class='alert alert-success alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Exitoso!</strong> El producto se ha modificado correctamente.
	</div>";

}else{
	echo "<div class='alert alert-danger alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Problema!</strong> No se pudo modificar el producto, vuelva a intentar.
	</div>";

}
	$con->close();
}
if(isset($_POST['users'])){
	$users=$_POST['users'];
}
/////////////Eliminar
if(isset($_POST['eliminar'])){
$query = "DELETE FROM JUGADORES WHERE idjugadores='".$users."' ";
if($con ->query($query)== TRUE){
	echo"<div class='alert alert-success alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Exitoso!</strong> El producto se ha eliminado correctamente.
	</div>";

}else{
	echo "<div class='alert alert-danger alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Problema!</strong> No se pudo eliminar el producto, vuelva a intentar.
	</div>";

}
//var_dump($users);
$con->close();
}
///
$categoria='';
$tipo='';
if(isset($_POST['categoria'])){
	 $categoria=$_POST['categoria'];
}
if(isset($_POST['tipo'])){
 	 $tipo=$_POST['tipo'];
}
////REGISTRAR ITEM
if(isset($_POST['registrarI'])){
$query = "INSERT INTO ITEMS (nombre,categoria,tipo,precio) VALUES ('".$nombre."','".$categoria."','".$tipo."','".$vida."')";
if($con ->query($query)== TRUE){
	echo"<div class='alert alert-success alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Exitoso!</strong> La tarea se ha guardado correctamente.
	</div>";

}else{
	echo "<div class='alert alert-danger alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Problema!</strong> No se pudo guardar la tarea, vuelva a intentar.
	</div>";
}
$con->close();
//   }

}
///
if(isset($_POST['users'])){
	$users=$_POST['users'];
}
/////////////Eliminar
if(isset($_POST['eliminarI'])){
$query = "DELETE FROM ITEMS WHERE iditems='".$users."' ";
if($con ->query($query)== TRUE){
	echo"<div class='alert alert-success alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Exitoso!</strong> El producto se ha eliminado correctamente.
	</div>";

}else{
	echo "<div class='alert alert-danger alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Problema!</strong> No se pudo eliminar el producto, vuelva a intentar.
	</div>";

}
$con->close();
}
$idusuarios=0;
$hechizo='';
$descripcion='';
$recompensa='';
//$fecha="";

//echo $fecha;

if(isset($_POST['hechizo'])){
	 $hechizo=$_POST['hechizo'];
}
if(isset($_POST['descripcion'])){
	 $descripcion=$_POST['descripcion'];
}
if(isset($_POST['recompensa'])){
	 $recompensa=$_POST['recompensa'];
}
$fecha = date('Y-m-d', strtotime($_POST['fecha']));
if(isset($_POST['users'])){
	$users=$_POST['users'];
}

/*======================================================================== */
//////HECHIZOS
if(isset($_POST['registrarH'])){
$query = "INSERT INTO `MISIONES` (nombre,descripcion,recompensa,fecha,idjugadores) VALUES ('".$hechizo."','".$descripcion."','".$recompensa."','".$fecha."','".$users."')";
if($con ->query($query)== TRUE){
	echo"<div class='alert alert-success alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Exitoso!</strong> La tarea se ha guardado correctamente.
	</div>";

}else{
	echo "<div class='alert alert-danger alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Problema!</strong> No se pudo guardar la tarea, vuelva a intentar.
	</div>";
}

$con->close();
//   }

}
///
if(isset($_POST['users'])){
	$users=$_POST['users'];
}
/////////////Eliminar
if(isset($_POST['eliminarH'])){
$query = "DELETE FROM MISIONES WHERE id='".$users."' ";
if($con ->query($query)== TRUE){
	echo"<div class='alert alert-success alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Exitoso!</strong> El producto se ha eliminado correctamente.
	</div>";

}else{
	echo "<div class='alert alert-danger alert-dismissable'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
	<strong>Problema!</strong> No se pudo eliminar el producto, vuelva a intentar.
	</div>";
}
$con->close();
}
///

 ?>

 <script type="text/javascript">

 function validate()
 {
     //Se declaran variables
     var matricula = document.forms["form-margins"]["matricula"];
     var nombre = document.forms["form-margins"]["nombre"];
     var apellidos = document.forms["form-margins"]["apellidos"];
     var vida = document.forms["form-margins"]["vida"];
     //Luego se verifica con un if cada variable
     if (matricula.value == "")
     {
         window.alert("Introduzca una matricula.");
         matricula.focus();
         return false;
     }
     if (nombre.value == "")
     {
         window.alert("Introduzca un nombre.");
         nombre.focus();
         return false;
     }
     if (vida.value == "")
     {
         window.alert("Introduzca los puntos de vida.");
         vida.focus();
         return false;
     }

     return true;
 }
 //
 function validate1()
 {
     //Se declaran variables
     var nombre = document.forms["itemsvalidate"]["nombre"];
     var vida = document.forms["itemsvalidate"]["vida"];
     //Luego se verifica con un if cada variable
     if (nombre.value == "")
     {
         window.alert("Introduzca un nombre.");
         nombre.focus();
         return false;
     }
     if (vida.value == "")
     {
         window.alert("Introduzca los puntos de vida.");
         vida.focus();
         return false;
     }

     return true;
 }
 //
 function validate2()
 {
     //Se declaran variables
     var hechizo = document.forms["hechizosvalidate"]["hechizo"];
     var descripcion = document.forms["hechizosvalidate"]["descripcion"];
     var recompensa = document.forms["hechizosvalidate"]["recompensa"];
     var fecha = document.forms["hechizosvalidate"]["fecha"];
     //Luego se verifica con un if cada variable
     if (hechizo.value == "")
     {
         window.alert("Introduzca un nombre.");
         hechizo.focus();
         return false;
     }
     if (descripcion.value == "")
     {
         window.alert("Introduzca una descripcion.");
         descripcion.focus();
         return false;
     }
     if (recompensa.value == "")
     {
         window.alert("Introduzca los puntos de recompensa.");
         recompensa.focus();
         return false;
     }
     if (fecha.value == "")
     {
         window.alert("Introduzca una fecha valida.");
         fecha.focus();
         return false;
     }
     return true;
 }
 </script>

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

	<title>Registrar</title>
</head>

<body style="background-image: url(img/background-registrar.jpg);">
	<!---
	  HEADER
	   -------------->
	<?php include "header.admin.php" ?>


	<body onload="load()">

	<script type="text/javascript">
	  function Mostrar_Ocultar1(){
	    var caja = document.getElementById("caja1");
	    if(caja.style.display == "none"){
	      document.getElementById("caja1").style.display = "block";
	      document.getElementById("caja2").style.display = "none";
	      document.getElementById("caja3").style.display = "none";
	      document.getElementById("caja4").style.display = "none";
	      document.getElementById("caja5").style.display = "none";
	      document.getElementById("caja6").style.display = "none";
	      document.getElementById("caja7").style.display = "none";
	      document.getElementById("caja8").style.display = "none";
	      document.getElementById("caja9").style.display = "none";
	    }else{
	      document.getElementById("caja1").style.display = "none";

	    }
	  }
	  function Mostrar_Ocultar2(){
	    var caja = document.getElementById("caja2");
	    if(caja.style.display == "none"){
	      document.getElementById("caja2").style.display = "block";
	      document.getElementById("caja1").style.display = "none";
	      document.getElementById("caja3").style.display = "none";
	      document.getElementById("caja4").style.display = "none";
	      document.getElementById("caja5").style.display = "none";
	      document.getElementById("caja6").style.display = "none";
	      document.getElementById("caja7").style.display = "none";
	      document.getElementById("caja8").style.display = "none";
	      document.getElementById("caja9").style.display = "none";
	    }else{
	      document.getElementById("caja2").style.display = "none";
	    }
	  }
	  function Mostrar_Ocultar3(){
	    var caja = document.getElementById("caja3");
	    if(caja.style.display == "none"){
	      document.getElementById("caja3").style.display = "block";
	      document.getElementById("caja2").style.display = "none";
	      document.getElementById("caja1").style.display = "none";
	      document.getElementById("caja4").style.display = "none";
	      document.getElementById("caja5").style.display = "none";
	      document.getElementById("caja6").style.display = "none";
	      document.getElementById("caja7").style.display = "none";
	      document.getElementById("caja8").style.display = "none";
	      document.getElementById("caja9").style.display = "none";
	    }else{
	      document.getElementById("caja3").style.display = "none";
	    }
	  }
	  function Mostrar_Ocultar4(){
	    var caja = document.getElementById("caja4");
	    if(caja.style.display == "none"){
	      document.getElementById("caja4").style.display = "block";
	      document.getElementById("caja2").style.display = "none";
	      document.getElementById("caja3").style.display = "none";
	      document.getElementById("caja1").style.display = "none";
	      document.getElementById("caja5").style.display = "none";
	      document.getElementById("caja6").style.display = "none";
	      document.getElementById("caja7").style.display = "none";
	      document.getElementById("caja8").style.display = "none";
	      document.getElementById("caja9").style.display = "none";
	    }else{
	      document.getElementById("caja4").style.display = "none";
	    }
	  }
	  function Mostrar_Ocultar5(){
	    var caja = document.getElementById("caja5");
	    if(caja.style.display == "none"){
	      document.getElementById("caja5").style.display = "block";
	      document.getElementById("caja2").style.display = "none";
	      document.getElementById("caja3").style.display = "none";
	      document.getElementById("caja4").style.display = "none";
	      document.getElementById("caja1").style.display = "none";
	      document.getElementById("caja6").style.display = "none";
	      document.getElementById("caja7").style.display = "none";
	      document.getElementById("caja8").style.display = "none";
	      document.getElementById("caja9").style.display = "none";
	    }else{
	      document.getElementById("caja5").style.display = "none";
	    }
	  }
	  function Mostrar_Ocultar6(){
	    var caja = document.getElementById("caja6");
	    if(caja.style.display == "none"){
	      document.getElementById("caja6").style.display = "block";
	      document.getElementById("caja2").style.display = "none";
	      document.getElementById("caja3").style.display = "none";
	      document.getElementById("caja4").style.display = "none";
	      document.getElementById("caja5").style.display = "none";
	      document.getElementById("caja1").style.display = "none";
	      document.getElementById("caja7").style.display = "none";
	      document.getElementById("caja8").style.display = "none";
	      document.getElementById("caja9").style.display = "none";
	    }else{
	      document.getElementById("caja6").style.display = "none";
	    }
	  }
	  function Mostrar_Ocultar7(){
	    var caja = document.getElementById("caja7");
	    if(caja.style.display == "none"){
	      document.getElementById("caja7").style.display = "block";
	      document.getElementById("caja2").style.display = "none";
	      document.getElementById("caja3").style.display = "none";
	      document.getElementById("caja4").style.display = "none";
	      document.getElementById("caja5").style.display = "none";
	      document.getElementById("caja6").style.display = "none";
	      document.getElementById("caja1").style.display = "none";
	      document.getElementById("caja8").style.display = "none";
	      document.getElementById("caja9").style.display = "none";
	    }else{
	      document.getElementById("caja7").style.display = "none";
	    }
	  }
    function Mostrar_Ocultar8(){
	    var caja = document.getElementById("caja8");
	    if(caja.style.display == "none"){
	      document.getElementById("caja8").style.display = "block";
	      document.getElementById("caja2").style.display = "none";
	      document.getElementById("caja3").style.display = "none";
	      document.getElementById("caja1").style.display = "none";
	      document.getElementById("caja5").style.display = "none";
	      document.getElementById("caja6").style.display = "none";
	      document.getElementById("caja7").style.display = "none";
	      document.getElementById("caja4").style.display = "none";
	      document.getElementById("caja9").style.display = "none";
	    }else{
	      document.getElementById("caja8").style.display = "none";
	    }
	  }
	  function Mostrar_Ocultar9(){
	    var caja = document.getElementById("caja9");
	    if(caja.style.display == "none"){
	      document.getElementById("caja9").style.display = "block";
	      document.getElementById("caja2").style.display = "none";
	      document.getElementById("caja3").style.display = "none";
	      document.getElementById("caja4").style.display = "none";
	      document.getElementById("caja5").style.display = "none";
	      document.getElementById("caja6").style.display = "none";
	      document.getElementById("caja7").style.display = "none";
	      document.getElementById("caja8").style.display = "none";
	      document.getElementById("caja1").style.display = "none";
	    }else{
	      document.getElementById("caja9").style.display = "none";
	    }
	  }
	</script>
	<style>
	.button {
	  background-color: #4CAF50; /* Green */
	  border: none;
	  color: white;
	  padding: 10px 32px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;
	  margin: 4px 2px;
	  cursor: pointer;
	}
	.button1 {background-color: #e7e7e7; color: white;} /* Gray */
	</style>

	<div class="container">
		<div class="row">

			<div class="col-sm">
				<h1 class="center-text">JUGADORES</h1>
				<div class="col-sm" id="marketing" >
				<section id="caja1" style="display: none;">
						<div class="mbox-style">

							<form class="center" id="form-margins" method="post" onsubmit="return validate()">
								<div class="form-group">
									<input type="text" class="form-control" name="matricula" id="matricula" placeholder="Matrícula">
									<small id="emailHelp" class="form-text text-muted">Procure escribir su matrícula correctamente.</small>
								</div>

								<div class="form-row" style="padding-bottom: 1em;">
									<div class="col">
										<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de pila">
									</div>

									<div class="col">
										<input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos">
									</div>
								</div>

								<div class="form-group">
									<label for="exampleFormControlSelect1">Equipo</label>
									<select name="equipo" class="form-control" id="equipo">
										<option>Equipo 1</option>
										<option>Equipo 2</option>
										<option>Equipo 3</option>
										<option>Equipo 4</option>
										<option>Equipo 5</option>
										<option>Equipo 6</option>
										<option>Equipo 7</option>
									</select>
								</div>

								<fieldset class="form-group">
									<div class="row">
										<legend class="col-form-label col-sm-2 pt-0">Género</legend>
										<div class="col-sm-10">
											<div class="form-check" style="margin-left: 1.25em;">
												<input class="form-check-input" type="radio" name="genero" id="genero" value="hombre" checked>
												<label class="form-check-label" for="genero">
													Hombre
												</label>
											</div>
											<div class="form-check" style="margin-left: 1.25em;">
												<input class="form-check-input" type="radio" name="genero" id="genero" value="mujer">
												<label class="form-check-label" for="genero">
													Mujer
												</label>
											</div>
										</div>
									</div>
								</fieldset>
								<div class="form-group">
									<label for="exampleInputEmail1">Puntos de salud</label>
									<input type="number" id="vida" name="vida" min="1" max="100" placeholder="PS" style="margin-left: 1em;">
								</div>

								<div class="form-check">
									<input class="form-check-input" type="radio" name="fantasma" id="fantasma" value="1">
									<label class="form-check-label" for="exampleCheck1">Fantasma</label>
								</div>
									<button class="button button1" type="submit" name="registrar" >Hecho</button>


							</form>


						</div>
					</section>
					<!-- --->
					<section id="caja2" style="display: none;">
							<div class="mbox-style">

								<form class="center" id="form-margins" method="post" onsubmit="return validate()">
									<div class="form-group">
										<input type="text" class="form-control" name="matricula" id="matricula" placeholder="Matrícula">
										<small id="emailHelp" class="form-text text-muted">Procure escribir su matrícula correctamente.</small>
									</div>

									<div class="form-row" style="padding-bottom: 1em;">
										<div class="col">
											<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de pila">
										</div>

										<div class="col">
											<input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos">
										</div>
									</div>

									<div class="form-group">
										<label for="exampleFormControlSelect1">Equipo</label>
										<select name="equipo" class="form-control" id="equipo">
											<option>Equipo 1</option>
											<option>Equipo 2</option>
											<option>Equipo 3</option>
											<option>Equipo 4</option>
											<option>Equipo 5</option>
											<option>Equipo 6</option>
											<option>Equipo 7</option>
										</select>
									</div>

									<fieldset class="form-group">
										<div class="row">
											<legend class="col-form-label col-sm-2 pt-0">Género</legend>
											<div class="col-sm-10">
												<div class="form-check" style="margin-left: 1.25em;">
													<input class="form-check-input" type="radio" name="genero" id="genero" value="hombre" checked>
													<label class="form-check-label" for="genero">
														Hombre
													</label>
												</div>
												<div class="form-check" style="margin-left: 1.25em;">
													<input class="form-check-input" type="radio" name="genero" id="genero" value="mujer">
													<label class="form-check-label" for="genero">
														Mujer
													</label>
												</div>
											</div>
										</div>
									</fieldset>
									<div class="form-group">
										<label for="exampleInputEmail1">Puntos de salud</label>
										<input type="number" id="vida" name="vida" min="1" max="100" placeholder="PS" style="margin-left: 1em;">
									</div>

									<div class="form-check">
										<input class="form-check-input" type="radio" name="fantasma" id="fantasma" value="1">
										<label class="form-check-label" for="exampleCheck1">Fantasma</label>
									</div>
										<button class="button button1" type="submit" name="modificar" >Hecho</button>


								</form>


							</div>
						</section>
					<!--

					 --->
					 <section id="caja3" style="display: none;">
							 <div class="mbox-style">

								 <form class="center" id="form-margins" method="post">
									 <div class="form-group">
										 <select name="users" id="users">
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
									 </div>


										 <button class="button button1" type="submit" name="eliminar" >Hecho</button>


								 </form>


							 </div>
						 </section>
					 <!--

						--->
					<button class="button button1" onclick="Mostrar_Ocultar1()" >Registrar jugador</button>
					<button class="button button1" onclick="Mostrar_Ocultar1()" >Modificar jugador</button>
					<button class="button button1" onclick="Mostrar_Ocultar3()" >Eliminar jugador</button>
				</div>
			</div>

<!--                ---->

<!--   ITEMS
------------------->
			<div class="col-sm">
			 	<h1 class="center-text">ITEMS</h1>
				<div class="col-sm" id="marketing">
					<section id="caja4" style="display: none;">
						<div class="mbox-style">
							<form class="center" id="form-margins" name="itemsvalidate" method="post" onsubmit="return validate1()">
								<div class="form-group">
									<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del item">
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">Categoría</label>
									<select class="form-control" name="categoria" id="categoria">
										<option>Item</option>
										<option>Maldición</option>
									</select>
								</div>
								<fieldset class="form-group">
									<div class="row">
										<legend class="col-form-label col-sm-2 pt-0">Tipo</legend>
										<div class="col-sm-10">
											<div class="form-check" style="margin-left: 1.25em;">
												<input class="form-check-input" type="radio" name="tipo" id="tipo" value="colectivo" checked>
												<label class="form-check-label" for="gridRadios1">
													Colectivo
												</label>
											</div>
											<div class="form-check" style="margin-left: 1.25em;">
												<input class="form-check-input" type="radio" name="tipo" id="tipo" value="individual">
												<label class="form-check-label" for="gridRadios2">
													Individual
												</label>
											</div>
										</div>
									</div>
								</fieldset>
								<div class="form-group">
									<label for="exampleInputEmail1">Precio</label>
									<input type="number" id="vida" name="vida" min="1" max="100" placeholder="Precio del hechizo" style="margin-left: 1em;">
								</div>
								<button class="button button1" type="submit" name="registrarI" >Hecho</button>
							</form>
						</div>
					</section>
					<!-- --->
					<section id="caja5" style="display: none;">
						<div class="mbox-style">
							<form class="center" id="form-margins" method="post">
								<div class="form-group">
									<select name="users" id="users">
							 <?php
								 $res="select iditems,CONCAT(nombre,' ',categoria,' ') as JUGADORES FROM ITEMS;";
								 $res=$con->query($res);
								 while ($row = $res->fetch_array()) {
									 ?>
									 <option value="<?php echo $row['iditems'];?>">
									 <?php echo $row['JUGADORES'];?>
									 </option>
									 <?php
								 }
							 ?>

			 </select>
		 					</div>
								<button class="button button1" type="submit" name="eliminarI" >Hecho</button>
							</form>
						</div>
					</section>

					<button class="button button1" onclick="Mostrar_Ocultar4()" >Registrar item</button>
					<button class="button button1" onclick="Mostrar_Ocultar5()" >Eliminar item</button>


				</div>
			</div>
<!--- hechizos---->
			<div class="col-sm">
				<h1 class="center-text">HECHIZOS</h1>
				<div class="col-sm" id="marketing">
					<section id="caja7" style="display: none;">
						<div class="mbox-style">
							<form class="center" id="form-margins" name="hechizosvalidate" method="post" onsubmit="return validate2()">
								<div class="form-group">
									<input type="text" class="form-control" name="hechizo" id="hechizo" placeholder="Nombre del hechizo">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción del hechizo">
								</div>
									<div class="form-group">
										<input type="text" class="form-control" name="recompensa" id="recompensa" placeholder="Recompensa">
										<label for="exampleFormControlSelect1">Ingrese la fecha limite</label> <br>
										<input type="date" name="fecha" id="fecha">
									</div>
								<select name="users" id="users">
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
              <button class="button button1" type="submit" name="registrarH" >Hecho</button>
							</form>
						</div>
					</section>


					<!--- --->

					<section id="caja8" style="display: none;">
						<div class="mbox-style">
							<form class="center" id="form-margins" method="post">
								<div class="form-group">
									<select name="users" id="users">
							 <?php
								 $res="select id,CONCAT(nombre,' ',descripcion,' ') as JUGADORES FROM MISIONES;";
								 $res=$con->query($res);
								 while ($row = $res->fetch_array()) {
									 ?>
									 <option value="<?php echo $row['id'];?>">
									 <?php echo $row['JUGADORES'];?>
									 </option>
									 <?php
								 }
							 ?>

			 </select>
		 </div>
			</select>
            <button class="button button1" type="submit" name="eliminarH" >Hecho</button>
							</form>
						</div>
					</section>
					<button class="button button1" onclick="Mostrar_Ocultar7()" >Registrar hechizo</button>
					<button class="button button1" onclick="Mostrar_Ocultar8()" >Eliminar hechizo</button>
				</div>
		</div>


	<div class="bottom-right" >
		<a href="reglas.admin.php">
			<img src="img/book.png" alt="Reglas del juego" class="center" id="navbar-img">
			<h1 class="center-text">Reglas</h1>
		</a>
	</div>

	<!-- JS FILES -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<div style="color:white;margin-top:auto; margin-left:auto;">
<a href="logout.php">
    <img src="img/exit.png" class="center" id="navbar-img" >
    <h1 class="center-text">Atras</h1>
  </a>
</div>
