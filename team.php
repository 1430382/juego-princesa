<?php
include 'backend/conexion.php';
session_start();
if(!isset($_SESSION)) {
    //Revisa si la sesión ha sido inciada ya
    session_start();
}
if($_SESSION['rol']==0){
	header("location: login.php");
}

$usuario = $_SESSION['idjugador'];
//echo "<h2>" . $usuario . "</h2>";
 ?>

<!DOCTYPE html>
<html>
<head>
  <script>
  	/* Funcion para mostrar la fecha y hora a tiempo real*/
  		function startTime(){
  		today=new Date();


  		var date = new Date();
  		var d  = date.getDate();
  		var day = (d < 10) ? '0' + d : d;
  		var mm = date.getMonth() + 1;
  		var month = (mm < 10) ? '0' + mm : mm;
  		var yy = date.getYear();
  		var year = (yy < 1000) ? yy + 1900 : yy;


  		h=today.getHours();
  		m=today.getMinutes();
  		s=today.getSeconds();
  		m=checkTime(m);
  		s=checkTime(s);
  		document.getElementById('reloj').innerHTML="Fecha: "+day+"/"+month+"/"+year+", Hora: "+h+":"+m+":"+s;
  		t=setTimeout('startTime()',500);}
  		function checkTime(i)
  		{if (i<10) {i="0" + i;}return i;}
  		window.onload=function(){startTime();}

  	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--<link rel="stylesheet" type="text/css" href="css/teams.css">-->
  <link rel="stylesheet" type="text/css" href="css/teamDesign.css">
  <link rel="stylesheet" text="text/css" href="css/fontMinecraft.css">
	<title>Teams</title>

</head>
<?php
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
      //var_dump($equipo);
      }
