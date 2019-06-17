<?php
$contraseña = "toor";
$usuario = "root";
$nombre_base_de_datos = "test";
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'toor');
}catch(Exception $e){
	echo "Ocurrio algo con la base de datos" . $e->getMessage();
}
 ?>
