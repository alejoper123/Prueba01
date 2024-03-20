<?php
//Modelo de objeto de alumno de la tabla base de 
class usuarios {
    var $id=0;
    var $Nombre="SIN ESPECIFICAR";
    var $Apellido="SIN ESPECIFICAR";
    var $Usuario="SIN ESPECIFICAR";
    var $Clave="SIN ESPECIFICAR";
    var $Correo="SIN ESPECIFICAR";
    var $Telefono="SIN ESPECIFICAR";
    var $Roll=0;
    var $Estado="SIN ESPECIFICAR";
    var $CodigoVerificacion="SIN ESPECIFICAR";
    var $ModoAutenticar="SIN ESPECIFICAR";
    var $UsuarioCreacion="SIN ESPECIICAR";
    var $DireccionIP="SIN ESPECIFICAR";

    function __construct(){


//Este metodo nos sirve para escribiry guardar y escribir una sentencia SQL

    }
public function autenticarUsuario(){
    $QueryComprobar="SELECT * FROM usuarios WHERE Usuario='";
    $QueryComprobar.= $this->Usuario;
    $QueryComprobar.="' AND Clave='";
    $QueryComprobar.=$this->Clave;
    $QueryComprobar.="' AND estado=0";
    return $QueryComprobar;
}


}

?>