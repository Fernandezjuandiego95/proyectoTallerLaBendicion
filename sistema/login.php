<?php
 
include('config/conexionBD.php');
session_start();

 
if (isset($_POST['login'])) {
 
    $cedula = $_POST['cedula'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM usuarios WHERE CEDULA=:cedula");
    $query->bindParam("cedula", $cedula, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<script>alert("Contraseña o cedula incorrecto")</script>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_cedula'] = $result['cedula'];
            $_SESSION['user_rol'] = $result['idrol1'];
            $_SESSION['user_nombre'] = $result['nombre'];
            $_SESSION['user_apellido'] = $result['apellido'];
            echo '<script>alert("¡Bienvenido!")</script>';
            header("location:paginas/index.php?home=0");
        } else {
            echo '<script>alert ("Contraseña incorrecta")</script>';
        }
    }


}


?>

<HTML>
<head>
    <link rel="stylesheet" href="assets/css/estilos_login.css">
    <title>Iniciar Sesion</title>
</head>
<body>

<div class="div-transparent">
    <div class="img-mujer"></div>

<form method="post" action="" name="signin-form">
    <img src="assets/img/logo.jpeg" alt="logo" class="logo">
    <h2 class="h2-iniciar">Iniciar Sesión</h2>
    <div class="form-element">
        <label>Identificacion</label>
        <input type="text" name="cedula" placeholder="Ingrese su numero de cedula"  required />
        <label>Contraseña</label>
        <input type="password" name="password" placeholder="Ingrese su contraseña" required /><br>
        <button type="submit" name="login" value="login">Iniciar</button>
        <br>
    </div>
</form>

    <div class="img-hombre"></div>
</div>
</body>
</HTML>