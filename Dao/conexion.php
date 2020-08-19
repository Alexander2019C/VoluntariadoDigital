
<?php
// Parametros a configurar para la conexion de la base de datos
$host        = "localhost"; // sera el valor de nuestra BD
$basededatos = "tschool"; // sera el valor de nuestra BD
$usuariodb   = "root"; // sera el valor de nuestra BD
$clavedb     = "alex"; // sera el valor de nuestra BD


$conexion = new mysqli($host, $usuariodb, $clavedb, $basededatos);

if ($conexion->connect_errno) {
    echo "Nuestro sitio experimenta fallos....";
    exit();
}

?>
