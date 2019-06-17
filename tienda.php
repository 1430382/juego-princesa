<?php
// Permite mostrar los errores
error_reporting(E_ALL);
//ini_set('display_errors', '1');
if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}
if($_SESSION['rol']==0){
	header("location: login.php");
}
// Inicia la sesión, necesario para usar las utilidades de SESSION
session_start();
// Se incluye el archivo con la clase Database
include ("backend/conexion.php");
/////////
///
$idjugador=$_SESSION['idjugador'];
//echo $idjugador;
//$objeto='';
$objeto = $_COOKIE['profile_viewer_uid'];
//
date_default_timezone_set("America/Monterrey");
$fechactual=date('y-m-d');
$fechactual=date('Y-m-d', strtotime($fechactual));
$fechahechizo=date('Y-m-d', strtotime($fechactual. ' + 7 days'));
//var_dump($fechahechizo);
//
///// VALIDATE THE POST
if(isset($_POST['users'])){
	$users=$_POST['users'];
}
//
$nombre=$_SESSION['nombre'];
$apellidos=$_SESSION['apellidos'];
$idjugadores=$_SESSION['$idjugadores'];
$vida=$_SESSION['$vida'];
$equipo=$_SESSION['$equipo'];
$fantasma=$_SESSION['$fantasma'];
$matricula=$_SESSION['$matricula'];
$idjugadores=$_SESSION['idjugador'];
//




