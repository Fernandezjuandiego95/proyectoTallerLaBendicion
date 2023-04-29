<?php
   
    if(isset($_POST['actualizar'])){

        $placa = $_POST['placa'];
        $color = $_POST['color'];
        $marca = $_POST['marca'];
        $fecha_ingreso = $_POST['fecha_ingreso'];
        $diagnostico_entrada = $_POST['diagnostico_entrada'];
        $fecha_salida = $_POST['fecha_salida'];
        $diagnostico_salida  = $_POST['diagnostico_salida'];
        $idestado1 = $_POST['idestado1'];
        $idvehicul_estado = $_POST['idvehicul_estado'];

    
      try {      
          $connection->beginTransaction();

          $consulta_update1=$connection->prepare('UPDATE vehiculo SET  placa= :placa, color= :color, marca= :marca WHERE  placa= :placa;');
          $consulta_update1->execute(array(':placa' =>$placa,':color' =>$color,':marca' =>$marca));
          

          $consulta_update2=$connection->prepare('UPDATE vehiculos_estados SET  fecha_ingreso = :fecha_ingreso, diagnostico_entrada = :diagnostico_entrada, fecha_salida = :fecha_salida, diagnostico_salida =:diagnostico_salida, idestado1 =:idestado1 WHERE  idvehicul_estado = :idvehicul_estado;');
          $consulta_update2->execute(array(
          ':fecha_ingreso' =>$fecha_ingreso,
          ':diagnostico_entrada' =>$diagnostico_entrada, 
          ':fecha_salida' =>$fecha_salida, 
          ':diagnostico_salida' =>$diagnostico_salida,
            ':idestado1' =>$idestado1,
            ':idvehicul_estado' =>$idvehicul_estado
          ));
              
          // Confirmar la transacción
          $connection->commit();
          header('Location: index.php?home=3');
          exit();
        } catch (PDOException $e) {
          // Deshacer todas las operaciones realizadas durante la transacción
           $connection->rollback();
         // Mostrar un mensaje de error al usuario
         echo "Error: No se actualizaron  los datos ❌";
        }
                 
    }

    $contadorVehiculo=0;
    foreach($resultado as $fila):
      $contadorVehiculo++;
?>
    

<!------------------Modal Diagnostico Entrada---------------->
<div class="modal fade" id="modal-x1-editar-<?=$contadorVehiculo?>">
	<div class="modal-dialog modal-xl" >
		<div class="modal-content" style="border-radius: 30px;border: solid  #BBB5B5; border-width: 2px 0px 0px 2px;">
			<!---------Encabezado-------------------------->
      <div class="encabezado">
          <div class="div-titulo">
            <h2 class="titulo-act">Actualizar Registro</h2>
          </div>
            <button type="button" class="close" style="color:red; font-size:50px;" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
		  <!--------------------------------------------->
		  <!----------Body------------------------------->
			<div class="modal-body">
        <!-----------Formulario------------>
        <form id="vehiculo" action=" " method="post" class="modal-form">
          <div class="div-padre-form">  
            <div class="div-hijo1">
              <input type="number" id="idvehiculo" name="idvehicul_estado" value="<?=$fila['idvehicul_estado']?>">
                    
              <label id="lb-placa">Placa</label>
              <input type="text"  name="placa" value="<?=$fila['placa']?>">
                    
              <label>Color</label>
              <input type="text"  name="color" value="<?=$fila['color']?>">
                  
              <label>Marca</label>
              <input type="text"  name="marca" value="<?=$fila['marca']?>">
            </div>

            <div class="div-hijo2">
              <label id="f-ingreso">Fecha ingreso</label>
              <input type="date"  name="fecha_ingreso" value="<?=$fila['fecha_ingreso']?>">

              <label>Fecha de salida</label>
              <input type="date"  name="fecha_salida" value="<?=$fila['fecha_salida']?>">
                    
              <label>Estado</label>
              <select class="form-control" name="idestado1" id="slt-estados" required>
                <option selected value="<?=$fila['idestado']?>"><?=$fila['estado']?></option>

                <?php  for($i=0; $i<sizeof($Estados);$i++){
                    echo '<option  value='.$Estados[$i]["idestado"].'>'.$Estados[$i]["estado"].'</option>';
                } ?>
              </select>
            </div>

            <diV class="div-hijo3">                      
              <label id="dg-entrada">Diagnostico de entrada</label>
              <textarea  name="diagnostico_entrada"><?=$fila['diagnostico_entrada']?></textarea>
                      
              <label>Diagnostico de salida</label>
              <textarea  name="diagnostico_salida"><?=$fila['diagnostico_salida']?></textarea>
            </div>
          </div>

            <input  class="btn-actualizar" type="submit" name="actualizar" value="Actualizar">
        </form>
			</div>
		</div>
  </div>
</div>
<?php endforeach; ?>

