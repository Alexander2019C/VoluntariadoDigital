<?php
include 'conexion.php';
session_start();
$email    = $_POST['email'];
$emailMin     = strtoupper($email);
$password = $_POST['password'];
$result = mysqli_query($conexion, "SELECT
                Email,Password,p1,p2,p3,a1,a2,id,dni,puesto,tipo
                FROM usuariots WHERE Email = '$emailMin' ");

$row = mysqli_fetch_assoc($result);

$hash = $row['Password'];

if (password_verify($_POST['password'], $hash)) {

    $_SESSION['loggedin']  = true;
    $_SESSION['id']   = $row['id'];
    $_SESSION['p1']        = $row['p1'];
    $_SESSION['p2']        = $row['p2'];
    $_SESSION['p3']        = $row['p3'];
    $_SESSION['a1']        = $row['a1'];
    $_SESSION['a2']        = $row['a2'];
    $_SESSION['dni']        = $row['dni'];
    $_SESSION['puesto']    = $row['puesto'];
    $_SESSION['password']    = $row['Password'];
    $_SESSION['tipo']    = $row['tipo'];
    
    
    
    $_SESSION['start']     = time();
    $_SESSION['expire']    = $_SESSION['start'] + (1 * 60);
    echo "<script>
                location.href = 'index.php';</script>";

} else {
    echo "Email o contraseña incorrectos";

}
