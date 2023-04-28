<?php
	//Realizar consulta para obtener los registros de las
	//tablas vheiculos, estados_vehiculos y estados 
	$query=$connection->prepare("SELECT *
									FROM vehiculo v  
									inner join vehiculos_estados vs 
									on(v.placa = vs.placa1 ) 
									inner join estados e 
									on (vs.idestado1 = e.idestado)
									LIMIT 7");
    $query->execute();
    $resultado=$query->fetchAll();	 
?>

<!------------------------Barra Buscador------------------------>
<div class="barra__buscador">
    <form action="" class="formulario buscador" method="post">
        <fieldset class="field-container">
        <input type="text" name="buscar" placeholder="Ingrese la placa del vehiculo" 
         class="input__text" required>
        <input type="submit" class="buscar_placa" name="buscar_placa" >
        </fieldset>
    </form>
</div>
<br/>
<!----------------------Fin Barra Buscador---------------------->



<!--------Tabla para mostrar los resultados de la consulta SQL------>
<div class="card">
    <div class="card-body">
    	<table id="tabla-vehiculo" class="table table-bordered table-striped">
            <thead>
               	<tr>
					<th>ID</th>
					<th>Placa</th>
					<th>Color</th>
					<th>Marca</th>
					<th>Cedula</th>
					<th>F. Ingreso</th>
					<th>D. Entrada</th>
					<th>F. Salida</th>
					<th>D. Salida</th>
					<th>Estado</th>
					<th colspan="2">Acción</th>
               	</tr>
            </thead>
           	<tbody>

			<?php $contadorVehiculo = 0;
			      foreach($resultado as $fila):
					$contadorVehiculo++;
			?>
               	<tr>
					<td><?=$fila['idvehicul_estado']?></td>
					<td><?=$fila['placa']?></td>
					<td><?=$fila['color']?></td>
					<td><?=$fila['marca']?></td>
					<td><?=$fila['cedula2']?></td>
					<td><?=$fila['fecha_ingreso']?></td>
					<td>
						<a class="btn btn-app-edit bg-secondary" data-toggle="modal" data-target="#modal-lg-D-entrada-<?=$contadorVehiculo?>">
							<i class="fas fa-envelope"></i> 
						</a>
					</td>
					<td><?=$fila['fecha_salida']?></td>
					<td>
						<a class="btn btn-app-edit bg-success"  data-toggle="modal" data-target="#modal-lg-D-salida-<?=$contadorVehiculo?>">
							<i class="fas fa-envelope"></i>
						</a>
					</td>
					<td><?=$fila['estado']?></td>
					<td>
						<button type="submit" class="btn-crud btn-editar" data-toggle="modal" data-target="#modal-x1-editar-<?=$contadorVehiculo?>"></button>
					</td>
					<td>
						<button type="button" class="btn-crud btn-eliminar disable" style="cursor: no-drop;"></button>
					</td>	
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>		
</div>	
<!---------------------Fin Tabla------------------------------------->


<!------------------Modal Diagnostico Entrada------------------------>
<?php $contadorVehiculo = 0;
      foreach($resultado as $fila):
	    $contadorVehiculo++;
?>
<div class="modal fade" id="modal-lg-D-entrada-<?=$contadorVehiculo?>">
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
<!----------------Fin Modal diagnostico Entrada------------------->
	  

		  
<!------------------Modal Diagnostico Salida---------------------->
<div class="modal fade" id="modal-lg-D-salida-<?=$contadorVehiculo?>">
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
							<?=$fila['fecha_ingreso'].':'?>
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
<!-------------Fin Modal diagnostico salida-------------->  
<?php endforeach;
 include "crud/actualizar_vehiculo.php";
?>	  