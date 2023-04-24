<?php
//Inicializar la variable $connection (se asume que esto se hace en algún otro archivo incluido)
$contrasena_actualizada = null;

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
     
      //Establecer la variable $contrasena_actualizada a true para mostrar el Toast de éxito
     $contrasena_actualizada = true;
  } else{
     //Establecer la variable $contrasena_actualizada a false para mostrar el Toast de error
      $contrasena_actualizada = false;
    }
}

?>

<!------------Texto cambiar contraseña----------->
<div class="div_content_text">
  <h2 class="text_cont">Cambiar Contraseña:</h2>
</div>
<!----------------------------------------------->


<!------Formulario para cambiar la comtraseña------->
<form action=""  method="post" class="form-ajustes" id="form-cambiar-contrasena">
  <input class="input-ajustes" type="password" id="nueva" name="nueva"  placeholder="Ingrese su nueva contraseña" required/>
  <br>
  <input class="input-ajustes" type="password" id="verificacion" name="verificacion"  placeholder="Confirme su nueva contraseña" required/>
  <br>
  <button type="button" class="btn-ajustes" data-toggle="modal" data-target="#modal-cambiar-contrasena">Cambiar</button>
</form>
<!----------------Fin Formulario----------------->


<!-------------------Ilustraciones--------------->
<div class="div-img-ajustes">
  <img src="../assets/img/monster_artist.svg" alt="Ilustracion" class="img1-ajustes">
  <img src="../assets/img/updates.svg" alt="Ilustracion" class="img2-ajustes">
</div>
<!----------------Fin ilustraciones-------------->


<!----Ventana modal para confirmar el envio del formulario--->
<div class="modal fade"  id="modal-cambiar-contrasena">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header" style="border-bottom: 4px solid #AEC0FF; font-family: 'Open Sans';">
            <div>
            <h3>CONFIRMAR</h3>
            <h6>Cambiar Contraseña</h6>
            </div>
              <button type="button" class="close" style="color:red; font-size:30px;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
            <div class="modal_contenido">
              <img src="../assets/img/actualizar.png" alt="actualizar" width="90px">
              <br/>
              <p class="text_cambiar">Estas seguro de cambiar tu contraseña?</p>
            </div>

            <div class="modal-footer justify-content-right" style="border-top:1px solid #D1D5DB;">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn-cambiar" name="cambiar">Cambiar</button>
            </div>
    </div>
  </div>
</div>
<!--------------Fin ventana modal-------------->

<script>
  $(function() {
    <?php if(isset($contrasena_actualizada) && $contrasena_actualizada): ?>
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        icon: 'success',
        title: 'Contraseña actualizada'
      });
    <?php elseif(isset($contrasena_actualizada) && !$contrasena_actualizada): ?>
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        icon: 'error',
        title: 'Las contraseñas no coinciden'
      });
    <?php endif; ?>
  });

  // Confirmar el cambio de contraseña
  $('#form-cambiar-contrasena').submit(function(e) {
    e.preventDefault();
    $('#modal-cambiar-contrasena').modal('show');
  });
</script>