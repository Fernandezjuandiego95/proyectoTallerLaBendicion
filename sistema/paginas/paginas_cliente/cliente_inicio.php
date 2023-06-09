

<!------------------------Barra Buscar------------------------>
<div class="barra__buscador">
    <img src="../assets/img/Businessman.png" alt="ilustracion" class="Businessman">
    <form action="" class="formulario" method="post">
        <fieldset class="field-container">
        <input type="text" name="buscar" placeholder="Ingrese la placa de su vehiculo" 
        value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text" required>
        <input type="submit" class="buscar_placa" name="buscar_placa" >
        </fieldset>
    </form>
</div>
<br/>
<!----------------------Fin Barra Buscar---------------------->


<?php
	if(isset ($_POST['buscar_placa'])){

    $placa_buscar = $_POST['buscar'];

    $select_buscar=$connection->prepare("SELECT *
    FROM vehiculo v  
    inner join vehiculos_estados vs 
    on(v.placa = vs.placa1 ) 
    inner join estados e 
    on (vs.idestado1 = e.idestado)
    WHERE v.placa = :placa_buscar and v.eliminar=1
    ORDER BY idvehicul_estado DESC");

$select_buscar->bindParam(':placa_buscar', $placa_buscar);
$select_buscar->execute();
$resultado_busqueda=$select_buscar->fetchAll();
		


/*
		$buscar_text=$_POST['buscar'];
		$select_buscar=$connection->prepare(
    'SELECT v.idvehicul_estado, v.placa1, v.fecha_ingreso, e.estado, v.fecha_salida, v.diagnostico_entrada, v.diagnostico_salida
     FROM vehiculos_estados  AS v 
     INNER JOIN estados AS e
     ON v.idestado1 = e.idestado WHERE v.placa1 and v.eliminar=1 LIKE :buscar;');

		$select_buscar->execute(array(':buscar' =>"%".$buscar_text."%"));

		$resultado_busqueda=$select_buscar->fetchAll(PDO::FETCH_ASSOC); */

    if(count($resultado_busqueda) > 0) {
?>

<!-------------------------Tabla----------------------->
<div>
  <div class="card" style=" width: 67%;  margin:auto;">        
    <div class="card-body">
      <table id="tablaCliente" class="table table-bordered table-striped align-middle">
        <thead>
          <tr>
              <th>Placa</th>
              <th>Fecha Ingreso</th>
              <th>Estado</th>
              <th>Fecha Salida</th>
              <th>Diagnostico <br> De Entrada</th>
              <th>Diagnostico <br> De Salida</th>
          </tr>
        </thead>
        <tbody>
        <?php  $contador = 0; 
              foreach($resultado_busqueda as $fila):
              $contador++;
        ?>
          <tr>
              <td><?=$fila['placa1']?></td>
              <td><?=$fila['fecha_ingreso']?></td>
              <td><?=$fila['estado']?></td>
              <td><?=$fila['fecha_salida']?></td>
              <td>
                <a class="btn btn-app bg-cyan" data-toggle="modal" data-target="#modal-lg-D-entrada-<?=$contador?>">
                  <i class="fas fa-envelope"></i> Ver
                </a>
            </td>
              <td>
                <a class="btn btn-app bg-teal" data-toggle="modal" data-target="#modal-lg-D-salida-<?=$contador?>">
                  <i class="fas fa-envelope"></i> Ver
                </a>
            </td>
            <td>
            
                   <!-- <form action="" method="post" target="_blank" rel="noopener">
                      
      
                      <input type="hidden" name ="idvehiculo_estado" value="<?//=$fila['idvehicul_estado']?>"> -->
                      
                      <a href="componentes/fpdf/reporte.php?x=<?=$fila['idvehicul_estado']?>" target="_blank" rel="noopener" >
					              <button type="submint" class="btn-crud btn-reporte"></button>
                      </a>
                      
                   <!-- </forme>-->

           
					</td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>          

<!------------------Modal Diagnostico Entrada---------------->
<?php $contador = 0; 
      foreach($resultado_busqueda as $fila):
      $contador++;
?>
<div class="modal fade" id="modal-lg-D-entrada-<?=$contador?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!---------Encabezado-------------------------->
      <div class="modal-header" style="border-bottom: 4px solid #AEC0FF; font-family: 'Open Sans';">
        <h4 class="modal-title">Diagnostico De Entrada</h4>
          <button type="button" class="close" style="color:red; font-size:30px;" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <!--------------------------------------------->
		  <!----------Body------------------------------->
      <div class="modal-body">
				<div class="div-modal-body">
					<div class="div-modal-fila">
						<i class="fas fa-caret-left fa-2x"></i>
						<p class="parrafo-modal">
							<?=$fila['idvehicul_estado'].') '?> 
							<?=$fila['fecha_ingreso'].':'?>
						</p>
					</div> 
						<p class="parrafo-modal p-diag"><?=$fila['diagnostico_entrada']?></p>
			    </div>
			</div>
			<!----------------------------------------------->
		  <!----------Footer------------------------------->
      <div class="modal-footer justify-content-right" style="border-top:1px solid #D1D5DB;">
        <button type="button" class="btn-cancelar" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-------------Fin Modal diagnostico Entrada-------------->


<!------------------Modal Diagnostico Salida---------------->
<div class="modal fade" id="modal-lg-D-salida-<?=$contador?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!---------Encabezado-------------------------->
      <div class="modal-header" style="border-bottom: 4px solid #AEC0FF; font-family: 'Open Sans';">
        <h4 class="modal-title">Diagnostico De Salida</h4>
          <button type="button" class="close" style="color:red; font-size:30px;" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <!--------------------------------------------->
      <!----------Body------------------------------->
      <div class="modal-body">
      <div class="div-modal-body">
        <div class="div-modal-fila">
          <i class="fas fa-caret-left fa-2x"></i>
          <p class="parrafo-modal">
            <?=$fila['idvehicul_estado'].') '?> 
            <?=$fila['fecha_salida'].':'?>
          </p>
        </div>
          <p class="parrafo-modal p-diag"><?=$fila['diagnostico_salida']?></p>
      </div>
    </div>
      <!----------------------------------------------->
      <!----------Footer------------------------------->
     <div class="modal-footer justify-content-right" style="border-top:1px solid #D1D5DB;">
        <button type="button" class="btn-cancelar" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-------------Fin Modal diagnostico Entrada-------------->




<?php endforeach; 
    }else{
      echo '<p class="BusquedaNoencontrada">No se encontraron resultados.</p>';
    }
  }
  $connection = null;
?>        
   



<!----------------------Ilustracion---------------------------->
<section class="section_panel">
<img src="../assets/img/personal_info.svg" alt="ilustracion" class="personal_info">
</section>
<!---------------------Fin Ilustracion-------------------------->

<?php


//if (isset($_POST['idvehiculo_estado'])){

 // $idvehiculo_estado = $_POST['idvehiculo_estado'];

  //include("componentes/fpdf/reporte.php");

//}




?>