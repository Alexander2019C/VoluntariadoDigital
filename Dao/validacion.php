<?php
session_start();

if (!isset($_SESSION['dni'])) {
    header('location:../index.html');
}
if ($_SESSION['tipo'] == 'ADMINISTRADOR') {
    include "../Administrador.php";
}
if ($_SESSION['tipo'] == 'estudiante') {
    include "../estudiante.php";
} 
if ($_SESSION['tipo'] == 'voluntario') {
    include "../voluntario.php";
}else {
    include "../entrada.php";
}
?>