CREATE TABLE `USUARIOS` (
  `idusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  PRIMARY KEY (`idusuarios`),
  UNIQUE KEY `idusuarios` (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
insert into USUARIOS values(1730042,"Rebeca");

  CREATE TABLE `ITEMS` (
    `iditems` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    `categoria` varchar(50) NOT NULL,
    `tipo` varchar(50) NOT NULL,
    `precio` int(100) NOT NULL,
    `fecha` date DEFAULT NULL,
    PRIMARY KEY (`iditems`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `INVENTARIO_ITEMS` (
  idinventario int(11) NOT NULL auto_increment,
  idjugadores int,
  iditems int,
  foreign key (iditems) references ITEMS (iditems),
  foreign key (idjugadores) references JUGADORES (idjugadores),
  PRIMARY KEY (idinventario,idjugadores,iditems)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `INVENTARIO_MISIONES` (
  `MISIONES_id` int(11) NOT NULL,
  PRIMARY KEY (`MISIONES_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `JUGADORES` (
  `idjugadores` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `equipo` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `vida` int(100) NOT NULL,
  `fantasma` tinyint(1) DEFAULT NULL,
  `idusuarios` int(11) DEFAULT NULL,
  PRIMARY KEY (`idjugadores`),
  UNIQUE KEY `idusuarios` (`idusuarios`),
  CONSTRAINT `JUGADORES_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `USUARIOS` (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

CREATE TABLE `MISIONES` (
  `id` int(11) auto_increment,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `recompensa` int NOT NULL,
  `fecha` date NOT NULL,
  `idjugadores` int (11),
  PRIMARY KEY (`id`,`idjugadores`),
  foreign key (idjugadores) references JUGADORES (idjugadores)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table ASISTENCIA(
idasistencia int auto_increment,
idjugadores int,
total int,
primary key(idasistencia,idjugadores),
foreign key (idjugadores) references JUGADORES (idjugadores)
);



-- stored procedure
 DELIMITER //
 CREATE PROCEDURE Clon_de_sombras(_ID INT(25))
   BEGIN
   UPDATE ASISTENCIA SET total=total+1 WHERE idasistencia=_ID;

   END //
 DELIMITER ;

DELIMITER $$
CREATE PROCEDURE iniciar_sesion(NOMBRE varchar(32), MATRICULA varchar(32))
BEGIN
select u.ROL,u.MATRICULA from Usuario u where u.NOMBRE = NOMBRE and u.MATRICULA=MATRICULA;
END$$
DELIMITER ;

DELIMITER //
CREATE PROCEDURE MuertePrematura(_MATRICULA int(20))
 BEGIN

 UPDATE JUGADORES SET vida=vida+1 WHERE fantasma=1 and matricula=_MATRICULA;
 END //
DELIMITER ;

 DELIMITER $$
CREATE PROCEDURE Lagrimas_de_amigos(_NUMERO_DE_EQUIPO INT(25))
BEGIN

   UPDATE JUGADORES SET vida=vida+5 WHERE fantasma=1 and equipo=_NUMERO_DE_EQUIPO;
   END$$
DELIMITER ;

 DELIMITER $$
CREATE PROCEDURE Reloj_de_arena(_ID INT(25))
BEGIN
   UPDATE MISIONES SET fecha=fecha+1  WHERE idjugadores=_ID;

   END$$
DELIMITER ;
 DELIMITER $$
CREATE PROCEDURE teletransportacion_mayor(_ID INT(25),_NUMERO_DE_EQUIPO INT(20))
BEGIN
	 UPDATE JUGADORES SET idjugadores=_ID WHERE equipo=_NUMERO_DE_EQUIPO;

   END$$
DELIMITER ;
 DELIMITER $$
CREATE PROCEDURE teletransportacion_menor(_ID INT(25),_ID1 INT(25))
BEGIN
    UPDATE MISIONES SET idjugadores=_ID1 WHERE idjugadores=_ID;

   END$$
DELIMITER ;

 DELIMITER $$
CREATE PROCEDURE tortura_simple(_ID INT(25),_NUM INT(25))
BEGIN
 UPDATE MISIONES set idjugadores = CAST(RAND() * _NUM AS UNSIGNED) where idjugadores=_ID;
 END$$
DELIMITER ;
--
DELIMITER $$
CREATE PROCEDURE veneno_menor(_ID INT(25),fechactual date)
BEGIN
UPDATE JUGADORES J
INNER JOIN INVENTARIO_ITEMS INV
ON J.idjugadores = INV.idjugadores
INNER JOIN ITEMS I ON I.iditems = INV.iditems SET J.vida=J.vida-1
WHERE J.idjugadores !=_ID AND I.fecha !=fechactual;
  END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE veneno_medio(_NUMERO_DE_EQUIPO INT(20),fechactual date)
BEGIN
UPDATE JUGADORES J
INNER JOIN INVENTARIO_ITEMS INV
ON J.idjugadores = INV.idjugadores
INNER JOIN ITEMS I ON I.iditems = INV.iditems SET J.vida=J.vida-1
WHERE J.equipo !=_NUMERO_DE_EQUIPO AND I.fecha !=fechactual;
  END$$
DELIMITER ;
