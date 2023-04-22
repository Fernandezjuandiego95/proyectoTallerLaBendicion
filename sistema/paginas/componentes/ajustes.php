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
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Launch Default Modal
                </button>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <h4 >CONFITRMAR</h4>
            <br>
            <h6 >Cambiar Contraseña</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
            <div class="modal-body">
              <p>Estas seguro de cambiar tu contraseña?</p>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->