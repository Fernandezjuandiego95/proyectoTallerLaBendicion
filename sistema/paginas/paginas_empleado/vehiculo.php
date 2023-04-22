
<?php

      //Realizar consulta para obtener los registros de la tabla vheiculos
        $query=$connection->prepare("SELECT * FROM vehiculo");
       
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
				</tr>
			<?php endforeach?>
            </tbody>
		</table>
        <!--------------------------------------------------------------->
    