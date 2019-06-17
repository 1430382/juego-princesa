INSERT INTO ASISTENCIA (idjugadores,total) values(1,10);

INSERT INTO ITEMS (nombre,categoria,tipo,precio,thumb) values("Muerte prematura","Item","Individual",15,"muerte.png");
INSERT INTO ITEMS (nombre,categoria,tipo,precio,thumb) values("Lagrimas de amigos","Item","Colectivo",60,"tear.png");
INSERT INTO ITEMS (nombre,categoria,tipo,precio,thumb) values("Reloj de arena","Item","Individual",5,"sandclock.png");
INSERT INTO ITEMS (nombre,categoria,tipo,precio,thumb) values("Clon de sombras","Item","Individual",5,"clonSombra.jpg");
INSERT INTO ITEMS (nombre,categoria,tipo,precio,thumb) values("Teletransportacion menor","Item","Individual",7,"teleport.png");
INSERT INTO ITEMS (nombre,categoria,tipo,precio,thumb) values("Teletransportacion mayor","Item","Colectivo",40,"teleport.png");
INSERT INTO ITEMS (nombre,categoria,tipo,precio,thumb) values("Veneno menor","Maldición","Individual",10,"menor.png");
INSERT INTO ITEMS (nombre,categoria,tipo,precio,thumb) values("Veneno medio","Maldición","Colectivo",15,"mayor.png");
INSERT INTO ITEMS (nombre,categoria,tipo,precio,thumb) values("Tortura simple","Maldición","Individual",15,"muertePrematura.png");

INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma,idusuarios) values(1730042,"Rebeca","Gonzalez Batista","Dinamita","mujer",100,0,1);
INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma,idusuarios) values("1730123","Jose Leonardo","Amaya Escobedo","Dinamita","hombre",100,0,2);
INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma) values("1730516","Cruz Alejandro","Cordova Alanis","Dinamita","hombre",100,0);
INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma) values("1730151","Pedro Luis","Espinoza Martinez","Dinamita","hombre",100,0);
INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma) values("1730138","Oscar Francisco","Perez Galardo","Equipo 2","hombre",100,0);
INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma) values("1730292","Reyna","Garcia de Leon","Equipo 2","mujer",100,0);
INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma) values("1730175","Edwin Eliud","Garcia Gomez","Equipo 2","hombre",100,0);
INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma) values("1730580","Andres Fidel","Garcia Gomez","Equipo 2","hombre",100,0);
INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma) values("1730380","Jonathan","Garcia Gonzalez","jojos","hombre",100,0);
INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma) values("1730381","Jovan","Garcia Gonzalez","jojos","hombre",100,0);
INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma) values("1730020","Sebastian","Hernandez Cepeda","jojos","hombre",100,0);
INSERT INTO JUGADORES (matricula,nombre,apellidos,equipo,genero,vida,fantasma) values("1730055","Edwin","Hernandez Martinez","jojos","hombre",100,0);
INSERT INTO MISIONES (nombre,descripcion,recompensa,fecha,idjugadores) values("Exponer","juego terminado",100,"2019-06-17",2);
