<?php
if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}
if($_SESSION['rol']==0){
	header("location: login.php");
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
	<link rel="stylesheet" type="text/css" href="css/reglasDesign.css">

	<title>Reglas del juego</title>
</head>

<body style="background-image: url(img/background-reglas.png);">
	<!---
	  HEADER
	   -------------->
	<?php include "header.admin.php" ?>



  <style media="screen">
  div.ex1 {
background-color: white;
width: auto;
height: 500px;
overflow: scroll;
}
  </style>
	<div class="container">
  		<div class="row">
	    	<div class="col">
		      <!-- <h2 class="center-text">1 of 3</h2> -->
		    </div>

        <div>
     		<div class="row">
   	    	<div class="col">
   		      <!-- <h2 class="center-text">1 of 3</h2> -->
   		    </div>

   		    <div class="col-6">
   		      <div id="marketing" >
   					<section id="gardient-textbox">
   							<div class="papers">
                  <div class="ex1">
   								<h3 class="tituloCentrado mb-4 black">Reglas del juego</h3>
   		<h5 class="gold">
   			Sobre los jugadores:
   		</h5>
   		<ul class="justificar">
   			<li class="mb-2">Sólo los alumnos inscritos a la materia en curso seran considerados “jugadores”.</li>
   			<li class="mb-2">El profesor no se consedera jugador, se considera “maestro del calabozo”.</li>
   			<li class="mb-2">Ningún jugador podrá salir de juego, una vez comenzado. La única excepción es mediante “el rescate de la princesa”, o bien, abandonando la clase</li>
   			<li class="mb-2">4. Los jugadores que hayan salido del juego no podrán reingresar.</li>
   		</ul>
   		<h5 class="gold">Sobre Puntos de Salud (PS):</h5>
   		<ul class="justificar">
   			<li class="mb-2">Todo jugador iniciará con PS igual a su calificación del examen de diagnóstico.</li>
   			<li class="mb-2">Los PS no pueden ser modificador a voluntad, solamente por medio de Items, Maldiciones y/o Hechizos.</li>
   			<li class="mb-2">Un alumno con 0 PS se considera un "Fantasma" por lo cual no podrá ganar o perder PS hasta perder ese estado.</li>
   			<li class="mb-2">Los puntos de vida podrán ser compartidos por jugadores sólo mediante Items y/o Hechizos.</li>
   			<li class="mb-2">Los PS pueden superar el máximo de 100.</li>
   		    <li class="mb-2">Cada corte de unidad se inicia con los PS finales de la unidad previa.</li>
   		</ul>
   		<h5 class="gold">Sobre los Hechizos:</h5>
   		<ul class="justificar">
   			<li class="mb-2">Los trabajos y/o actividades asignadas por el maestro del calabozo son  conciderados hechizos.</li>
   			<li class="mb-2">Un trabajo bien realizado se considera "hechizo anulado" para el jugador o equipo.</li>
   			<li class="mb-2">Un hechizo anulado sumará PS menos o igual a la potencia del hechizo.</li>
   			<li class="mb-2">Un hechizo no anulado restará PS del o los jugadores igual a la potencia del hechizo.</li>
   			<li class="mb-2">Los hechizos no pueden ser cancelados.</li>
   			<li class="mb-2">Todo hechizo tiene potencia y duración explicita.</li>
   		</ul>
   		<h5 class="gold">Sobre los Fantasmas:</h5>
   		<ul>
   			<li class="mb-2">Un alumno es conciderado “Fantasma” mientras tenga 0 PS.</li>
   		   <li class="mb-2">Un alumno no sumará o restará PS hasta perder el estatus de “fantasma”.</li>
   		   <li class="mb-2">Todo PS sumado o restado estará congelado.</li>
   		   <li class="mb-2">Una vez perdido el estatus de fantasma se le sumarán y/o restarán los PS congelados.</li>
   		   <li class="mb-2">Sólo mediante los items "Muerte prematura", y "Lagrimas de amigos" podrán restaurar el estatus de un fantasma.</li>
   		   <li class="mb-2">Si todo el equipo esta en estatus "Fantasma" sólo tendrá oportunidad única de misión en el Limbo para obtener Items "Muerte prematura".</li>
   		</ul>
   		<h5 class="gold">Rescate a la princesa:</h5>
   		<ul class="justificar">
   			Una vez que se realice el corte de la unidad, todo jugador que tenga mayor o igual<br> a 100 PS podrá elegir
   					cualquiera de la siguientes opciones:
   			<li class="mb-2">Quitar el estatus de un jugador iniciando con 10 PS.</li>
   			<li class="mb-2">Excentar un examen.</li>
   			<li class="mb-2">Distribuir 40 PS y/o puntos excedentes entre sus compañeros de equipo.</li>
   			<li class="mb-2">Seleccionar 2 Items de la tienda.</li>
   			<li class="mb-2">El alumno podrá elegir abandonar el juego con 70 en cada unidad(No se le permitirá acceder de nuevo al juego).</li>
   		</ul>
   		<p class="red">
   				Síguelas al pie de la letra.
   			</p>
   	</div>
    </div>

   					</section>
   				</div>

   		    </div>

   		    <div class="col">
   		      <!-- <h2 class="center-text">3 of 3</h2> -->
   		    </div>
   		</div>
   	</div>



   	<!-- JS FILES -->
   	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

   	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

   	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		    <div class="col">
		      <!-- <h2 class="center-text">3 of 3</h2> -->
		    </div>
		</div>
	</div>
</body>
</html>
