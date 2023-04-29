
<?php

    // incertar en la base de datos en las tablas vheiculos y estados_vehiculos 
    if (isset($_POST['registrar'])) {
      
      $placa = $_POST['placa'];
      $color = $_POST['color'];
      $marca = $_POST['marca'];
      $cedula = $_POST['cedula'];
      $fecha_ingreso = $_POST['fecha_ingreso'];
      $diagnostico_entrada = $_POST['diagnostico_entrada'];
      $idestado1 = $_POST['idestado1'];
 
      try {      
        $connection->beginTransaction();

              $consulta_insert1 = $connection->prepare("INSERT INTO vehiculo(placa,color,marca,cedula2) VALUES (:placa,:color,:marca,:cedula) ");
              $consulta_insert1->bindParam("placa", $placa, PDO::PARAM_STR);
              $consulta_insert1->bindParam("color", $color, PDO::PARAM_STR);
              $consulta_insert1->bindParam("marca", $marca, PDO::PARAM_STR);
              $consulta_insert1->bindParam("cedula", $cedula, PDO::PARAM_STR);
              $result_1 = $consulta_insert1->execute();


              $consulta_insert2 = $connection->prepare("INSERT INTO vehiculos_estados(fecha_ingreso,diagnostico_entrada,placa1,idestado1) VALUES (:fecha_ingreso,:diagnostico_entrada,:placa,:idestado1)");
              $consulta_insert2->bindParam("fecha_ingreso", $fecha_ingreso, PDO::PARAM_STR);
              $consulta_insert2->bindParam("diagnostico_entrada", $diagnostico_entrada, PDO::PARAM_STR);
              $consulta_insert2->bindParam("placa", $placa, PDO::PARAM_STR);
              $consulta_insert2->bindParam("idestado1", $idestado1, PDO::PARAM_STR);
              $result_2 = $consulta_insert2->execute();
           
           
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
<div class="modal fade" id="modal-lg-registrar">
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
              
                  <div class="div-hijo1 div-hj1">
                    <label id="lb-placa">Placa</label>
                    <input type="text"  name="placa" required>
                          
                    <label class="lb-margenTop">Color</label>
                    <input type="text"  name="color"  required>
                        
                    <label class="lb-margenTop">Marca</label>
                    <input type="text"  name="marca" required>
                  </div>

                  <div class="div-hijo2 div-hj2">
                    <label id="cedula">Cedula</label>
                    <input type="bigint"  name="cedula" required>
             
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

                  <diV class="div-hijo3 div-hj3">                      
                    <label id="dg-entrada">Diagnostico de entrada</label>
                    <textarea class="textarea-dg-entrada" name="diagnostico_entrada" required></textarea>
                  </div>
                </div>

                  <input  class="btn-actualizar btn-registrar" type="submit" name="registrar" value="Registrar">
          </form>
        </div>
		</div>
  </div>
</div>