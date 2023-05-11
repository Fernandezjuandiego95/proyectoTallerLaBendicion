<?php

    //Verificar si se ha enviado una solicitud de búsqueda
    if(isset($_POST['buscar_cliente']) && !empty($_POST['buscar_Clt'])){
        //Obtener el valor ingresado en el campo de búsqueda
        $Encontrar_empleado = $_POST['buscar_Clt'];
        $idrol = 3;
        //Construir la consulta SQL para obtener los registros que coincidan 
        $consulta_buscar=$connection->prepare("SELECT u.cedula, u.nombre, u.apellido, u.celular, u.direccion,u.password, r.rol
                                                FROM usuarios AS u
                                                INNER JOIN roles AS r
                                                ON u.idrol1 = r.idrol
                                                WHERE u.cedula = :Encontrar_empleado AND u.idrol1 = :idrol and u.eliminar_usuario=1");
        $consulta_buscar->bindParam(':Encontrar_empleado', $Encontrar_empleado);
        $consulta_buscar->bindParam("idrol", $idrol, PDO::PARAM_STR);
        $consulta_buscar->execute();
        $resultado_clientes = $consulta_buscar->fetchAll();
		
        if($resultado_clientes == null){
            echo '<p class="BusquedaNoencontrada p-posicion">No se encontraron resultados.</p>';
		}
    }else{
        //Si no se ha enviado una solicitud de búsqueda, obtener todos los registros
        $idrol = 3;
        $query=$connection->prepare("SELECT u.cedula, u.nombre, u.apellido, u.celular, u.direccion,u.password, r.rol
                                     FROM usuarios AS u
                                     INNER JOIN roles AS r
                                     ON u.idrol1 = r.idrol
                                     WHERE u.idrol1 = :idrol and u.eliminar_usuario=1");
        $query->bindParam("idrol", $idrol, PDO::PARAM_STR);
        $query->execute();
        $resultado_clientes=$query->fetchAll();
     }
?>



<!------------------------Barra Buscador------------------------>
<div class="barra__buscador">
    <form action="" class="formulario barra" method="post">
        <fieldset class="field-container">
        <input type="text" name="buscar_Clt" placeholder="Buscar cliente por su numero de cedula" 
         class="input__text" required>
        <input type="submit" class="buscar_placa" name="buscar_cliente" >
        </fieldset>
    </form>
	<button type="button" class="btn-nuevo-vehiculo" data-toggle="modal" data-target="#modal-lg-registrar-cliente">NUEVO CLIENTE</button>
</div>
<br/>
<!----------------------Fin Barra Buscador---------------------->


      
<!--------Tabla para mostrar los resultados de la consulta SQL------>
<div class="card">
    <div class="card-body">
    	<table id="tabla-vehiculo" class="table table-bordered table-striped">
            <thead>
               	<tr>
					<th>Cedula</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Celular</th>
					<th>Direccion</th>
					<th>Perfil</th>
					<th colspan="2">Acción</th>
               	</tr>
            </thead>
           	<tbody>

			<?php $contadorCliente = 0;
			      foreach($resultado_clientes as $fila):
					$contadorCliente++;
			?>
               	<tr>
					<td><?=$fila['cedula']?></td>
					<td><?=$fila['nombre']?></td>
					<td><?=$fila['apellido']?></td>
					<td><?=$fila['celular']?></td>
					<td><?=$fila['direccion']?></td>
                    <td><?=$fila['rol']?></td>
					<td>
						<button type="submit" class="btn-crud btn-editar" data-toggle="modal" data-target="#modal-lg-editar-cliente<?=$contadorCliente?>"></button>
					</td>
						
                    <td>
					    <button type="button" class="btn-crud btn-eliminar" data-toggle="modal" data-target="#modal-x1-eliminar-<?=$contadorCliente?>"></button>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>		
</div>	
<!---------------------Fin Tabla------------------------------------->




<?php 
    include "crud/registrar_nuevo_cliente.php";
    include "crud/actualizar_cliente.php";
    include "crud/eliminar_cliente.php";
?>	