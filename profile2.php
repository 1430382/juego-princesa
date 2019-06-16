<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require 'functions.php';
include ("backend/conexion.php");
if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}
if($_SESSION['rol']==0){
	header("location: login.php");
}
// Se crea una instancia de Database
//$log = new Database();
$usuario = $_SESSION['usuario'];
//echo "<h2>".$usuario."</h2>";
//var_dump($usuario);
date_default_timezone_set("America/Monterrey");
$fechactual=date('y-m-d');
//echo "$fechactual";
////

$conn=mysqli_connect("localhost","root","","test") or die("Error in connection");
$query = mysqli_query($conn,"SELECT nombre,apellidos,idjugadores,vida,equipo,fantasma,matricula from JUGADORES WHERE idusuarios='$usuario'");
    while ($result=  mysqli_fetch_array($query)) {

      $nombre=$result['nombre'];
      $apellidos=$result['apellidos'];
      $idjugadores=$result['idjugadores'];
      $vida=$result['vida'];
      $equipo=$result['equipo'];
      $fantasma=$result['fantasma'];
      $matricula=$result['matricula'];
      }

      /////

//
$_SESSION['nombre']=$nombre;
$_SESSION['apellidos']=$apellidos;
$_SESSION['$idjugadores']=$idjugadores;
$_SESSION['$vida']=$vida;
$_SESSION['$equipo']=$equipo;
$_SESSION['$fantasma']=$fantasma;
$_SESSION['$matricula']=$matricula;
$_SESSION['idjugador']=$idjugadores;

//echo $nombre;
//echo $_SESSION['_idjugador'];

///
if(isset($_POST['users'])){
	$users=$_POST['users'];
}
////////////////

//Configuracion servidor mail
date_default_timezone_set("America/Monterrey");
$fechactual=date('y-m-d');
$fechactual=date('Y-m-d', strtotime($fechactual));

function correo($msg)
{
  require 'PHPMailer/PHPMailerAutoload.php';
  //Create a new PHPMailer instance
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $con=mysqli_connect("localhost","root","","test") or die("Error in connection");
  $equipo=$_SESSION['$equipo'];
  //var_dump($equipo);
  if (!($res=$con->query("SELECT MATRICULA FROM JUGADORES where equipo!='$equipo'"))) {
  }else{
    while ($row = $res->fetch_assoc()) {
      ///printf ("%s\n", $row["MATRICULA"]);
      $test=$row["MATRICULA"];
    //  echo "-----";
      //echo "$test";
      $s = "" . trim($test) . "@upv.edu.mx";
      echo "$s";
//////////////////
      $mail->From = "pruebasmedicohospital@gmail.com"; //remitente
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls'; //seguridad
      $mail->Host = "smtp.gmail.com"; // servidor smtp
      $mail->Port = 587; //puerto
      $mail->Username ='pruebasmedicohospital@gmail.com'; //nombre usuario
      $mail->Password = 'Lololol1'; //contraseña
      //Agregar destinatario
      //Campos del correo
      $subject='Items y/o maldiciones-ADDO';
      $message='Usted ha sido maldecido';
      $mail->AddAddress($s);
      $mail->Subject = $subject;
      $mail->Body = $msg;
      //Avisar si fue enviado o no y dirigir al index
      if ($mail->Send()) {
          echo'<script type="text/javascript">
                 alert("Enviado Correctamente");
              </script>';
      }
  }
  }
}
//$s = "Hello " . trim($matricula) . "@upv.edu.mx";
//echo "$s";
//////////////////////

