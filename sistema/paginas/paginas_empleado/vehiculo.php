
<?php

      //Realizar consulta para obtener los registros de las tablas vheiculos, estados_vehiculos y estados 
        $query=$connection->prepare("SELECT * FROM vehiculo v  inner join vehiculos_estados vs on(v.placa = vs.placa1 ) inner join estados e on (vs.idestado1 = e.idestado)");
        
      
        $query->execute();
        $resultado=$query->fetchAll();
      //______________________________________________________________________________


	
?>



<table class="table">
          <thead>
			<tr class="head">
				<td class="neg">placa</td>
				<td class="neg">color</td>
				<td class="neg">marca</td>
				<td class="neg">cedula</td>
				<td class="neg">fecha_ingreso</td>
				<td class="neg">diagnostico_entrada</td>
				<td class="neg">fecha_salida</td>
				<td class="neg">diagnostico_salida</td>
				<td class="neg">idestado</td>
				<td class="neg" colspan="2">Acción</td>
			</tr>
          </thead>
          <tbody class="table-group-divider">
			<?php foreach($resultado as $fila):?>
				<tr>
					<td><?php echo $fila['placa']; ?></td>
					<td><?php echo $fila['color']; ?></td>
					<td><?php echo $fila['marca']; ?></td>
					<td><?php echo $fila['cedula2']; ?></td>
					<td><?php echo $fila['fecha_ingreso']; ?></td>
					<td><?php echo $fila['diagnostico_entrada']; ?></td>
					<td><?php echo $fila['fecha_salida']; ?></td>
					<td><?php echo $fila['diagnostico_salida']; ?></td>
					<td><?php echo $fila['estado']; ?></td>
				</tr>
			<?php endforeach?>
            </tbody>
		</table>
        <!--------------------------------------------------------------->
    