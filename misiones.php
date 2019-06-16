<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scale=no, initial-scale=1, maximum-scale=1,minimum-scale=1">


  <!--Fuente Minecraft-->
  <link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' type='text/css'>

  <!--Agregamos los archivos css de bootstrap-->
  <link rel="stylesheet" href="css/bootstrap.min.css" id="bootstrap-css">

  <!--Estilo css personalizado-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">

  <link rel="stylesheet" type="text/css" href="css/style.css">
<!--   <link rel="stylesheet" href="text/css/signin.css">

  <link href="./minecraft-styles.css" rel="stylesheet" type="text/css" media="screen" />
 -->
  <title>Misiones</title>

  <!--Estilos usando css para la imagen de fondo y el color del placeholder del usuario y contraseña-->
  <style>
    input::-webkit-input-placeholder {
      color: white !important;
    }
    input:-moz-placeholder { /* Firefox 18- */
      color: white !important;
    }
    input::-moz-placeholder {  /* Firefox 19+ */
      color: white !important;
    }
    input:-ms-input-placeholder {
      color: white !important;
    }
    #texto-minecraft{
      text-align: center;
      font-size: 1.8rem;
      font-family: 'VT323', serif;
      text-shadow: 1px;
      color: #fff;
    }
    *{margin:0 padding:0;}
    .banner{position: relative; width: 90%; margin: 0 auto;}
    .banner img{width: 50%;}
    .bannerbtn{position: relative; width: 90%; margin: 0 auto;}
    .bannerbtn img{width: 10%;}
    .heading{color: red; position: absolute;top: 50%; width: 100%; text-align: center;font-size: 3rem; text-shadow: 5px 5px 10px;}
  </style>

</head>
<!--Inicia el cuerpo de nuestro index-->
<!--Navbar-->
<!--El cuerpo contiene la siguiente clase, que lo que hace es centrarlo-->
<body class="text-center" style="background-image: url(img/bg2.jpg);">

  <!---
    HEADER
     -------------->
  <?php include "header.php" ?>
<br>


<div class="container" method="post" action="profile.html">

<img src="img/arrow.png" class="img-fluid rounded float-left mt-5 ml-5"width="360" height="470">
<br><br><br>


<section>
  <div class="col-lg-12 text-center"style="margin: 0;padding: 0;position: relative;">
    <img src="img/pt2.png" class="img-fluid rounded float-left ml-5 mr-5"style= "width: 600px; height: 400px; float:left;margin-left:-200px;margin-top:-100px;">

    <h1 id="texto-minecraft" style="color:black;position: absolute; top: 100px; width: 115%;">
      <!-- aaa- -------->
      <div class="container">
<table id="Usuario" style="color:black;margin-top:-80px; margin-left:430px;">
	<thead>
		<th>Nombre</th>
		<th>descripcion</th>
		<th>recompensa</th>
    <th>Fecha</th>
	</thead>
	<tbody>
		<?php
		 $conn=mysqli_connect("localhost","root","","test") or die("Error in connection");
		 $query = mysqli_query($conn,"SELECT * FROM MISIONES");

  	  		while ($result=  mysqli_fetch_array($query)) {
  	  			echo "<tr>
  	  			 <td>".$result['nombre']."</td>
  	  			 <td>".$result['descripcion']."</td>
  	  			 <td>".$result['recompensa']."</td>
             <td>".$result['fecha']."</td>
  	  			</tr>";
  	  		}
	?>
	</tbody>
</table>
</div>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#Usuario').DataTable();
} );
</script>


    </h1>
  </div>
</section>
</div>


  <!-- JS FILES -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
