<?php
    session_start();
	include_once('../config/conexionBD.php');
 
   if (isset($_SESSION['user_cedula'])){

    $rol = $_SESSION['user_rol'];
    $nombre = $_SESSION['user_nombre'];
    
    switch ($rol) {
        case 1:
            include_once('administrador.php');
            break;
            case 2:
                include_once('empleado.php');
                break;
                case 3:
                    include_once('cliente.php');
                    break;
        default:
        echo '<script>alert ("No tiene un Rol asignado")</script>';
            break;
    }
  
   }
?>
