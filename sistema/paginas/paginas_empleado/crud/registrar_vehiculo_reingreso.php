
<?php

// incertar en la base de datos en las tablas vheiculos y estados_vehiculos 
if (isset($_POST['reingreso'])) {
  
  $placa = $_POST['placa'];
  $fecha_ingreso = $_POST['fecha_ingreso'];
  $diagnostico_entrada = $_POST['diagnostico_entrada'];
  $idestado1 = $_POST['idestado1'];

    try {      
          $connection->beginTransaction();

          $consulta_reingreso = $connection->prepare("INSERT INTO vehiculos_estados(fecha_ingreso,diagnostico_entrada,placa1,idestado1) VALUES (:fecha_ingreso,:diagnostico_entrada,:placa,:idestado1)");
          $consulta_reingreso->bindParam("fecha_ingreso", $fecha_ingreso, PDO::PARAM_STR);
          $consulta_reingreso->bindParam("diagnostico_entrada", $diagnostico_entrada, PDO::PARAM_STR);
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
    echo "Error: No se guardaron  los datos ❌";
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
      <form id="vehiculo_insert" action=" " method="post" class="modal-form modal-form-registro">
            <div class="div-padre-form"> 
          
              <div class="div-hijo1 div-hj1-reingreso">
                <label id="lb-placa">Placa</label>
                <input type="text"  name="placa" required>
         
                <label class="lb-margenTop">Fecha ingreso</label>
                <input type="date"  name="fecha_ingreso" required>
                      
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
                <textarea class="textarea-dg-entrada-reingreso" name="diagnostico_entrada" required></textarea>
              </div>
            </div>

              <input  class="btn-actualizar btn-registrar" type="submit" name="reingreso" value="Registrar">
      </form>
    </div>
    </div>
</div>
</div>