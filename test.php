<?php
//Documentos de conexión y header
error_reporting(E_ALL);
ini_set('display_errors', '1');
//Codigo para el cron que manda correo
session_start();
include ("backend/conexion.php");
//librerias
//se carga la libreria necesaria
$usuario = $_SESSION['usuario'];
require 'PHPMailer/PHPMailerAutoload.php';
//
date_default_timezone_set("America/Monterrey");
$fechactual=date('y-m-d');
//echo "$fechactual";
////
$nombre=$_SESSION['nombre'];
$apellidos=$_SESSION['apellidos'];
$idjugadores=$_SESSION['$idjugadores'];
$vida=$_SESSION['$vida'];
$equipo=$_SESSION['$equipo'];
$fantasma=$_SESSION['$fantasma'];
$matricula=$_SESSION['$matricula'];
$idjugadores=$_SESSION['idjugador'];
// var_dump($nombre);
// var_dump($apellidos);
// var_dump($idjugadores);
// var_dump($vida);
 //var_dump($equipo);
 //echo "--------";
// var_dump($fantasma);
// var_dump($matricula);
// var_dump($idjugadores);
//
//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();
//Configuracion servidor mail
date_default_timezone_set("America/Monterrey");
$fechactual=date('y-m-d');
$fechactual=date('Y-m-d', strtotime($fechactual));
//if (isset($_POST['sendemail'])) {
//en base a la consulta si la fecha es igual a la fecha actual manda correo
if (!($res=$con->query("SELECT MATRICULA FROM JUGADORES where equipo='$equipo'"))) {
}else{
  /*E imprimimos el resultado para ver que el ejemplo ha funcionado*/
  //if($row = $res->fetch_assoc()){
  while ($row = $res->fetch_assoc()) {
    ///printf ("%s\n", $row["MATRICULA"]);
    $test=$row["MATRICULA"];
  //  echo "-----";
    //echo "$test";
    $s = "" . trim($test) . "@upv.edu.mx";
    echo "$s";
    //$s = "Hello " . trim($matricula) . "@upv.edu.mx";
    //echo "$s";
  //  $_SESSION['MATRICULA']=$row['MATRICULA'];
  //  var_dump($_SESSION['MATRICULA']);
    //Se asigna la variable email a sesion por si se ocupa despues
///////////
////Informacion para el correo
    $mail->From = "pruebasmedicohospital@gmail.com"; //remitente
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls'; //seguridad
    $mail->Host = "smtp.gmail.com"; // servidor smtp
    $mail->Port = 587; //puerto
    $mail->Username ='pruebasmedicohospital@gmail.com'; //nombre usuario
    $mail->Password = 'Lololol1'; //contraseña
    //Agregar destinatario
    //Campos del correo
    $subject='Items y maldiciones-ADDO';
    $message='Usted ha sido maldecido';
    $mail->AddAddress($s);
    $mail->Subject = $subject;
    $mail->Body = $message;
    //Avisar si fue enviado o no y dirigir al index
    if ($mail->Send()) {
        echo'<script type="text/javascript">
               alert("Enviado Correctamente");
            </script>';
    }
}
}
//}

?>
