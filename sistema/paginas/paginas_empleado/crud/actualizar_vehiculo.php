<?php
   
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["actualizar_vehiculo"]) && $_POST["actualizar_vehiculo"] == "vehiculo123"){

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
         echo "<script> alert('Error: No se actualizaron  los datos ❌')</script>";
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
        <form id="form-actualizar-vehiculo" action=" " method="post" class="modal-form">
          <div class="div-padre-form">  
            <div class="div-hijo1">
              <input type="number" id="idvehiculo" name="idvehicul_estado" value="<?=$fila['idvehicul_estado']?>" required>
                    
              <label id="lb-placa">Placa</label>
              <input type="text"  name="placa" value="<?=$fila['placa']?>" id="placa-actualizar" required>
                    
              <label>Color</label>
              <input type="text"  name="color" value="<?=$fila['color']?>" id="color-actualizar" required>
                  
              <label>Marca</label>
              <input type="text"  name="marca" value="<?=$fila['marca']?>" id="marca-actualizar" required>
            </div>

            <div class="div-hijo2">
              <label id="f-ingreso">Fecha ingreso</label>
              <input type="date"  name="fecha_ingreso" value="<?=$fila['fecha_ingreso']?>" id="f-ingreso-actualizar" min="<?=$fecha_minima?>" max="<?=$fecha_maxima?>" required>

              <label>Fecha de salida</label>
              <input type="date"  name="fecha_salida" value="<?=$fila['fecha_salida']?>" id="f-salida-actualizar" min="<?=$fecha_minima?>" max="<?=$fecha_maxima?>">
                    
              <label>Estado</label>
              <select class="form-control" name="idestado1" id="slt-estados">
                <option selected value="<?=$fila['idestado']?>"><?=$fila['estado']?></option>

                <?php  for($i=0; $i<sizeof($Estados);$i++){
                    echo '<option  value='.$Estados[$i]["idestado"].'>'.$Estados[$i]["estado"].'</option>';
                } ?>
              </select>
            </div>

            <diV class="div-hijo3">                      
              <label id="dg-entrada">Diagnostico de entrada</label>
              <textarea  name="diagnostico_entrada" id="d-entrada-actualizar"><?=$fila['diagnostico_entrada']?></textarea>
                      
              <label>Diagnostico de salida</label>
              <textarea  name="diagnostico_salida" id="d-salida-actualizar"><?=$fila['diagnostico_salida']?></textarea>
            </div>
          </div>
            <input type="hidden" name="actualizar_vehiculo" value="vehiculo123">
            <input  class="btn-actualizar" type="submit"  value="Actualizar">
        </form>
			</div>
		</div>
  </div>
</div>
<?php endforeach; ?>


<!----Ventana modal para confirmar el envio del formulario--->
<div class="modal fade"  id="modal-confirmar-actualizar-vehiculo">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header" style="border-bottom: 4px solid #AEC0FF; font-family: 'Open Sans';">
            <div>
            <h3>CONFIRMAR</h3>
            <h6>Actualizar Registro</h6>
            </div>
              <button type="button" class="close" style="color:red; font-size:30px;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
            <div class="modal_contenido">
              <img src="../assets/img/actualizar.png" alt="actualizar" width="90px">
              <br/>
              <p class="text_cambiar">Estas seguro de ACTUALIZAR este Registro?</p>
            </div>

            <div class="modal-footer justify-content-right" style="border-top:1px solid #D1D5DB;">
              <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn-cambiar" name="actualizar" id="btn-actualizar-vehiculo">Actualizar</button>
            </div>
    </div>
  </div>
</div>
<!--------------Fin ventana modal-------------->
