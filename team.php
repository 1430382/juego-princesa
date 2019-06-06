<?php
include 'backend/conexion.php';
session_start();
if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}
$usuario = $_SESSION['nombre'];
echo "<h2>" . $usuario . "</h2>";
 ?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/teams.css">
	<title>Teams</title>

</head>

<body style="background-image: url(img/background-teams.jpg);">
	<!---
	  HEADER
	   -------------->
	<?php include "header.php" ?>


	<div class="container">
		<div class="row">
			<!--Equipo 1-->
			<div class="col-sm-4">
				<img src="img/teams/tabla.jpg" id="player1" style= "width: 400px; height: 400px; float:left;margin-left:-200px;margin-top:61px;" >
				<div class="row">
					<div class="col-sm-4">

					</div>
					<div class="col-sm-8">
            <style>
                        table {
                            border-collapse: collapse;
                        }
                        th {
                            background-color:gray;
                            Color:white;
                        }
                        th, td {
                            width:70px;
                            text-align:center;
                            border:1px solid black;
                            padding:10px

                        }
                        .geeks {
                            border-right:hidden;
                        }
                        .gfg {
                            border-collapse:separate;
                            border-spacing:0 15px;
                        }
                        h1 {
                            color:green;
                        }
                    </style>

            <div class="container">
      <table id="Usuario" style="color:orange;margin-top:100px; margin-left:-460px;">
        <thead>
          <th>Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Equipo </th>
          <th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vida </th>
        </thead>
        <tbody>
          <?php
           $conn=mysqli_connect("localhost","root","","test") or die("Error in connection");
           $query = mysqli_query($conn,"SELECT * FROM JUGADORES where equipo='Equipo 1' ORDER BY vida DESC");

                while ($result=  mysqli_fetch_array($query)) {
                  echo "<tr>
                   <td>".$result['nombre']."</td>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$result['equipo']."</td>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$result['vida']."</td>
                  </tr>";

                }
                echo "<br>";
        ?>
        </tbody>
      </table>
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-490px;margin-top:-220px;">
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-490px;margin-top:-160px;">
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-490px;margin-top:-100px;">
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-490px;margin-top:-50px;">


      </div>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
      <script type="text/javascript">
      $(document).ready( function () {
          $('#Usuario').DataTable();
      } );
      </script>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">

					</div>
				</div>
			</div>
			<!--Equipo 2-->
			<div class="col-sm-4">
				<img src="img/teams/tabla.jpg" id="player2" style= "width: 400px; height: 400px; float:left;margin-left:-100px;margin-top:30px;">
				<div class="row">
					<div class="col-sm-4">

					</div>
					<div class="col-sm-8">
            <div class="container">
      <table id="Usuario1" style="color:orange;margin-top:80px; margin-left:-450px;">
        <thead>
          <th>Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Equipo </th>
          <th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vida </th>
        </thead>
        <tbody>
          <?php
           $conn=mysqli_connect("localhost","root","","test") or die("Error in connection");
           $query = mysqli_query($conn,"SELECT * FROM JUGADORES where equipo='Equipo 2' ORDER BY vida DESC");

                while ($result=  mysqli_fetch_array($query)) {
                  echo "<tr>
                   <td>".$result['nombre']."</td>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$result['equipo']."</td>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$result['vida']."</td>
                  </tr>";

                }
                echo "<br>";
        ?>
        </tbody>
      </table>
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-495px;margin-top:-230px;">
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-495px;margin-top:-170px;">
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-495px;margin-top:-110px;">
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-495px;margin-top:-50px;">


      </div>
					</div>
				</div>




			</div>
			<!--Equipo 3-->
			<div class="col-sm-4">
				<img src="img/teams/tabla.jpg" id="player3" style= "width: 400px; height: 400px; float:left;margin-left:0px;margin-top:30px;">
				<div class="row">
					<div class="col-sm-4">
						<img src="img/teams/imagenJugador.jpg" id="jugador1Eq3" >
					</div>

				</div>



				<div class="row">
					<div class="col-sm-12">
            <div class="container">
      <table id="Usuario1" style="color:orange;margin-top:80px; margin-left:-480px;">
        <thead>
          <th>Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Equipo </th>
          <th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vida </th>
        </thead>
        <tbody>
          <?php
           $conn=mysqli_connect("localhost","root","","test") or die("Error in connection");
           $query = mysqli_query($conn,"SELECT * FROM JUGADORES where equipo='Equipo 3' ORDER BY vida DESC");

                while ($result=  mysqli_fetch_array($query)) {
                  echo "<tr>
                   <td>".$result['nombre']."</td>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$result['equipo']."</td>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$result['vida']."</td>
                  </tr>";

                }
                echo "<br>";
        ?>
        </tbody>
      </table>
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-530px;margin-top:-180px;">
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-530px;margin-top:-135px;">
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-530px;margin-top:-90px;">
      <img src="img/teams/imagenJugador.jpg" id="jugador1Eq1" style= "width: 45px; height: 45px; float:left;margin-left:-530px;margin-top:-45px;">


      </div>
					</div>
				</div>
				<div class="row">
						<img src="img/teams/flujo.png" id="flujo" style= "width: 200px; height: 450px; float:left;margin-left:-10px;margin-top:-330px;">
						<label id="log" style= "width: 45px; height: 45px; float:left;margin-left:60px;margin-top:-420px;">Log de actividades</label>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
