<?php
        $query_estados = $connection->prepare("SELECT * FROM estados");
        $query_estados->execute();
        $Estados = $query_estados->fetchAll(PDO::FETCH_ASSOC);
	

    if(isset($_POST['guardar'])){

        $placa = $_POST['placa'];
        $color = $_POST['color'];
        $marca = $_POST['marca'];
        $cedula = $_POST['cedula'];
        $fecha_ingreso = $_POST['fecha_ingreso'];
        $diagnostico_entrada = $_POST['diagnostico_entrada'];
        $fecha_salida = $_POST['fecha_salida'];
        $diagnostico_salida  = $_POST['diagnostico_salida'];
        $idestado1 = $_POST['idestado1'];
        $idvehicul_estado = $_POST['idvehicul_estado'];

    
      try{
          $connection->beginTransaction();

          $consulta_update1=$connection->prepare('UPDATE vehiculo SET  placa= :placa, color= :color, marca= :marca, cedula2=:cedula WHERE  placa= :placa;');
          $consulta_update1->execute(array(':placa' =>$placa,':color' =>$color,':marca' =>$marca,':cedula' =>$cedula));
          
          $placa1= $placa;

          $consulta_update2=$connection->prepare('UPDATE vehiculos_estados SET  fecha_ingreso = :fecha_ingreso, diagnostico_entrada = :diagnostico_entrada, fecha_salida = :fecha_salida, diagnostico_salida =:diagnostico_salida, placa1 =:placa1, idestado1 =:idestado1 WHERE  idvehicul_estado = :idvehicul_estado;');
          $consulta_update2->execute(array(':fecha_ingreso' =>$fecha_ingreso, ':diagnostico_entrada' =>$diagnostico_entrada, ':fecha_salida' =>$fecha_salida, ':diagnostico_salida' =>$diagnostico_salida, ':placa1' =>$placa1, ':idestado1' =>$idestado1));
              
          // Confirmar la transacción
          $connection->commit();
      
          exit();
      } catch(PDOException $e) {
          // Deshacer todas las operaciones realizadas durante la transacción
           $connection->rollback();
              
          // Mostrar un mensaje de error al usuario
          echo "Error: No se guardaron los datos" . $e->getMessage();
      }           
    }


    
  //------------------Modal Diagnostico Entrada---------------->
  $contadorVehiculo=0;
  foreach($resultado as $fila){
  $contadorVehiculo++;

echo	'<div class="modal fade" id="modal-lg-editar-'.$contadorVehiculo.'">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header" style="border-bottom: 4px solid #AEC0FF; font-family: \'Open Sans\';">
					<h4 class="modal-title">Diagnostico De Entrada</h4>
						<button type="button" class="close" style="color:red; font-size:30px;" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
				</div>
		  
				<div class="modal-body">
					<div class="div-modal-body">
						<div class="div-modal-fila">';	
            //-----------Formulario------------>

        echo    '<form id="vehiculo" action=" " method="post">
                <ul>
                <li>
                    <label>ID:</label>
                    <input type="number"  name="idvehicul_estado" value='.$fila['idvehicul_estado'].'>
                  </li>
                  <li>
                    <label>Cedula:</label>
                    <input type="number"  name="cedula" value='.$fila['cedula2'].'>
                  </li>
                  <li>
                    <label>placa:</label>
                    <input type="text"  name="placa" value ='.$fila['placa'].'>
                  </li>
                  <li>
                    <label>Color:</label>
                    <input type="text"  name="color" value='. $fila['color'] .'>
                  </li>

                  <li>
                    <label>Marca:</label>
                    <input type="text"  name="marca" value='.$fila['marca'] .'>
                  </li>

                  <li>
                    <label>Fecha ingreso: </label>
                    <input type="date"  name="fecha_ingreso" value='. $fila['fecha_ingreso'].'>
                  </li>
                  <li>
                    <label>Diagnostico de entrada :</label>
                    <input type="text"  name="diagnostico_entrada" value='.$fila['diagnostico_entrada'].'>
                  </li>
                  <li>
                    <label>Fecha de salida:</label>
                    <input type="date"  name="fecha_salida" value='. $fila['fecha_salida'].'>
                  </li>
                  <li>
                    <label>Diagnostico de salida:</label>
                    <input type="text"  name="diagnostico_salida" value='. $fila['diagnostico_salida'] .'>
                  </li>
                
                  <select class="form-control" name="idestado1" required>
              
                  <option selected value='.$fila['idestado'].'>'. $fila['estado'].' </option>';
                  
                  
                  for($i=0; $i<sizeof($Estados);$i++){
                  
                    echo '<option  value='.$Estados[$i]["idestado"].'>'.$Estados[$i]["estado"].'</option>';}
                  
                  echo '</select>
              

                  <input id="btnActualizar" class="btn-cambiar" type="submit" name="guardar" value="Guardar">
                
                </ul>

              </form>

           
      		</div>
					</div>
				</div>
		  
				<div class="modal-footer justify-content-right" style="border-top:1px solid #D1D5DB;">
                <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
				</div>
		</div>
    </div>
</div>';
        }					
?>



