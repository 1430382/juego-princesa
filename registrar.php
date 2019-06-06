<?php
include 'backend/conexion.php';
$usuario = $_SESSION['nombre'];
echo "<h2>" . $usuario . "</h2>";
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
	var_dump($fantasma);
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
/////////////Eliminar
if(isset($_POST['eliminar'])){
$query = "DELETE FROM JUGADORES WHERE matricula='".$matricula."' ";
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
/////////////Eliminar
if(isset($_POST['eliminarI'])){
$query = "DELETE FROM ITEMS WHERE nombre='".$nombre."' ";
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
	var_dump($hechizo);
	var_dump($descripcion);
	var_dump($recompensa);
	var_dump($fecha);
	var_dump($users);

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
/////////////Eliminar
if(isset($_POST['eliminarH'])){
$query = "DELETE FROM MISIONES WHERE nombre='".$hechizo."' ";
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
	<?php include "header.php" ?>

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
					<section>
						<div class="mbox-style">

							<form class="center" id="form-margins" method="post">
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
									<button class="button button1" type="submit" name="registrar" >Registrar jugador</button>
									<button class="button button1" type="submit" name="modificar" >Modificar jugador</button>
									<button class="button button1" type="submit" name="eliminar" >Eliminar jugador</button>

							</form>
						</div>
					</section>
				</div>
			</div>
<!--   ITEMS
------------------->
			<div class="col-sm">
			 	<h1 class="center-text">ITEMS</h1>
				<div class="col-sm" id="marketing">
					<section>
						<div class="mbox-style">
							<form class="center" id="form-margins" method="post">
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
								<button class="button button1" type="submit" name="registrarI" >Registrar item</button>
								<button class="button button1" type="submit" name="eliminarI" >Eliminar item</button>
							</form>
						</div>
					</section>
				</div>
			</div>
<!--- hechizos---->
			<div class="col-sm">
				<h1 class="center-text">HECHIZOS</h1>
				<div class="col-sm" id="marketing">
					<section>
						<div class="mbox-style">
							<form class="center" id="form-margins" method="post">
								<div class="form-group">
									<input type="text" class="form-control" name="hechizo" id="hechizo" placeholder="Nombre del hechizo">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción del hechizo">
								</div>
								<div class="form-group">
									<div class="form-group">
										<input type="text" class="form-control" name="recompensa" id="recompensa" placeholder="Recompensa">
										<label for="exampleFormControlSelect1">Ingrese la fecha limite</label> <br>
										<input type="date" name="fecha" id="fecha">
									</div>
							<!--		<label for="exampleFormControlSelect1">Categoría</label>
									<select class="form-control" name="categoria" id="categoria">
										<option>Misión</option>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Valor (en puntos de salud)</label>
									<input type="number" id="vida" name="vida" min="1" max="100" placeholder="Valor" style="margin-left: 1em;">
								</div>-->
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
								<button class="button button1" type="submit" name="registrarH" >Registrar hechizo</button>
								<button class="button button1" type="submit" name="eliminarH" >Eliminar hechizo</button>
							</form>
						</div>
					</section>
				</div>
			</div>

		</div>
	</div>

	<div class="bottom-right" >
		<a href="reglas.php">
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
