<?php
require('../DB/conexion.php');
require('../Model/Alumnos/objAlumnos.php');


$objUsuario = new usuarios();
$objUsuario->Usuario=$_POST['NUsuario'];
$objUsuario->Clave=md5($_POST['NClave']);

//Almacenando en una variable valor de metodo alcanzado por medio de la instancia objUsuario
$consulta00 = $objUsuario->autenticarUsuario();
//echo($consulta00);

//Creando isntancia para conexion al Script que gestiona la base de dato
$establecerConex01 = new GestionarDB();
//Almacenando en una variable el valor de la resultante de la funcion conectar del Script "EstablecerConexion"
$con01 = $establecerConex01->conexion();

//Almacenando el resultado de la solicitud
$consulta01=$con01->query($consulta00);
$filas00=$consulta01->num_rows;

if($filas00 != 0){  
    while ($campo00 = $consulta01->fetch_assoc()){
        //Dentro de este While se almacena los nombres de las filas que aparecene en la base de datos
        // este nombre debe de ser igualito
        $objUsuario->Id=$campo00["Id"];
        $objUsuario->Nombre=$campo00["Nombre"];
        $objUsuario->Apdo=$campo00["Apellido"];
        $objUsuario->Correoelli=$campo00["Correo"];
        $objUsuario->Roll=$campo00["Roll"];

    }   
}
//echo($objUsuario->Nombre);
$consulta01->close();

if ($filas00 != 0){
    $Token=sha1(uniqid(rand(),true));
    $ArrVsession = array();
    $ArrVsession[0] = "Token";
    $ArrVsession[1] = "Id";
    $ArrVsession[2] = "NombreUsuario";
    $ArrVsession[3] = "ApellidoUsuario";
    $ArrVsession[4] = "IdUsuario";
    $ArrVsession[5] = "ClaveUsuario";
    $ArrVsession[6] = "Correo";
    $ArrVsession[7] = "Roll";

    session_start();
    $_SESSION[$ArrVsession[0]]=$Token;
    $_SESSION[$ArrVsession[1]]=$objUsuario->id;
    $_SESSION[$ArrVsession[2]]=$objUsuario->Nombre;
    $_SESSION[$ArrVsession[3]]=$objUsuario->Apellido;
    $_SESSION[$ArrVsession[4]]=$objUsuario->Usuario;
    $_SESSION[$ArrVsession[6]]=$objUsuario->Correo;
    $_SESSION[$ArrVsession[7]]=$objUsuario->Roll;

    //SINTAXIS (NOMBRE DE LA COOKIE, EL VALOR DE LA COOKIE, TIEMPO A DURAR DE LA COOKIE, DONDE SE ALOJARA LA COOKIE)
    setcookie($ArrVsession[0], $Token, time()+(60*60*24),"/");
    setcookie($ArrVsession[1], $objUsuario->id, time()+(60*60*24),"/");
    setcookie($ArrVsession[2], $objUsuario->Nombre, time()+(60*60*24),"/");
    setcookie($ArrVsession[3], $objUsuario->Apellido, time()+(60*60*24),"/");
    setcookie($ArrVsession[4], $objUsuario->Usuario, time()+(60*60*24),"/");
    setcookie($ArrVsession[6], $objUsuario->Correo, time()+(60*60*24),"/");
    setcookie($ArrVsession[7], $objUsuario->Roll, time()+(60*60*24),"/");
   
    header("Location: ../Home.php");


}

else{
    setcookie($ArrVsession[0], "", time()-1,"/");
    setcookie($ArrVsession[1], "", time()-1,"/");
    setcookie($ArrVsession[2], "", time()-1,"/");
    setcookie($ArrVsession[3], "", time()-1,"/");
    setcookie($ArrVsession[4], "", time()-1,"/");
    setcookie($ArrVsession[6], "", time()-1,"/");
    setcookie($ArrVsession[7], "", time()-1,"/");
}
 

$con01->close();

//echo($filas00);


?>