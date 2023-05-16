
<?php

// incertar en la base de datos en las tablas vheiculos y estados_vehiculos 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reingreso_vehiculo"]) && $_POST["reingreso_vehiculo"] == "reingreso_vehiculo141") {
  
  $placa = $_POST['placa'];
  $fecha_ingreso = $_POST['fecha_ingreso'];
  $diagnostico_entrada = $_POST['diagnostico_entrada'];
  $idestado1 = $_POST['idestado1'];
  $fecha_salida = $_POST['fecha_salida'];

    try {      
          $connection->beginTransaction();

          $consulta_reingreso = $connection->prepare("INSERT INTO vehiculos_estados(fecha_ingreso,diagnostico_entrada,fecha_salida,placa1,idestado1) VALUES (:fecha_ingreso,:diagnostico_entrada,:fecha_salida,:placa,:idestado1)");
          $consulta_reingreso->bindParam("fecha_ingreso", $fecha_ingreso, PDO::PARAM_STR);
          $consulta_reingreso->bindParam("diagnostico_entrada", $diagnostico_entrada, PDO::PARAM_STR);
          $consulta_reingreso->bindParam("fecha_salida", $fecha_salida, PDO::PARAM_STR);
          $consulta_reingreso->bindParam("placa", $placa, PDO::PARAM_STR);
          $consulta_reingreso->bindParam("idestado1", $idestado1, PDO::PARAM_STR);
          $result_reingreso = $consulta_reingreso->execute();
       
       
        // Confirmar la transacción
        $connection->commit();
        header('Location: index.php?home=3');
        exit();
    } catch (PDOException $e) {
    // Deshacer todas las operaciones realizadas durante la transacción
        $connection->rollback();
    // Mostrar un mensaje de error al usuario
    echo "<script> alert('Error: No se guardaron  los datos ❌')</script>";
    //die($e->getMessage());
        
    }
        
}


?>

<!------------------Modal Diagnostico Entrada---------------->
<div class="modal fade" id="modal-lg-reingreso">
<div class="modal-dialog modal-lg" >
    <div class="modal-content" style="border-radius: 30px;border: solid  #BBB5B5; border-width: 2px 0px 0px 2px;">
        <!---------Encabezado-------------------------->
  <div class="encabezado">
      <div class="div-titulo">
        <h2 class="titulo-act color-verde">Nuevo Registro</h2>
      </div>
        <button type="button" class="close" style="color:red; font-size:50px;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
  </div>
      <!--------------------------------------------->
      <!----------Body------------------------------->
        <div class="modal-body">    
  <!-----------Formulario------------>
      <form id="form-vehiculo-nuevo-reingreso" action=" " method="post" class="modal-form modal-form-registro">
            <div class="div-padre-form"> 
          
              <div class="div-hijo1 div-hj1-reingreso">
                <label id="lb-placa">Placa</label>
                <input type="text"  name="placa" id="placa-nuevo-reingreso" required>
         
                <label class="lb-margenTop">Fecha ingreso</label>
                <input type="date"  name="fecha_ingreso" id="f-ingreso-nuevo-reingreso" min="<?=$fecha_minima?>" max="<?=$fecha_maxima?>" required>
                      
                <label class="lb-margenTop">Estado</label>
                <select class="form-control" name="idestado1" id="slt-estados">
                <option  selected>Seleccione</option>

                  <?php  for($i=0; $i<sizeof($Estados);$i++){
                      echo '<option  value='.$Estados[$i]["idestado"].'>'.$Estados[$i]["estado"].'</option>';
                  } ?>
                </select>
              </div>

              <diV class="div-hijo3 div-hj3-reingreso">                      
                <label id="dg-entrada">Diagnostico de entrada</label>
                <textarea class="textarea-dg-entrada-reingreso" name="diagnostico_entrada" id="d-entrada-nuevo-reingreso" required></textarea>
              </div>
            </div>
              <input type="hidden"  name="fecha_salida" value="<?=$fecha_salida_defecto?>" >
              <input type="hidden" name="reingreso_vehiculo" value="reingreso_vehiculo141">
              <input  class="btn-actualizar btn-registrar" type="submit"  value="Registrar">
      </form>
    </div>
    </div>
</div>
</div>

<!----Ventana modal para confirmar el envio del formulario--->
<div class="modal fade"  id="modal-confirmar-vehiculo-reingreso">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header" style="border-bottom: 4px solid #AEC0FF; font-family: 'Open Sans';">
            <div>
            <h3>CONFIRMAR</h3>
            <h6>Nuevo Reingreso</h6>
            </div>
              <button type="button" class="close" style="color:red; font-size:30px;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
            <div class="modal_contenido">
              <img src="../assets/img/actualizar.png" alt="actualizar" width="90px">
              <br/>
              <p class="text_cambiar">Estas seguro de CREAR este Reingreso?</p>
            </div>

            <div class="modal-footer justify-content-right" style="border-top:1px solid #D1D5DB;">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn-cambiar" name="vehiculoReingreso" id="btn-registrar-vehiculo-reingreso">Registrar</button>
            </div>
    </div>
  </div>
</div>
<!--------------Fin ventana modal-------------->