////////
if(isset($_POST['registrar'])){
	//echo($objeto);
	 $query = "INSERT INTO INVENTARIO_ITEMS (idjugadores,iditems) VALUES ('".$idjugador."','".$objeto."')";

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
ON JUGADORES.idjugadores='$idjugador'
INNER JOIN ITEMS ON ITEMS.iditems = INVENTARIO_ITEMS.iditems where INVENTARIO_ITEMS.idjugadores=JUGADORES.idjugadores"))) {
		}else{
			/*E imprimimos el resultado para ver que el ejemplo ha funcionado*/
			if($row = $res->fetch_assoc()){
				$_SESSION['iditems']=$row['iditems'];
				$iditems=$_SESSION['iditems'];
        //var_dump($iditems);
				$_SESSION['equipo']=$row['equipo'];
        $equipo=$_SESSION['equipo'];
        //var_dump($equipo);
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
      $iditems=$row['iditems'];
			if (!$con->query("UPDATE JUGADORES SET vida=vida-10  WHERE idjugadores='$idjugador'"))
				{
					echo"<div class='alert alert-success alert-dismissable'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
					<strong>Exitoso!</strong> El objeto se a utilizado correctamente.
				</div>";
				}
         $fechahechizo=date('Y-m-d', strtotime($fechactual. ' + 7 days'));
        $cox=mysqli_connect("localhost","root","","test") or die("Error in connection");
        $query = mysqli_query($cox,"UPDATE ITEMS SET fecha='".$fechahechizo."' WHERE iditems='$iditems'");
				}
				else if($row['iditems']==8)
				{
          $iditems=$row['iditems'];
					if (!$con->query("UPDATE JUGADORES SET vida=vida-10  WHERE equipo='$equipo'"))
						{
							echo"<div class='alert alert-success alert-dismissable'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
							<strong>Exitoso!</strong> El objeto se a utilizado correctamente.
						</div>";
						}
             $fechahechizo=date('Y-m-d', strtotime($fechactual. ' + 7 days'));
            var_dump($fechahechizo);
            $cox=mysqli_connect("localhost","root","","test") or die("Error in connection");
            $query = mysqli_query($cox,"UPDATE ITEMS SET fecha='".$fechahechizo."' WHERE iditems='$iditems'");
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

 <script type="text/javascript">
 function agregaform(itemid){

 if(itemid == 1){
   var nameitem = "Muerte prematura";
   document.cookie="profile_viewer_uid=1";
	 //window.location.href="tienda.php?uid=1";

 }
 if(itemid == 2){
   var nameitem = "Lagrimas de amigos";
   document.cookie="profile_viewer_uid=2";
	 //window.location.href="tienda.php?uid=2";
 }
 if(itemid == 3){
   var nameitem = "Reloj de arena";
   document.cookie="profile_viewer_uid=3";
	 //window.location.href="tienda.php?uid=3";
 }
 if(itemid == 4){
   var nameitem = "Clon de sombra";
   document.cookie="profile_viewer_uid=4";
	 //window.location.href="tienda.php?uid=4";
 }
 if(itemid == 5){
   var nameitem = "Teletransportación menor";
   document.cookie="profile_viewer_uid=5";
	 //window.location.href="tienda.php?uid=5";
 }
 if(itemid == 6){
   var nameitem = "Teletransportación mayor";
   document.cookie="profile_viewer_uid=6";
	 //window.location.href="tienda.php?uid=6";
 }
 if(itemid == 7){
   var nameitem = "Veneno menor";
   document.cookie="profile_viewer_uid=7";
	 //window.location.href="tienda.php?uid=7";
 }
 if(itemid == 8){
   var nameitem = "Veneno medio";
   document.cookie="profile_viewer_uid=8";
	 //window.location.href="tienda.php?uid=8";
 }
 if(itemid == 9){
   var nameitem = "Tortura simple";
   document.cookie="profile_viewer_uid=9";
	 //window.location.href="tienda.php?uid=9";
 }

 if(itemid <= 6)
 document.getElementById("title").innerHTML="Comprar item "+ nameitem;

 document.getElementById("nombreu").value= nameitem;
 if(itemid > 6)
 document.getElementById("title").innerHTML="Comprar maldición "+nameitem;

 document.getElementById("nombreu").value=nameitem;
 }


 //Muerte prematura
 	function item1(){
 		var nameitem = "Muerte prematura";
 		var item = document.getElementById("item1");
     	if(item.style.display == "none"){
 			document.getElementById("item1").style.display = "block";
 			document.getElementById("a").style.display = "block";
 			document.getElementById("item2").style.display="none";
 			document.getElementById("b").style.display = "none";
 			document.getElementById("item3").style.display="none";
 			document.getElementById("c").style.display = "none";
 			document.getElementById("item4").style.display="none";
 			document.getElementById("d").style.display = "none";
 			document.getElementById("item5").style.display="none";
 			document.getElementById("e").style.display = "none";
 			document.getElementById("item6").style.display="none";
 			document.getElementById("f").style.display = "none";
 			document.getElementById("item7").style.display="none";
 			document.getElementById("g").style.display = "none";
 			document.getElementById("item8").style.display="none";
 			document.getElementById("h").style.display = "none";
 			document.getElementById("item9").style.display="none";
 			document.getElementById("i").style.display = "none";
     	}else{
       		document.getElementById("item1").style.display = "none";
 			document.getElementById("a").style.display = "none";
 		}
 	}

 	//Lagrima de amigos
 	function item2(){
 		var nameitem = "Lagrimas de amigos";
 		var item=document.getElementById("item2");
 		if(item.style.display=="none"){
 			document.getElementById("item1").style.display = "none";
 			document.getElementById("a").style.display = "none";
 			document.getElementById("item2").style.display="block";
 			document.getElementById("b").style.display = "block";
 			document.getElementById("item3").style.display="none";
 			document.getElementById("c").style.display = "none";
 			document.getElementById("item4").style.display="none";
 			document.getElementById("d").style.display = "none";
 			document.getElementById("item5").style.display="none";
 			document.getElementById("e").style.display = "none";
 			document.getElementById("item6").style.display="none";
 			document.getElementById("f").style.display = "none";
 			document.getElementById("item7").style.display="none";
 			document.getElementById("g").style.display = "none";
 			document.getElementById("item8").style.display="none";
 			document.getElementById("h").style.display = "none";
 			document.getElementById("item9").style.display="none";
 			document.getElementById("i").style.display = "none";
 		}else{
 			document.getElementById("item2").style.display="none";
 			document.getElementById("b").style.display="none";
 		}
 	}

 	//Reloj de arena
 	function item3(){
 		var nameitem = "Reloj de arena";
 		var item=document.getElementById("item3");
 		if(item.style.display=="none"){
 			document.getElementById("item1").style.display = "none";
 			document.getElementById("a").style.display = "none";
 			document.getElementById("item2").style.display="none";
 			document.getElementById("b").style.display = "none";
 			document.getElementById("item3").style.display="block";
 			document.getElementById("c").style.display = "block";
 			document.getElementById("item4").style.display="none";
 			document.getElementById("d").style.display = "none";
 			document.getElementById("item5").style.display="none";
 			document.getElementById("e").style.display = "none";
 			document.getElementById("item6").style.display="none";
 			document.getElementById("f").style.display = "none";
 			document.getElementById("item7").style.display="none";
 			document.getElementById("g").style.display = "none";
 			document.getElementById("item8").style.display="none";
 			document.getElementById("h").style.display = "none";
 			document.getElementById("item9").style.display="none";
 			document.getElementById("i").style.display = "none";
 		}else{
 			document.getElementById("item3").style.display="none";
 			document.getElementById("c").style.display="none";
 		}
 	}

 	//Clon de sombra
 	function item4(){
 		var nameitem = "Clon de sombra";
 		var item=document.getElementById("item4");
 		if(item.style.display=="none"){
 			document.getElementById("item1").style.display = "none";
 			document.getElementById("a").style.display = "none";
 			document.getElementById("item2").style.display="none";
 			document.getElementById("b").style.display = "none";
 			document.getElementById("item3").style.display="none";
 			document.getElementById("c").style.display = "none";
 			document.getElementById("item4").style.display="block";
 			document.getElementById("d").style.display = "block";
 			document.getElementById("item5").style.display="none";
 			document.getElementById("e").style.display = "none";
 			document.getElementById("item6").style.display="none";
 			document.getElementById("f").style.display = "none";
 			document.getElementById("item7").style.display="none";
 			document.getElementById("g").style.display = "none";
 			document.getElementById("item8").style.display="none";
 			document.getElementById("h").style.display = "none";
 			document.getElementById("item9").style.display="none";
 			document.getElementById("i").style.display = "none";
 		}else{
 			document.getElementById("item4").style.display="none";
 			document.getElementById("d").style.display="none";
 		}
 	}

 	function item5(){
 		var nameitem = "Teletransportación menor";
 		var item=document.getElementById("item5");
 		if(item.style.display=="none"){
 			document.getElementById("item1").style.display = "none";
 			document.getElementById("a").style.display = "none";
 			document.getElementById("item2").style.display="none";
 			document.getElementById("b").style.display = "none";
 			document.getElementById("item3").style.display="none";
 			document.getElementById("c").style.display = "none";
 			document.getElementById("item4").style.display="none";
 			document.getElementById("d").style.display = "none";
 			document.getElementById("item5").style.display="block";
 			document.getElementById("e").style.display = "block";
 			document.getElementById("item6").style.display="none";
 			document.getElementById("f").style.display = "none";
 			document.getElementById("item7").style.display="none";
 			document.getElementById("g").style.display = "none";
 			document.getElementById("item8").style.display="none";
 			document.getElementById("h").style.display = "none";
 			document.getElementById("item9").style.display="none";
 			document.getElementById("i").style.display = "none";
 		}else{
 			document.getElementById("item5").style.display="none";
 			document.getElementById("e").style.display="none";
 		}
 	}

 	function item6(){
 		var nameitem = "Teletransportación mayor";
 		var item=document.getElementById("item6");
 		if(item.style.display=="none"){
 			document.getElementById("item1").style.display = "none";
 			document.getElementById("a").style.display = "none";
 			document.getElementById("item2").style.display="none";
 			document.getElementById("b").style.display = "none";
 			document.getElementById("item3").style.display="none";
 			document.getElementById("c").style.display = "none";
 			document.getElementById("item4").style.display="none";
 			document.getElementById("d").style.display = "none";
 			document.getElementById("item5").style.display="none";
 			document.getElementById("e").style.display = "none";
 			document.getElementById("item6").style.display="block";
 			document.getElementById("f").style.display = "block";
 			document.getElementById("item7").style.display="none";
 			document.getElementById("g").style.display = "none";
 			document.getElementById("item8").style.display="none";
 			document.getElementById("h").style.display = "none";
 			document.getElementById("item9").style.display="none";
 			document.getElementById("i").style.display = "none";
 		}else{
 			document.getElementById("item6").style.display="none";
 			document.getElementById("f").style.display="none";
 		}
 	}

 	function item7(){
 		var nameitem = "Veneno menor";
 		var item=document.getElementById("item7");
 		if(item.style.display=="none"){
 			document.getElementById("item1").style.display = "none";
 			document.getElementById("a").style.display = "none";
 			document.getElementById("item2").style.display="none";
 			document.getElementById("b").style.display = "none";
 			document.getElementById("item3").style.display="none";
 			document.getElementById("c").style.display = "noe";
 			document.getElementById("item4").style.display="none";
 			document.getElementById("d").style.display = "none";
 			document.getElementById("item5").style.display="none";
 			document.getElementById("e").style.display = "none";
 			document.getElementById("item6").style.display="none";
 			document.getElementById("f").style.display = "none";
 			document.getElementById("item7").style.display="block";
 			document.getElementById("g").style.display = "block";
 			document.getElementById("item8").style.display="none";
 			document.getElementById("h").style.display = "none";
 			document.getElementById("item9").style.display="none";
 			document.getElementById("i").style.display = "none";
 		}else{
 			document.getElementById("item7").style.display="none";
 			document.getElementById("g").style.display="none";
 		}
 	}

 	function item8(){
 		var nameitem = "Veneno medio";
 		var item=document.getElementById("item8");
 		if(item.style.display=="none"){
 			document.getElementById("item1").style.display = "none";
 			document.getElementById("a").style.display = "none";
 			document.getElementById("item2").style.display="none";
 			document.getElementById("b").style.display = "none";
 			document.getElementById("item3").style.display="none";
 			document.getElementById("c").style.display = "none";
 			document.getElementById("item4").style.display="none";
 			document.getElementById("d").style.display = "none";
 			document.getElementById("item5").style.display="none";
 			document.getElementById("e").style.display = "none";
 			document.getElementById("item6").style.display="none";
 			document.getElementById("f").style.display = "none";
 			document.getElementById("item7").style.display="none";
 			document.getElementById("g").style.display = "none";
 			document.getElementById("item8").style.display="block";
 			document.getElementById("h").style.display = "block";
 			document.getElementById("item9").style.display="none";
 			document.getElementById("i").style.display = "none";
 		}else{
 			document.getElementById("item8").style.display="none";
 			document.getElementById("h").style.display="none";
 		}
 	}

 	function item9(){
 		var nameitem = "Tortura simple";
 		var item=document.getElementById("item9");
 		if(item.style.display=="none"){
 			document.getElementById("item1").style.display = "none";
 			document.getElementById("a").style.display = "none";
 			document.getElementById("item2").style.display="none";
 			document.getElementById("b").style.display = "none";
 			document.getElementById("item3").style.display="none";
 			document.getElementById("c").style.display = "none";
 			document.getElementById("item4").style.display="none";
 			document.getElementById("d").style.display = "none";
 			document.getElementById("item5").style.display="none";
 			document.getElementById("e").style.display = "none";
 			document.getElementById("item6").style.display="none";
 			document.getElementById("f").style.display = "none";
 			document.getElementById("item7").style.display="none";
 			document.getElementById("g").style.display = "none";
 			document.getElementById("item8").style.display="none";
 			document.getElementById("h").style.display = "none";
 			document.getElementById("item9").style.display="block";
 			document.getElementById("i").style.display = "block";
 		}else{
 			document.getElementById("item9").style.display="none";
 			document.getElementById("i").style.display="none";
 		}
 	}

 	function name_item(){
 		return nameitem;
 	  }

 </script>

<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- MINECRAFT FONT -->
	<link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' type='text/css'>
	    <link rel="stylesheet" text="text/css" href="css/fontMinecraft.css">
			<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href='css/tienda.css'>
		<!--Declaracion para el diseño de scrollbar-->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald" rel="stylesheet">

		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>

	<!--Carrousel-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

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

					<div class="col-sm-3">

						<div class="col-2  Vista">
			<?php
					include_once "connect.php";
					$sentencia = "SELECT * FROM ITEMS";
			   foreach ($base_de_datos ->query($sentencia) as $row ) {
			    	$id = $row['iditems'];
			    	$img = $row['thumb'];

			    	echo "<p class='text-justify' id='item$id' style='display: none;'' ><img src='img/tienda/items/".$img."' style='margin-top:100px; width='100' eight='100'></p>";
						//echo '<img src="img/tienda/items/'.$img .'" style= "float:left;margin-left:200px;margin-top:20px;" width = "100">';
			   }

			   ?>
					</div>
					<?php
					$sentencia = "SELECT * FROM ITEMS";
					$cont = 'a';
			   foreach ($base_de_datos ->query($sentencia) as $row ) {
					$id = $row['iditems'];
					$name = $row['nombre'];
					$img = $row['thumb'];
			//		$desc = $row['descripcion'];


			    	echo "<div class='informacion' id='$cont' style='display: none;'>
					<div class='centrar yellow'>$name</div>
					</div>";
				$cont++;
			   }

			   ?>

			</div>
		</div>
	</div>
<style media="screen">
div.ex1 {
background-color: white;
width: auto;
height: 300px;
overflow: scroll;
}
</style>
	<!--Información del equipo-->
	 <div class="card bordes" style="max-width: 32rem;">
		<!--Nombre del equipo-->
    <div class="ex1">


		<div class="card-header border-dark header gold shadow "><h5>LISTA DE OBJETOS</h5></div>
		<!--Cuerpo-->
		<div class="card-body text-success bg-dark body contenedor">
	<?php
	$cont = 'a';
	$sentencia = "SELECT * FROM ITEMS";
	   foreach ($base_de_datos ->query($sentencia) as $row ) {
			$id = $row['iditems'];
			$_SESSION['id']=$id;
			$name = $row['nombre'];
			$img = $row['thumb'];
		//	$desc = $row['descripcion'];
			$tipo = $row['categoria'];
			$precio = $row['precio'];
				echo "<!--OBJETOS-->
			<div class='row mt-1'>";
			echo "<!--Precio del objeto-->
				<div class='col precio'>
					<img src='img/teams/hp.png' width='30' class='espPrecio'> <!--Prueba de boton-->
					<button onclick='item$id($cont);agregaform($id)' class='ml-4 noview white'><h5 class='tam mt-1'>$precio PS</h5></button>
				</div>
				<div class='col-9 barra'>
					<div class='row mt-2'>
					       <div class='col-2 mt-1'>
					           <!--Icono del objeto-->
					           <img src=img/tienda/items/$img class='' width='40'>
				           </div>
					       <div class='col-9 yellow'>
					            <!--Nombre del objeto-->
					            $name
					            <br>
				             	<!--Tipo de objeto-->
					            $tipo
				                </div>
			               </div><!--Fin de la fila de la barra-->
				</div><!--Fin de la barra del objeto-->
			</div> <!--Fin del OBJETO 1-->";
	   }

	?>

</div>
	</div>
	<div class="card-footer border-success foot">

	<button type="button" class="boton white" data-toggle='modal'  data-target='#exampleModal'>COMPRAR</button></div>
	</div> <!--Fin de la lista de OBJETOS-->
<!--

------><!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <input type="text" name="item" id="nombreu" class="form-control input-sm" >
      </div>
      <div class="modal-footer">
				<form class="" method="post">
            <?php
              if ($fantasma=='0') {

                echo "<button class=\"btn btn-primary\" type=\"submit\" name=\"registrar\" >Buy</button>";
              }else {
                echo "<div class='modal-body'>
                    <label for='grupo' id='info'>No puedes comprar
                    </label>

                  </div>';";
              }

             ?>
					<!--	<button type='submit' name="registrar" id="registrar"  class='btn btn-primary'>Buy</button> -->
				</form>
	  </div>
	  </form>
    </div>
  </div>
</div>




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
<!--
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
-->
<div style="color:white;margin-top:100px; margin-left:auto;">
<a href="logout.php">
    <img src="img/exit.png" class="center" id="navbar-img" >
    <h1 class="center-text">Atras</h1>
  </a>
</div>
