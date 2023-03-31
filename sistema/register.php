<?php

include('config/conexion.php');
session_start();
 
if (isset($_POST['register'])) {
 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
 
    $query = $connection->prepare("SELECT * FROM pasajeros WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<script>alert ("¡Este correo electrónico ya existe!")</script>';
    }
 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO pasajeros(NOMBRE,APELLIDO,CELULAR,PASSWORD,EMAIL) VALUES (:nombre,:apellido,:celular,:password_hash,:email)");
        $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
        $query->bindParam("apellido", $apellido, PDO::PARAM_STR);
        $query->bindParam("celular", $celular, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();
 
        if ($result) {
            echo '<script>alert ("¡Tu registro fue exitoso!")</script>';
        } else {
            echo '<script>alert ("¡Algo salió mal!")</script>';
        }
    }
}
 $query = null;
?>

<HTML>
<head>
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registrar Usuario</title>
</head>
<body class="registerbody">

<form method="post" action="" class=" formregistro " >
        <div class="formregis">
        <label class="label">Nombre</label>
        <input type="text" name="nombre"  required class="registro_input"/>
  
        <label class="label">Apellido</label>
        <input type="text" name="apellido"  required class="registro_input" />
    
        <label class="label">Celular</label>
          <input type="tel" name="celular" required class="registro_input"/>
         </div>
         <div class="formregis all">
        <label class="label">Email</label>
        <input type="email" name="email" required class="registro_input"/>
   
        <label class="label">Contraseña</label>
        <input type="password" name="password" required class="registro_input"/>
        <br>
        <button type="submit" name="register" value="register" class="registrar_btn">Registrar</button>
        <a href="login.php" class="elemento_a">Login</a>
        </div>
    </form>
</body>
</HTML>