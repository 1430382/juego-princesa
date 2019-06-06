<?php
class Database{
    //Los atributos de la conexión
    private $con;
    private $dbhost="localhost";
    private $dbuser="root";
    private $dbpass="";
    private $dbname="test";
    // Constructor, que llama al método connect_db
    function __construct(){
        $this->connect_db();
    }
    // Método que realiza la conexión a la base de datos
    public function connect_db(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if(mysqli_connect_error()){
            die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }
    }
    public function sanitize($var){
        $return = mysqli_real_escape_string($this->con, $var);
        return $return;
    }
    public function login($nombre){
        // Almacena la consulta
        $sql = "SELECT * FROM USUARIOS WHERE usuario='$nombre'";
          // Ejecuta la consulta con la conexión guardada
        $res = mysqli_query($this->con, $sql);
          // Guarda los datos que regresa la consulta
        $return = mysqli_fetch_object($res);
        return $return;
        }

      public function equipo($nombre){
            // Almacena la consulta
            $sql = "SELECT equipo from JUGADORES WHERE nombre='$nombre'";
            /* Ejecuta la consulta con la conexión guardada */
            $res = mysqli_query($this->con, $sql);
            /* Guarda los datos que regresa la consulta */
            $return = mysqli_fetch_object($res);
            return $return;
        }
      }
?>







    /////////


}
