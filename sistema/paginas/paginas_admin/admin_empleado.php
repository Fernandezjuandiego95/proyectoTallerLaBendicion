<?php

    //Verificar si se ha enviado una solicitud de búsqueda
    if(isset($_POST['buscar_empleado']) && !empty($_POST['buscar_Empld'])){
        //Obtener el valor ingresado en el campo de búsqueda
        $Encontrar_empleado = $_POST['buscar_Empld'];
        $idrol = 2;
        //Construir la consulta SQL para obtener los registros que coincidan 
        $consulta_buscar=$connection->prepare("SELECT u.cedula, u.nombre, u.apellido, u.celular, u.direccion, r.rol
                                                FROM usuarios AS u
                                                INNER JOIN roles AS r
                                                ON u.idrol1 = r.idrol
                                                WHERE u.cedula = :Encontrar_empleado AND u.idrol1 = :idrol");
        $consulta_buscar->bindParam(':Encontrar_empleado', $Encontrar_empleado);
        $consulta_buscar->bindParam("idrol", $idrol, PDO::PARAM_STR);
        $consulta_buscar->execute();
        $resultado_empleados = $consulta_buscar->fetchAll();
		
        if($resultado_empleados == null){
            echo '<p class="BusquedaNoencontrada p-posicion">No se encontraron resultados.</p>';
		}
    }else{
        //Si no se ha enviado una solicitud de búsqueda, obtener todos los registros
        $idrol = 2;
        $query=$connection->prepare("SELECT u.cedula, u.nombre, u.apellido, u.celular, u.direccion, r.rol
                                     FROM usuarios AS u
                                     INNER JOIN roles AS r
                                     ON u.idrol1 = r.idrol
                                     WHERE u.idrol1 = :idrol");
        $query->bindParam("idrol", $idrol, PDO::PARAM_STR);
        $query->execute();
        $resultado_empleados=$query->fetchAll();
     }
?>



<!------------------------Barra Buscador------------------------>
<div class="barra__buscador">
    <form action="" class="formulario barra" method="post">
        <fieldset class="field-container">
        <input type="text" name="buscar_Empld" placeholder="Busacar empleado por su cedula" 
         class="input__text" required>
        <input type="submit" class="buscar_placa" name="buscar_empleado" >
        </fieldset>
    </form>
	<button type="button" class="btn-nuevo-vehiculo" data-toggle="modal" data-target="#modal-lg-registrar-empleado">NUEVO EMPLEADO</button>
</div>
<br/>
<!----------------------Fin Barra Buscador---------------------->


      
<!--------Tabla para mostrar los resultados de la consulta SQL------>
<div class="card">
    <div class="card-body">
    	<table id="tabla-vehiculo" class="table table-bordered table-striped">
            <thead>
               	<tr>
					<th>C.C</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Celular</th>
					<th>Direccion</th>
					<th>Perfil</th>
					<th colspan="2">Acción</th>
               	</tr>
            </thead>
           	<tbody>

			<?php $contadorVehiculo = 0;
			      foreach($resultado_empleados as $fila):
					$contadorVehiculo++;
			?>
               	<tr>
					<td><?=$fila['cedula']?></td>
					<td><?=$fila['nombre']?></td>
					<td><?=$fila['apellido']?></td>
					<td><?=$fila['celular']?></td>
					<td><?=$fila['direccion']?></td>
                    <td><?=$fila['rol']?></td>
					<td>
						<button type="submit" class="btn-crud btn-editar" data-toggle="modal" data-target="#modal-x1-editar-<?=$contadorVehiculo?>"></button>
					</td>
					<td>
						<button type="button" class="btn-crud btn-eliminar"></button>
					</td>	
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>		
</div>	
<!---------------------Fin Tabla------------------------------------->




<?php 
    include "crud/registrar_nuevo_empleado.php";
/*   include "crud/registrar_vehiculo_reingreso.php";
 include "crud/actualizar_vehiculo.php";*/
?>	