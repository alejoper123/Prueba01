<?php 
require('Seguridad/seguridad.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<!-- **Agregando CSS por medio de Boostrap a nuestro diseño-->
<link rel="stylesheet" type ="text/css" href="bootstrap-5/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento HTML Básico</title>
</head>
<body>
    <div class="container">
        <div class = "row">
            <a class="drop_down-item" href= Seguridad/salir.php>CERRAR SESION</a>
        </div>
        <div class="row">
            <div class="colum">
                <?php echo ("Estoy llegando : ". $_SESSION["NombreUsuario"]. "<br>");
                 echo("y mi Roll es : ". $_SESSION["Roll"]);?>
            </div>
            <div class="colum">
            <ul class="list-group">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
    <!-- **Agregando JS por medio de Boostrap a nuestro diseño-->
    <script type="text/javascript" scr="bootstrap-5/js/bootstrap.min.js"></script>
</body>
</html>