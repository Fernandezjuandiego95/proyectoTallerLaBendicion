
<div id="mensaje" style="display:none">El registro se ha guardado correctamente.</div>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $nueva = $_POST["nueva"];
  $verificacion = $_POST["verificacion"];

  // Verificar que las contraseñas coincidan
  if($nueva == $verificacion) {

      // Generar el hash de la contraseña
     $nueva_hash = password_hash($nueva, PASSWORD_DEFAULT);

      //Actualizar la contraseña en la base de datos
      $actualizar = $connection->prepare("UPDATE usuarios SET password = :nueva_hash WHERE cedula = :cedula");
      $actualizar->bindParam(":nueva_hash", $nueva_hash);
      $actualizar->bindParam(":cedula", $cedula); 
      $actualizar->execute();
     
      echo '<script>alert ("Actualizado")</script>';
  } else{
      echo '<script>alert ("Las contraseñas no coinciden")</script>';
  }
}

?>


<div class="div_content_text">
  <h2 class="text_cont">Cambiar Contraseña:</h2>
</div>

<form action=""  method="post" class="form-ajustes">
  <input class="input-ajustes" type="password" id="nueva" name="nueva"  placeholder="Ingrese su nueva contraseña" required/>
  <br>
  <input class="input-ajustes" type="password" id="verificacion" name="verificacion"  placeholder="Confirme su nueva contraseña" required/>
  <br>
  <input type="submit" class="btn-ajustes" name="cambiar" value="Cambiar"/>
</form>

<div class="div-img-ajustes">
  <img src="../assets/img/monster_artist.svg" alt="Ilustracion" class="img1-ajustes">
  <img src="../assets/img/updates.svg" alt="Ilustracion" class="img2-ajustes">
</div>