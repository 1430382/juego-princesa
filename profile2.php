<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include ("backend/conexion.php");
// Se crea una instancia de Database
//$log = new Database();
$usuario = $_SESSION['nombre'];

////

?>

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
  <title>Perfil</title>
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
    #texto-minecraft2{
      text-align: center;
      font-size: 2.5rem;
      font-family: 'VT323', serif;
      text-shadow: 1px;
      color: #fff;
    }
    .heading{color: red; position: absolute;top: 50%; width: 100%; text-align: center;font-size: 3rem;}
  </style>
</head>
<!--Inicia el cuerpo de nuestro index-->
<!--Navbar-->
<!--El cuerpo contiene la siguiente clase, que lo que hace es centrarlo-->
<body style="background-image: url(img/bg3.jpg);">
<!--- HEADER
-------------->
<?php include "header.php" ?>
<div class="container">
  <div class="row">
      <div class="col-sm">
        <h1 class="heading"id="texto-minecraft2" style="color:white;position: absolute; top: 1px; width: 80%;"><br>"Nombre de Equipo."
          <div class="container">
    <table id="Usuario" style="color:white;margin-top:-80px; margin-left:430px;">
      <thead>

      </thead>
      <tbody>
        <?php
          $conn=mysqli_connect("localhost","root","","test") or die("Error in connection");
          $query = mysqli_query($conn,"SELECT equipo from JUGADORES WHERE matricula='$usuario'");
              while ($result=  mysqli_fetch_array($query)) {
                echo "<tr>
                 <td>".$result['equipo']."</td>
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

        <h2 class="heading"id="texto-minecraft2" style="color:white;position: absolute; top: 80px; width: 80%;"><br>"Jugador." "<?php echo   $usuario ; ?>" </h2>


        <img src="img/steve.png" class="img-fluid rounded float-left mt-5 ml-5"style="color:white;position: absolute; top: 200px; left: 10%; width: 20%;">
      </div>

      <div class="col-sm">
        <!--Vida -->
        <h2 class="heading"id="texto-minecraft2" style="color:white;position: absolute; top: 10px; right: 20%; width: 105%;"><br>Vida:
          <div class="container">
    <table id="Usuario1" style="color:white;margin-top:-80px; margin-left:430px;">
      <thead>

      </thead>
      <tbody>
        <?php
          $conn=mysqli_connect("localhost","root","","test") or die("Error in connection");
          $query = mysqli_query($conn,"SELECT vida from JUGADORES WHERE matricula='$usuario'");
              while ($result=  mysqli_fetch_array($query)) {
                if ($result['vida']<=100 && $result['vida']>=75 ) {
                  echo "<tr>

                  </tr>";
                  echo ' <table border=0> <tr><td><img src="img/vida/100.png" style="color:white;position: absolute; top: 50px; right: 10%; width: 25%; alt="loading" /><td><td></td><tr></table>';

                }
                else if ($result['vida']<=75 && $result['vida']>=50 ) {
                  echo "<tr>

                  </tr>";
                  echo ' <table border=0> <tr><td><img src="img/vida/75.png" style="color:white;position: absolute; top: 50px; right: 10%; width: 25%; alt="loading" /><td><td></td><tr></table>';

                }
                else if ($result['vida']<=50 && $result['vida']>=25 ) {
                  echo "<tr>

                  </tr>";
                  echo ' <table border=0> <tr><td><img src="img/vida/50.png" style="color:white;position: absolute; top: 50px; right: 10%; width: 25%; alt="loading" /><td><td></td><tr></table>';

                }
                else if ($result['vida']<=25 && $result['vida']>=1 ) {
                  echo "<tr>

                  </tr>";
                  echo ' <table border=0> <tr><td><img src="img/vida/25.png" style="color:white;position: absolute; top: 50px; right: 10%; width: 25%; alt="loading" /><td><td></td><tr></table>';

                }
                else if ($result['vida']<=1 ) {
                  echo "<tr>

                  </tr>";
                  echo ' <table border=0> <tr><td><img src="img/vida/0.png" style="color:white;position: absolute; top: 50px; right: 10%; width: 25%; alt="loading" /><td><td></td><tr></table>';

                }
                }

      ?>
      </tbody>
    </table>
    </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
    $(document).ready( function () {
        $('#Usuario1').DataTable();
    } );
    </script>

        </h2>
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


        <!--Barra de selección -->
          <button class="button button1" style= "float:left;margin-left:100px;margin-top:400px;" type="submit" name="registrar" >Registrar jugador</button>
        <!--Señal -->
        <div class="col-lg-12 text-center"style="margin: 0;padding: 0;position: relative;">

        </div>

        </div>
      </div>
</div>
  <!-- JS -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">

  </script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/efectos.js"></script>
</body>
</html>
