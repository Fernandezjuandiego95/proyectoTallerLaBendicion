
<?php

    // incertar en la base de datos en las tablas vheiculos y estados_vehiculos 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrar_vehiculo"]) && $_POST["registrar_vehiculo"] == "registrar_vehiculo1234") {
      
      $placa = $_POST['placa'];
      $color = $_POST['color'];
      $marca = $_POST['marca'];
      $cedula = $_POST['cedula'];
      $fecha_ingreso = $_POST['fecha_ingreso'];
      $diagnostico_entrada = $_POST['diagnostico_entrada'];
      $idestado1 = $_POST['idestado1'];


      $consulta_existe = $connection->prepare("SELECT placa FROM vehiculo WHERE PLACA=:placa");
      $consulta_existe->bindParam("placa", $placa, PDO::PARAM_STR);
      $consulta_existe->execute();
   
      if ($consulta_existe->rowCount() > 0) {
        echo '<script>alert("¡Este Vehiculo ya existe!\nPor favor realice un Nuevo Reingreso")</script>';
      }
 
      if ($consulta_existe->rowCount() == 0) {
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
          echo "<script> alert('Error: No se guardaron  los datos ❌')</script>";
          // die($e->getMessage());
        }
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
          <form id="form-nuevo-vehiculo" action=" " method="post" class="modal-form modal-form-registro">
                <div class="div-padre-form"> 
              
                  <div class="div-hijo1 div-hj1">
                    <label id="lb-placa">Placa</label>
                    <input type="text"  name="placa" id="placa-nuevo-registro" required>
                          
                    <label class="lb-margenTop">Color</label>
                    <input type="text"  name="color" id="color-nuevo-registro" required>
                        
                    <label class="lb-margenTop">Marca</label>
                    <input type="text"  name="marca" id="marca-nuevo-registro" required>
                  </div>

                  <div class="div-hijo2 div-hj2">
                    <label id="cedula">Cedula</label>
                    <input type="bigint"  name="cedula" id="cedula-nuevo-registro" required>
             
                    <label class="lb-margenTop">Fecha ingreso</label>
                    <input type="date"  name="fecha_ingreso" id="f-ingreso-nuevo-registro" required>
                          
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
                    <textarea class="textarea-dg-entrada" name="diagnostico_entrada" id="d-entrada-nuevo-registro" required></textarea>
                  </div>
                </div>
                  <input type="hidden" name="registrar_vehiculo" value="registrar_vehiculo1234">
                  <input  class="btn-actualizar btn-registrar" type="submit"  value="Registrar">
          </form>
        </div>
		</div>
  </div>
</div>


<!----Ventana modal para confirmar el envio del formulario--->
<div class="modal fade"  id="modal-confirmar-nuevo-vehiculo">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header" style="border-bottom: 4px solid #AEC0FF; font-family: 'Open Sans';">
            <div>
            <h3>CONFIRMAR</h3>
            <h6>Nuevo Registro</h6>
            </div>
              <button type="button" class="close" style="color:red; font-size:30px;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
            <div class="modal_contenido">
              <img src="../assets/img/actualizar.png" alt="actualizar" width="90px">
              <br/>
              <p class="text_cambiar">Estas seguro de CREAR este Registro?</p>
            </div>

            <div class="modal-footer justify-content-right" style="border-top:1px solid #D1D5DB;">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn-cambiar" name="registrarVehiculo" id="btn-registrar-nuevo-vehiculo">Registrar</button>
            </div>
    </div>
  </div>
</div>
<!--------------Fin ventana modal-------------->
