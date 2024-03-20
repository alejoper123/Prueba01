<?php   
class GestionarDB{
    var $servidor;
    var $usuario;
    var $clave;
    var $base;

    function __construct(){
        $this->servidor = "localhost";
        $this->usuario = "alejandro";
        $this->clave = "elsalvador";
        $this->base= "universidad";

    }

    //funcion para conectar a la base de datos 

    public function conexion(){
        $Conexion = new mysqli($this->servidor, $this->usuario, $this->clave, $this->base);
        if ($Conexion->connect_error){
            die("Conexion Fallida". $Conexion->connect_error);
        }
        return $Conexion;
    }

   

}

?>