?>
<body style="background-image: url(img/background-teams.jpg);">
	<!---
	  HEADER
	   -------------->
	<?php include "header.php" ?>


  <!--Información del equipo-->
  <div class="col mb-5">
     <?php
     include_once 'connect.php';

     $sentencia= "SELECT * from JUGADORES where equipo='$equipo' LIMIT 1";
     foreach ($base_de_datos->query($sentencia) as $row){
         $equipoid = $row['equipo'];
         //var_dump($equipoid);
         #Inicio del ciclo de visualizacion de equipos.
       echo "<div class='card bordes mt-5 ml-5' style='max-width: 25rem;'>";
         #<!--Nombre del equipo-->
         echo  "<div class='card-header border-dark header red shadow'><h5>Equipo: ".$row['equipo']."</h5></div>";
         #<!--Cuerpo-->
         echo "<div class='card-body text-success bg-dark body'>";
             #<!--Jugador-->
             $hp=0; #Para sumar la vida de los jugadores.
             $conteo=0; #Para contar a los integrantes de cada equipo.
             $muestra=0; #Para mostrar el boton del su equipo
             $sentencia2= "SELECT * FROM JUGADORES WHERE equipo ='$equipo'";
             foreach ($base_de_datos->query($sentencia2) as $row2){
                 $ps = $row2['vida'];
                 $hp=$hp+$row2['vida'];
                 $conteo=$conteo+1;
                 echo "<div class='row mt-1 white'>";
                #<!--Imagen del jugador-->
                 if($row2['vida']>=1)
                 {
                   echo "<div class='col-2'><img src='img/teams/steve.png' class='userIcon' width='40'></div>";
                 }
                 else
                 {
                   echo "<div class='col-2'><img src='img/teams/steveDead.png' class='userIcon' width='40'></div>";
                 }

           echo "<div class='col-10'>";
           #<!--Nombre del jugador-->
             echo $row2['nombre'];
             echo "<br>";
             #<!--Mostrando vida-->
             $band = 0;
             for ($i = 1; $i <= 10; $i++) {
                 if($band == 1){
                    echo '<img src="img/teams/hpVacio.png" width="20">';
                 }else{
                    if($i*10 <= $ps){
                        if($i*10 == $ps){
                             $band = 1;
                            }
                    echo '<img src="img/teams/hp.png" width="20">';
                    }else{
                       echo '<img src="img/teams/hpmid.png" width="20">';
                       $band = 1;
                       }
                    }
               }
               #Total de PS:
               echo "           ".$row2['vida']." PS";
               echo "<br>";
                  #<!--Mostrando buffs y debuffs-->
                   if($row2['vida']>0)
                   {
                     echo "<img src='img/teams/vivo.png' class='ml-2' title='Estas vivo, por ahora...' width='20'>";
                   }

                   if($row2['vida']>=100)
                   {
                     echo "<img src='img/teams/star.gif' class='ml-2' title='Derecho a reclamar a la princesa.' width='20'>";
                   }
                   if($row2['vida']<=0)
                   {
                     echo "<img src='img/teams/phantom.png' class='ml-2' title='Estado fantasma' width='25'>";
                   }
                   echo "<br><br>";

                 echo "</div> <!--Fin del cuerpo del jugador-->";
             echo "</div> <!--Fin del jugador 1-->";

                #Comprobando si el usuario actual se encuentra en el equipo
                if($row2['idjugadores']==$user && $muestra==0)
               {
                 $muestra=1;
               }

               #Verificando si el equipo tiene items grupales
               $sentencia3= "SELECT * FROM INVENTARIO_ITEMS";
               foreach ($base_de_datos->query($sentencia3) as $row3){
                if($row3['idjugadores']==$row2['idjugadores'] && $row3['iditems']==2)
                {
                  echo "<img src='img/tienda/MostrarItems/lagrimasCuadro.png' class='ml-5' title='Estado fantasma' width='50'>";
                }
                if($row3['idjugadores']==$row2['idjugadores'] && $row3['iditems']==6)
                {
                  echo "<img src='img/tienda/MostrarItems/teleportMayorCuadro.png' class='ml-5' title='Estado fantasma' width='50'>";
                }
              }#Fin de sentencia 3

             }#Fin de sentencia 2

             #Seccion de promedio de vida
             $promedio=$hp/$conteo;
             $band = 0;

               echo "<div class='text-center mt-4 white'>";

               for ($i = 1; $i <= 10; $i++) {
                 if($band == 1){
                   echo '<img src="img/teams/hpVacio.png" width="20">';
                 }else{
                   if($i*10 <= $promedio){
                     if($i*10 == $promedio){
                       $band = 1;
                     }
                     echo '<img src="img/teams/hp.png" width="20">';
                 }else{
                   echo '<img src="img/teams/hpmid.png" width="20">';
                   $band = 1;
                 }
                 }
                 }


                echo "
                 <br>
                  PROMEDIO: ".$promedio." /100  PS
                  </div>";
               $hp=0;
              $conteo=0;



         echo "</div> <!--Fin del Cuerpo-->";
           echo "<div class='card-footer border-success foot'>";
           if($muestra==1)
           {
             $muestra=0;
             echo "<button class='boton'>USAR</button>";
           }
           echo "</div><!--Fin del FOOT-->";
       echo "</div> <!--Fin EQUIPO 1-->";
     }
     ?> <!--Fin del ciclo PHP-->
       </div> <!--FIN DE LOS EQUIPOS-->
       <!--  -->
       <!--Información del equipo-->
       <div class="col mb-5" style= "float:left;margin-left:500px;margin-top:-750px;">
          <?php
          include_once 'connect.php';

          $sentencia= "SELECT * from JUGADORES where equipo='Equipo 2' LIMIT 1";
          foreach ($base_de_datos->query($sentencia) as $row){
              $equipoid = $row['equipo'];
              //var_dump($equipoid);
              #Inicio del ciclo de visualizacion de equipos.
            echo "<div class='card bordes mt-5 ml-5' style='max-width: 25rem;'>";
              #<!--Nombre del equipo-->
              echo  "<div class='card-header border-dark header red shadow'><h5>Equipo: ".$row['equipo']."</h5></div>";
              #<!--Cuerpo-->
              echo "<div class='card-body text-success bg-dark body'>";
                  #<!--Jugador-->
                  $hp=0; #Para sumar la vida de los jugadores.
                  $conteo=0; #Para contar a los integrantes de cada equipo.
                  $muestra=0; #Para mostrar el boton del su equipo
                  $sentencia2= "SELECT * FROM JUGADORES WHERE equipo ='Equipo 2'";
                  foreach ($base_de_datos->query($sentencia2) as $row2){
                      $ps = $row2['vida'];
                      $hp=$hp+$row2['vida'];
                      $conteo=$conteo+1;
                      echo "<div class='row mt-1 white'>";
                     #<!--Imagen del jugador-->
                      if($row2['vida']>=1)
                      {
                        echo "<div class='col-2'><img src='img/teams/steve.png' class='userIcon' width='40'></div>";
                      }
                      else
                      {
                        echo "<div class='col-2'><img src='img/teams/steveDead.png' class='userIcon' width='40'></div>";
                      }

                echo "<div class='col-10'>";
                #<!--Nombre del jugador-->
                  echo $row2['nombre'];
                  echo "<br>";
                  #<!--Mostrando vida-->
                  $band = 0;
                  for ($i = 1; $i <= 10; $i++) {
                      if($band == 1){
                         echo '<img src="img/teams/hpVacio.png" width="20">';
                      }else{
                         if($i*10 <= $ps){
                             if($i*10 == $ps){
                                  $band = 1;
                                 }
                         echo '<img src="img/teams/hp.png" width="20">';
                         }else{
                            echo '<img src="img/teams/hpmid.png" width="20">';
                            $band = 1;
                            }
                         }
                    }
                    #Total de PS:
                    echo "           ".$row2['vida']." PS";
                    echo "<br>";
                       #<!--Mostrando buffs y debuffs-->
                        if($row2['vida']>0)
                        {
                          echo "<img src='img/teams/vivo.png' class='ml-2' title='Estas vivo, por ahora...' width='20'>";
                        }

                        if($row2['vida']>=100)
                        {
                          echo "<img src='img/teams/star.gif' class='ml-2' title='Derecho a reclamar a la princesa.' width='20'>";
                        }
                        if($row2['vida']<=0)
                        {
                          echo "<img src='img/teams/phantom.png' class='ml-2' title='Estado fantasma' width='25'>";
                        }
                        echo "<br><br>";

                      echo "</div> <!--Fin del cuerpo del jugador-->";
                  echo "</div> <!--Fin del jugador 1-->";

                     #Comprobando si el usuario actual se encuentra en el equipo
                     if($row2['idjugadores']==$user && $muestra==0)
                    {
                      $muestra=1;
                    }

                    #Verificando si el equipo tiene items grupales
                    $sentencia3= "SELECT * FROM INVENTARIO_ITEMS";
                    foreach ($base_de_datos->query($sentencia3) as $row3){
                     if($row3['idjugadores']==$row2['idjugadores'] && $row3['iditems']==2)
                     {
                       echo "<img src='img/tienda/MostrarItems/lagrimasCuadro.png' class='ml-5' title='Estado fantasma' width='50'>";
                     }
                     if($row3['idjugadores']==$row2['idjugadores'] && $row3['iditems']==6)
                     {
                       echo "<img src='img/tienda/MostrarItems/teleportMayorCuadro.png' class='ml-5' title='Estado fantasma' width='50'>";
                     }
                   }#Fin de sentencia 3

                  }#Fin de sentencia 2

                  #Seccion de promedio de vida
                  $promedio=$hp/$conteo;
                  $band = 0;

                    echo "<div class='text-center mt-4 white'>";

                    for ($i = 1; $i <= 10; $i++) {
                      if($band == 1){
                        echo '<img src="img/teams/hpVacio.png" width="20">';
                      }else{
                        if($i*10 <= $promedio){
                          if($i*10 == $promedio){
                            $band = 1;
                          }
                          echo '<img src="img/teams/hp.png" width="20">';
                      }else{
                        echo '<img src="img/teams/hpmid.png" width="20">';
                        $band = 1;
                      }
                      }
                      }


                     echo "
                      <br>
                       PROMEDIO: ".$promedio." /100  PS
                       </div>";
                    $hp=0;
                   $conteo=0;



              echo "</div> <!--Fin del Cuerpo-->";
                echo "<div class='card-footer border-success foot'>";
                if($muestra==1)
                {
                  $muestra=0;
                  echo "<button class='boton'>USAR</button>";
                }
                echo "</div><!--Fin del FOOT-->";
            echo "</div> <!--Fin EQUIPO 1-->";
          }
          ?> <!--Fin del ciclo PHP-->
            </div> <!--FIN DE LOS EQUIPOS-->
       <!--  -->
       <!--  -->
       <!--Información del equipo-->
       <div class="col mb-5" style= "float:left;margin-left:1000px;margin-top:-750px;">
          <?php
          include_once 'connect.php';

          $sentencia= "SELECT * from JUGADORES where equipo='Equipo 3' LIMIT 1";
          foreach ($base_de_datos->query($sentencia) as $row){
              $equipoid = $row['equipo'];
              //var_dump($equipoid);
              #Inicio del ciclo de visualizacion de equipos.
            echo "<div class='card bordes mt-5 ml-5' style='max-width: 25rem;'>";
              #<!--Nombre del equipo-->
              echo  "<div class='card-header border-dark header red shadow'><h5>Equipo: ".$row['equipo']."</h5></div>";
              #<!--Cuerpo-->
              echo "<div class='card-body text-success bg-dark body'>";
                  #<!--Jugador-->
                  $hp=0; #Para sumar la vida de los jugadores.
                  $conteo=0; #Para contar a los integrantes de cada equipo.
                  $muestra=0; #Para mostrar el boton del su equipo
                  $sentencia2= "SELECT * FROM JUGADORES WHERE equipo ='Equipo 3'";
                  foreach ($base_de_datos->query($sentencia2) as $row2){
                      $ps = $row2['vida'];
                      $hp=$hp+$row2['vida'];
                      $conteo=$conteo+1;
                      echo "<div class='row mt-1 white'>";
                     #<!--Imagen del jugador-->
                      if($row2['vida']>=1)
                      {
                        echo "<div class='col-2'><img src='img/teams/steve.png' class='userIcon' width='40'></div>";
                      }
                      else
                      {
                        echo "<div class='col-2'><img src='img/teams/steveDead.png' class='userIcon' width='40'></div>";
                      }

                echo "<div class='col-10'>";
                #<!--Nombre del jugador-->
                  echo $row2['nombre'];
                  echo "<br>";
                  #<!--Mostrando vida-->
                  $band = 0;
                  for ($i = 1; $i <= 10; $i++) {
                      if($band == 1){
                         echo '<img src="img/teams/hpVacio.png" width="20">';
                      }else{
                         if($i*10 <= $ps){
                             if($i*10 == $ps){
                                  $band = 1;
                                 }
                         echo '<img src="img/teams/hp.png" width="20">';
                         }else{
                            echo '<img src="img/teams/hpmid.png" width="20">';
                            $band = 1;
                            }
                         }
                    }
                    #Total de PS:
                    echo "           ".$row2['vida']." PS";
                    echo "<br>";
                       #<!--Mostrando buffs y debuffs-->
                        if($row2['vida']>0)
                        {
                          echo "<img src='img/teams/vivo.png' class='ml-2' title='Estas vivo, por ahora...' width='20'>";
                        }

                        if($row2['vida']>=100)
                        {
                          echo "<img src='img/teams/star.gif' class='ml-2' title='Derecho a reclamar a la princesa.' width='20'>";
                        }
                        if($row2['vida']<=0)
                        {
                          echo "<img src='img/teams/phantom.png' class='ml-2' title='Estado fantasma' width='25'>";
                        }
                        echo "<br><br>";

                      echo "</div> <!--Fin del cuerpo del jugador-->";
                  echo "</div> <!--Fin del jugador 1-->";

                     #Comprobando si el usuario actual se encuentra en el equipo
                     if($row2['idjugadores']==$user && $muestra==0)
                    {
                      $muestra=1;
                    }

                    #Verificando si el equipo tiene items grupales
                    $sentencia3= "SELECT * FROM INVENTARIO_ITEMS";
                    foreach ($base_de_datos->query($sentencia3) as $row3){
                     if($row3['idjugadores']==$row2['idjugadores'] && $row3['iditems']==2)
                     {
                       echo "<img src='img/tienda/MostrarItems/lagrimasCuadro.png' class='ml-5' title='Estado fantasma' width='50'>";
                     }
                     if($row3['idjugadores']==$row2['idjugadores'] && $row3['iditems']==6)
                     {
                       echo "<img src='img/tienda/MostrarItems/teleportMayorCuadro.png' class='ml-5' title='Estado fantasma' width='50'>";
                     }
                   }#Fin de sentencia 3

                  }#Fin de sentencia 2

                  #Seccion de promedio de vida
                  $promedio=$hp/$conteo;
                  $band = 0;

                    echo "<div class='text-center mt-4 white'>";

                    for ($i = 1; $i <= 10; $i++) {
                      if($band == 1){
                        echo '<img src="img/teams/hpVacio.png" width="20">';
                      }else{
                        if($i*10 <= $promedio){
                          if($i*10 == $promedio){
                            $band = 1;
                          }
                          echo '<img src="img/teams/hp.png" width="20">';
                      }else{
                        echo '<img src="img/teams/hpmid.png" width="20">';
                        $band = 1;
                      }
                      }
                      }


                     echo "
                      <br>
                       PROMEDIO: ".$promedio." /100  PS
                       </div>";
                    $hp=0;
                   $conteo=0;



              echo "</div> <!--Fin del Cuerpo-->";
                echo "<div class='card-footer border-success foot'>";
                if($muestra==1)
                {
                  $muestra=0;
                  echo "<button class='boton'>USAR</button>";
                }
                echo "</div><!--Fin del FOOT-->";
            echo "</div> <!--Fin EQUIPO 1-->";
          }
          ?> <!--Fin del ciclo PHP-->
            </div> <!--FIN DE LOS EQUIPOS-->
       <!--  -->
       <style media="screen">
       div.ex1 {
  background-color: black;
  width: 400px;
  height: 200px;
  overflow: scroll;
}
       </style>
       <!--Boton de AYUDA que seguira a la direccion de la pantalla-->
       <div class="bottom-right" >
       <div class=" mr-5 mt-3 " >
                  <!--Inicio del Log de Actividades-->
                <div class="card bordes" >
                   <!--Nombre del equipo-->
                   <div class="card-header border-dark header red shadow" ><h5>Log de Actividades</h5></div>
                   <!--Cuerpo-->
                   <div class="ex1" >
                       Novedades:
                       <br>
                      <?php
                           include_once 'connect.php';
                           $sentencia= "SELECT * FROM HISTORIAL";
                           foreach ($base_de_datos->query($sentencia) as $row){
                               #Mostrando cada una de las descripciones en el LOG
                               echo "<font size=1 class='yellow text-justify mt-2 pl-2 pr-2'>".$row['descripcion']."</font><div class='mt-1'></div>";
                               echo "<font size=1  class='gray text-right mt-2 pl-2 pr-2 mb-4 '>Fecha: ".$row['fecha']."</font><div class='mb-2'></div>";
                       }
                       ?>
                   </div>

                   <div class="card-footer border-success foot dark_gray" >
                           <div id="reloj" style="font-size:13px;"></div>
                   </div>
               </div> <!--Fin del Log de actividades-->
               </div>
       	</div>
       </body>
       </html>
       <div style="color:white;margin-top:auto; margin-left:auto;">
       <a href="logout.php">
           <img src="img/exit.png" class="center" id="navbar-img" >
           <h1 class="center-text">Atras</h1>
         </a>
       </div>
