<?php
    session_start();
	include_once('../config/conexionBD.php');
 
   if (isset($_SESSION['user_cedula'])){

    $cedula = $_SESSION['user_cedula'];
    $rol = $_SESSION['user_rol'];
    $nombre = $_SESSION['user_nombre'];
    $apellido = $_SESSION['user_apellido'];
    
    include_once('plantilla.php');
   }
?>