///if (!($res=$con->query("SELECT iditems from INVENTARIO_ITEMS WHERE idjugadores='$usuario'"))) {
if(isset($_POST['registrar'])){
  if (!($res=$con->query("
  SELECT JUGADORES.matricula,JUGADORES.nombre,JUGADORES.apellidos,JUGADORES.equipo,
JUGADORES.genero,JUGADORES.vida,JUGADORES.fantasma,JUGADORES.idusuarios,
INVENTARIO_ITEMS.iditems,INVENTARIO_ITEMS.idjugadores, ITEMS.fecha FROM JUGADORES
INNER JOIN INVENTARIO_ITEMS
ON JUGADORES.idjugadores='$usuario'
INNER JOIN ITEMS ON ITEMS.iditems = INVENTARIO_ITEMS.iditems where INVENTARIO_ITEMS.idjugadores=JUGADORES.idjugadores"))) {
  	}else{
  		/*E imprimimos el resultado para ver que el ejemplo ha funcionado*/
  		if($row = $res->fetch_assoc()){
  			if($row['iditems']==1)
        {
          $iditems=$row['iditems'];
          $nombreitem='Muerte Prematura';
  					if (!$con->query("CALL MuertePrematura('$matricula')"))
              {
                $query ="CALL MuertePrematura('$matricula')";
                echo"<div class='alert alert-success alert-dismissable'>
            		<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
            		<strong>Exitoso!</strong> El objeto se a utilizado correctamente.
            	</div>";
              }
              $cox=mysqli_connect("localhost","root","","test") or die("Error in connection");
              $query = mysqli_query($cox,"DELETE FROM INVENTARIO_ITEMS WHERE idjugadores='$usuario' and iditems='$iditems'");
              //msg
              $cow=mysqli_connect("localhost","root","","test") or die("Error in connection");
              $msg = $nombre." ha usado ".$nombreitem." en ".$nombre;
              $query = mysqli_query($cow,"INSERT INTO HISTORIAL(descripcion,fecha) VALUES('$msg','$fechactual')");


        }else if($row['iditems']==2)
        {
           $iditems=$row['iditems'];
           $nombreitem='Lagrimas de amigos';
          if (!$con->query("CALL Lagrimas_de_amigos('$equipo')"))
            {
              $query ="CALL Lagrimas_de_amigos('$equipo'')";
              echo"<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
              <strong>Exitoso!</strong> El objeto se a utilizado correctamente.
            </div>";
            }
            $cox=mysqli_connect("localhost","root","","test") or die("Error in connection");
            $query = mysqli_query($cox,"DELETE FROM INVENTARIO_ITEMS WHERE idjugadores='$usuario' and iditems='$iditems'");
            //msg
            $cow=mysqli_connect("localhost","root","","test") or die("Error in connection");
            $msg = $nombre." ha usado ".$nombreitem." en ".$equipo;
            $query = mysqli_query($cow,"INSERT INTO HISTORIAL(descripcion,fecha) VALUES('$msg','$fechactual')");
  			}
  			else if($row['iditems']==3)
        {
          $iditems=$row['iditems'];
          $nombreitem='Reloj de arena';
          if (!$con->query("CALL Reloj_de_arena('$idjugadores')"))
            {
              $query ="CALL Reloj_de_arena('$idjugadores')";
              echo"<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
              <strong>Exitoso!</strong> El objeto se a utilizado correctamente.
            </div>";
            }
            $cox=mysqli_connect("localhost","root","","test") or die("Error in connection");
            $query = mysqli_query($cox,"DELETE FROM INVENTARIO_ITEMS WHERE idjugadores='$usuario' and iditems='$iditems'");
            //msg
            $cow=mysqli_connect("localhost","root","","test") or die("Error in connection");
            $msg = $nombre." ha usado ".$nombreitem." en ".$nombre;
            $query = mysqli_query($cow,"INSERT INTO HISTORIAL(descripcion,fecha) VALUES('$msg','$fechactual')");
  			}
        else if($row['iditems']==4)
        {
          $iditems=$row['iditems'];
          $nombreitem='Clon de sombras';
          if (!$con->query("CALL Clon_de_sombras('$idjugadores')"))
            {
              $query ="CALL Clon_de_sombras('$idjugadores')";
              echo"<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
              <strong>Exitoso!</strong> El objeto se a utilizado correctamente.
            </div>";
            }
            $cox=mysqli_connect("localhost","root","","test") or die("Error in connection");
            $query = mysqli_query($cox,"DELETE FROM INVENTARIO_ITEMS WHERE idjugadores='$usuario' and iditems='$iditems'");
            //msg
            $cow=mysqli_connect("localhost","root","","test") or die("Error in connection");
            $msg = $nombre." ha usado ".$nombreitem." en ".$nombre;
            $query = mysqli_query($cow,"INSERT INTO HISTORIAL(descripcion,fecha) VALUES('$msg','$fechactual')");
  			}
        else if($row['iditems']==5)
        {
          $iditems=$row['iditems'];
          $nombreitem='Teletransportacion menor';
          if (!$con->query("CALL teletransportacion_menor('$idjugadores','$equipo')"))
            {
              $query ="CALL teletransportacion_menor('$idjugadores','$equipo')";
              echo"<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
              <strong>Exitoso!</strong> El objeto se a utilizado correctamente.
            </div>";
            }
            $cox=mysqli_connect("localhost","root","","test") or die("Error in connection");
            $query = mysqli_query($cox,"DELETE FROM INVENTARIO_ITEMS WHERE idjugadores='$usuario' and iditems='$iditems'");
            //msg
            $cow=mysqli_connect("localhost","root","","test") or die("Error in connection");
            $msg = $nombre." ha usado ".$nombreitem." en ".$equipo;
            $query = mysqli_query($cow,"INSERT INTO HISTORIAL(descripcion,fecha) VALUES('$msg','$fechactual')");
  			}
        else if($row['iditems']==6)
        {
          $iditems=$row['iditems'];
          $nombreitem='Teletransportacion mayor';
          if (!$con->query("CALL teletransportacion_mayor('$idjugadores','$equipo')"))
            {
              $query ="CALL teletransportacion_mayor('$idjugadores','$equipo')";
              echo"<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
              <strong>Exitoso!</strong> El objeto se a utilizado correctamente.
            </div>";
            }
            $cox=mysqli_connect("localhost","root","","test") or die("Error in connection");
            $query = mysqli_query($cox,"DELETE FROM INVENTARIO_ITEMS WHERE idjugadores='$usuario' and iditems='$iditems'");
            //msg
            $cow=mysqli_connect("localhost","root","","test") or die("Error in connection");
            $msg = $nombre." ha usado ".$nombreitem." en ".$equipo;
            $query = mysqli_query($cow,"INSERT INTO HISTORIAL(descripcion,fecha) VALUES('$msg','$fechactual')");
  			}
        else if($row['iditems']==7)
        {
          $iditems=$row['iditems'];
          $nombreitem='Veneno menor';
      if (!$con->query("CALL veneno_menor('$idjugadores','$fechactual')"))
        {
          $query ="CALL veneno_menor('$idjugadores','$fechactual')";
          echo"<div class='alert alert-success alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
          <strong>Exitoso!</strong> El objeto se a utilizado correctamente.
        </div>";
        }
        $cox=mysqli_connect("localhost","root","","test") or die("Error in connection");
        $query = mysqli_query($cox,"DELETE FROM INVENTARIO_ITEMS WHERE idjugadores='$usuario' and iditems='$iditems'");
        //msg
        $cow=mysqli_connect("localhost","root","","test") or die("Error in connection");
        $msg = $nombre." ha usado ".$nombreitem." en todos menos en ".$equipo;
        $query = mysqli_query($cow,"INSERT INTO HISTORIAL(descripcion,fecha) VALUES('$msg','$fechactual')");
        correo($msg);
  			}
        else if($row['iditems']==8)
        {
         $iditems=$row['iditems'];
         $nombreitem='Veneno medio';
          if (!$con->query("CALL veneno_medio('$equipo','$fechactual')"))
            {
              $query ="CALL veneno_medio('$equipo','$fechactual')";
              echo"<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
              <strong>Exitoso!</strong> El objeto se a utilizado correctamente.
            </div>";
            }
           $cox=mysqli_connect("localhost","root","","test") or die("Error in connection");
           $query = mysqli_query($cox,"DELETE FROM INVENTARIO_ITEMS WHERE idjugadores='$usuario' and iditems='$iditems'");
           //msg
           $cow=mysqli_connect("localhost","root","","test") or die("Error in connection");
           $msg = $nombre." ha usado ".$nombreitem." en todos menos en ".$equipo;
           $query = mysqli_query($cow,"INSERT INTO HISTORIAL(descripcion,fecha) VALUES('$msg','$fechactual')");
           correo($msg);
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
//$cox->close();
$conn->close();
//

}

//
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
  <link rel="stylesheet" text="text/css" href="css/fontMinecraft.css">
  <link rel="stylesheet" text="text/css" href="css/perfilDesign.css">
   <!--<link rel="stylesheet" text="text/css" href="css/perfilGaleria.css"> -->

   <!--Diseños de bootstrap-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <title>Perfil</title>
  <!--Estilos usando css para la imagen de fondo y el color del placeholder del usuario y contraseña-->
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

<script type="text/javascript">
function agregaform(item,name){

if(item == 1){
  var nameitem = "Muerte prematura";
  //window.location.href="tienda.php?uid=1";
}
if(item == 2){
  var nameitem = "Lagrimas de amigos";
  //window.location.href="tienda.php?uid=2";
}
if(item == 3){
  var nameitem = "Reloj de arena";
  //window.location.href="tienda.php?uid=3";
}
if(item == 4){
  var nameitem = "Clon de sombra";
  //window.location.href="tienda.php?uid=4";
}
if(item == 5){
  var nameitem = "Teletransportación menor";
  //window.location.href="tienda.php?uid=5";
}
if(item == 6){
  var nameitem = "Teletransportación mayor";
  //window.location.href="tienda.php?uid=6";
}
if(item == 7){
  var nameitem = "Veneno menor";
  //window.location.href="tienda.php?uid=7";
}
if(item == 8){
  var nameitem = "Veneno mayor";
  //window.location.href="tienda.php?uid=8";
}
if(item == 9){
  var nameitem = "Tortura simple";
  //window.location.href="tienda.php?uid=9";
}


if(item <= 6)
document.getElementById("title").innerHTML="Usar item "+nameitem;

if(item > 6)
document.getElementById("title").innerHTML="Usar maldición "+nameitem;

}

</script>

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

        <div class="list-group-item text-center bgColor ">Información del usuario</div>
           <div class="list-group-item white bgCuerpo list-group-item-dark">Nombre del equipo: <?php echo $equipo ?></div>
           <div class="list-group-item white bgCuerpo list-group-item-dark">Nombre del usuario: <?php echo $nombre,' ',$apellidos ?></div>

            <img src="img/steve.png" width="20%" class="ml-5 mt-5">
          </form>


<!--
        <h1 class="heading"id="texto-minecraft2" style="color:white;position: absolute; top: 1px; width: 80%;">
          <br>"Nombre de Equipo."
          <div class="container">
    <table id="Usuario" style="color:white;margin-top:-80px; margin-left:430px;">
      <thead>

      </thead>
      <tbody>
        <?php
                echo "<tr>
                 <td>".$equipo."</td>
                </tr>";

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

        <h2 class="heading"id="texto-minecraft2" style="color:white;position: absolute; top: 80px; width: 80%;"><br>"Jugador." "
          <?php echo   $nombre,' ',$apellidos ; ?>" </h2>


        <img src="img/steve.png" class="img-fluid rounded float-left mt-5 ml-5"style="color:white;position: absolute; top: 200px; left: 10%; width: 20%;">
    -->  </div>

      <div class="col-sm">
        <!--Vida -->
        <div class="list-group-item bgColor black">
              Vida
        </div>
          <div class="container">
    <table id="Usuario1" style="color:white;margin-top:-80px; margin-left:430px;">
      <thead>

      </thead>
      <tbody>
        <div class="align-self-center bgCuerpo text-center">
                        <?php
                        $band = 0;
                        if($fantasma == '1'){
                        for ($i = 1; $i <= 10; $i++) {
                          if($band == 1){
                            echo '<img src="img/teams/hpVacio.png" width="30" class="mr-2">';
                          }else{
                            if($i*10 <= $vida){
                              if($i*10 == $vida){
                                $band = 1;
                              }
                              echo '<img src="img/teams/hp.png" width="30" class="mr-2">';
                          }else{
                            echo '<img src="img/teams/hpmid.png" width="30" class="mr-2">';
                            $band = 1;
                          }
                          }

                          }
                        }else{
                          for ($i = 1; $i <= 10; $i++){
                            echo '<img src="img/teams/hpVacio.png" width="30" class="mr-2">';
                          }
                        }
        ?>
        <?php
        if($fantasma == '1'){
          echo "<h5 class='text-center red shadow mt-2'> $vida PS </h5>";

        }else{
          echo "<h5 class='text-center red shadow mt-2'> 0 PS ($vida) </h5>";
        }
        ?>
        <br>
        </div>

        <?php
          /*
                if ($vida<=999 && $vida>75 ) {
                  echo "<tr>

                  </tr>";
                  echo ' <table border=0> <tr><td><img src="img/vida/100.png" style="color:white;position: absolute; top: 50px; right: 18%; width: 25%; alt="loading" /><td><td></td><tr></table>';

                }
                else if ($vida<=75 && $vida>50 ) {
                  echo "<tr>

                  </tr>";
                  echo ' <table border=0> <tr><td><img src="img/vida/75.png" style="color:white;position: absolute; top: 50px; right: 10%; width: 25%; alt="loading" /><td><td></td><tr></table>';

                }
                else if ($vida<=50 && $vida>25 ) {
                  echo "<tr>

                  </tr>";
                  echo ' <table border=0> <tr><td><img src="img/vida/50.png" style="color:white;position: absolute; top: 50px; right: 25%; width: 15%; alt="loading" /><td><td></td><tr></table>';

                }
                else if ($vida<=25 && $vida>1 ) {
                  echo "<tr>

                  </tr>";
                  echo ' <table border=0> <tr><td><img src="img/vida/25.png" style="color:white;position: absolute; top: 40px; right: 35%; width: 7%; alt="loading" /><td><td></td><tr></table>';

                }
                else if ($vida<1 ) {
                  echo "<tr>

                  </tr>";
                  echo ' <table border=0> <tr><td><img src="img/vida/0.png" style="color:white;position: absolute; top: 40px; right: 35%; width: 7%; alt="loading" /><td><td></td><tr></table>';

                }
                */
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
    <br>
    <br>
    <br>
    <!--  -->
    <div id="carouselExampleControls" class="carousel mt-5" data-interval="false">
      <div class="carousel-inner">
      <?php
      include_once "connect.php";
      $usuario = $_SESSION['usuario'];
       $sentencia = "SELECT COUNT(*) FROM INVENTARIO_ITEMS WHERE idjugadores = '".$usuario."'";
      foreach($base_de_datos ->query($sentencia) as $row ) {
        $nitems = $row['COUNT(*)'];

        if($nitems == 0){
          echo "<div class='carousel-item active'>";

          echo "<div class='card'>";
          echo "<img class='card-img' src='img/wood2.png' alt='Card image'>";
          echo "<div class='card-img-overlay'>";

          echo "<h5 class='card-title'>SIN ITEMS</h5>";
          echo "<p class='card-text'>No tienes items, compra en la tienda.</p>";
        echo "</div>";

      echo "</div>";
      echo "</div>";
        }else{

          $sentencia2="SELECT  ITEMS.nombre, INVENTARIO_ITEMS.iditems,ITEMS.thumb FROM JUGADORES
              INNER JOIN INVENTARIO_ITEMS
              ON JUGADORES.idjugadores = '".$usuario."'
              INNER JOIN ITEMS ON ITEMS.iditems = INVENTARIO_ITEMS.iditems WHERE INVENTARIO_ITEMS.idjugadores='".$usuario."';";
          $n=0;
          foreach ($base_de_datos ->query($sentencia2) as $row ) {
            $item = $row['iditems'];
            $_SESSION['item']=$item;
            $nameitem = $row['nombre'];
        //    $desc = $row['descripcion'];
            $img = $row['thumb'];

            if($n == 0){
              $n++;
              echo "<div class='carousel-item active'>";

            echo "<div class='card'>";
        echo "<img class='card-img' src='img/wood2.png' alt='Card image'>";
        echo "<div class='card-img-overlay'>";

          echo "<h5 class='card-title' name='".$nameitem."'>".$nameitem."</h5>";
          //
            //
          echo '<img src="img/tienda/items/'.$img .'" style= "float:left;margin-left:200px;margin-top:20px;" width = "100">';

      //   echo '<img src="img/tienda/items/'.$img .'" >  ';
    //     echo "<h5 class='card-text'>".$desc."</h5>";
        echo "</div>";

      echo "</div>";
      if($fantasma == '1'){
        echo "<img src='img/usar.png' onclick='agregaform($item)' type='button' data-toggle='modal' data-target='#exampleModal$item' >";
      }else{
        echo "<img src='img/usar.png' onclick='agregaform($item)' type='button' data-toggle='modal' data-target='#exampleModal' >";
      }
      echo "</div>";
            }else{
              echo "<div class='carousel-item'>";

            echo "<div class='card'>";
        echo "<img class='card-img' src='img/wood2.png' alt='Card image'>";
        echo "<div class='card-img-overlay'>";

          echo "<h5 class='card-title'>".$nameitem."</h5>";
      echo '<img src="img/tienda/items/'.$img .'" style= "float:left;margin-left:200px;margin-top:20px;" width = "100">';
      //    echo "<h5 class='card-text'>".$desc."</h5>";
        echo "</div>";

      echo "</div>";
      if($fantasma == '1'){
        echo "<img src='img/usar.png' onclick='agregaform($item)' type='button' data-toggle='modal' data-target='#exampleModal$item' >";
      }else{
        echo "<img src='img/usar.png' onclick='agregaform($item)' type='button' data-toggle='modal' data-target='#exampleModal' >";
      }
      echo "</div>";
            }
          }
       }
     }

    ?>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <img src="img/left.png" class="carousel-control-prev-icon" aria-hidden="true" width="100%">
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <img src="img/right.png" class="carousel-control-prev-icon" aria-hidden="true" width="100%">
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!--  -->
    <?php
    $sentencia = "SELECT * FROM ITEMS";
        foreach ($base_de_datos->query($sentencia) as $row) {
          $moditem = $row['nombre'];
          $iditem = $row['iditems'];
          $tipo = $row['categoria'];
echo "<div class='modal fade' id='exampleModal$iditem' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>";
echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
echo "<div class='modal-content'>";
echo "<div class='modal-header'>
        <h5 class='modal-title' id='title'> Usar item $moditem </h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
      <form method='post'>";

if($tipo == 'Item'){
    if($iditem == 1 || $iditem == 3 || $iditem == 5 || $iditem == 6){
      echo "<label for='grupo' id='info'>Usar item en:
            <select name='obj'>";
            if($iditem == 1){
              $sentencia2 = "SELECT * FROM JUGADORES WHERE idjugadores != ".$usuario." AND equipo = ".$equipo." AND estatus = '0'";
            }else{
              $sentencia2 = "SELECT * FROM JUGADORES WHERE idjugadores != ".$usuario;
            }
            foreach ($base_de_datos->query($sentencia2) as $row) {
      echo "<option name='obj' value=".$row['idjugadores'].">".$row['nombre']."</option>";
      $_POST['$objetivo']=$row['nombre'];
      //$objetivo=$row['nombre'];
        }
      echo '</select></label>';
    }else{
      echo "<label for='grupo' id='info'>¿Seguro que quieres usar $moditem?";
      echo "</label>";
    }

}else{
    if($iditem == 7 || $iditem == 8){
      echo "<label for='grupo' id='info'>¿Seguro que quieres usar $moditem?";
      echo "</label>";
    }else{
    echo "<label for='grupo' id='info'>Usar maldicion en:
        <select name='obj'>";


        $sentencia2 = "SELECT * FROM JUGADORES WHERE idjugadores != ".$usuario;
        foreach ($base_de_datos->query($sentencia2) as $row) {
          echo "<option name='obj' value=".$row['idjugadores'].">".$row['nombre']."</option>";
        }

    echo '</select></label>';
    }

}



echo "</div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='submit' name='registrar'  class='btn btn-primary'>Use</button>
      </div>
      </form>
    </div>
  </div>
</div>";
}

?>
    <!-- --->
        </h2>
          <form class="" method="post" style= "float:left;margin-left:150px;margin-top:150px;">
            <!--
            <select name="users" id="users">
          <?php
            $res="SELECT JUGADORES.nombre, ITEMS.nombre, INVENTARIO_ITEMS.iditems FROM JUGADORES
                INNER JOIN INVENTARIO_ITEMS
                ON JUGADORES.idjugadores = '$usuario'
                INNER JOIN ITEMS ON ITEMS.iditems = INVENTARIO_ITEMS.iditems WHERE INVENTARIO_ITEMS.idjugadores='$usuario';";
            $res=$con->query($res);
            while ($row = $res->fetch_array()) {
              ?>
              <option value="<?php echo $row['nombre'];?>">
              <?php echo $row['nombre'];?>
              </option>
              <?php
            }
          ?>

  </select> -->

        <!--Barra de selección -->
      <!--    <button class="button button1" style= "float:left;margin-left:-10px;margin-top:100px;" type="submit" name="registrar" >usar</button>
      -->    </form>
        <!--Señal -->
        <div class="col-lg-12 text-center"style="margin: 0;padding: 0;position: relative;">

        </div>

        </div>
      </div>
</div>
<div class="" style="color:white;margin-top:auto; margin-left:auto;">


<a href="logout.php">
    <img src="img/exit.png" alt="Reglas del juego" class="center" id="navbar-img" >
    <h1 class="center-text">Atras</h1>
  </a>

</div>

  <!-- JS -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">

  </script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/efectos.js"></script>
</body>
</html>
