<?php
   
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["actualizar_empleado"]) && $_POST["actualizar_empleado"] == "formEmplaso456"){

        $cedulaEmpleado = $_POST['cedulaEmpleado'];
        $nombreEmpleado = $_POST['nombreEmpleado'];
        $apellidoEmpleado = $_POST['apellidoEmpleado'];
        $direccionEmpleado = $_POST['direccionEmpleado'];
        $celularEmpleado = $_POST['celularEmpleado'];

    
      try {      

        $consulta_update_empld=$connection->prepare('UPDATE usuarios SET   nombre = :nombreEmpleado, apellido = :apellidoEmpleado, direccion = :direccionEmpleado, celular = :celularEmpleado  WHERE  cedula = :cedulaEmpleado;');
        $consulta_update_empld->execute(array(
          ':cedulaEmpleado' =>$cedulaEmpleado,
          ':nombreEmpleado' =>$nombreEmpleado, 
          ':apellidoEmpleado' =>$apellidoEmpleado, 
          ':direccionEmpleado' =>$direccionEmpleado,
            ':celularEmpleado' =>$celularEmpleado
          ));
              
          header('Location: index.php?home=1');

        } catch (PDOException $e) {
         // Mostrar un mensaje de error al usuario
         die($e->getMessage());
         echo "<script> alert('Error: No se actualizaron  los datos ❌')</script>";
        }
                 
    }

    $contadorEmpleado=0;
    foreach($resultado_empleados as $fila):
      $contadorEmpleado++;
?>
    

<!------------------Modal Diagnostico Entrada---------------->
<div class="modal fade" id="modal-lg-editar-empleado-<?=$contadorEmpleado?>">
	<div class="modal-dialog modal-lg" >
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
                <form id="form-actualizar-empleado<?=$contadorEmpleado?>" action=" " method="post" class="modal-form-usuarios">
                    <div class="div-padre-form form-usuarios"> 
                            <div class="div-hijo1 panel-admin-div-h">
                                <label class="lb-margenTopCero">Cedula de Ciudadania</label>
                                <input type="bigint"  name="cedulaEmpleado" value="<?=$fila['cedula']?>" id="cedula-cidadania-actualizar-empleado" required>
                                    
                                <label class="lb-margenTop">Nombre</label>
                                <input type="text"  name="nombreEmpleado" value="<?=$fila['nombre']?>" id="nombre-actualizar-empleado" required>
                                    
                                <label class="lb-margenTop">Apellido</label>
                                <input type="text"  name="apellidoEmpleado" value="<?=$fila['apellido']?>" id="apellido-actualizar-empleado" required>
                            </div>

                            <div class="div-hijo2 panel-admin-div-h">
                               
                                <label class="lb-margenTopCero">Direccion</label>
                                <input type="text"  name="direccionEmpleado" value="<?=$fila['direccion']?>" id="direccion-actualizar-empleado" required>
                                    
                                <label class="lb-margenTop">Celular</label>
                                <input type="tel"  name="celularEmpleado" value="<?=$fila['celular']?>" id="celular-actualizar-empleado" required>
                            </div>
                        
                    </div>
                    <input type="hidden" name="actualizar_empleado" value="formEmplaso456">
                    <input  class="btn-actualizar" type="submit"  value="Actualizar">
                </form>
			</div>
		</div>
    </div>
</div>



<!----Ventana modal para confirmar el envio del formulario--->
<div class="modal fade"  id="modal-confirmar-actualizar-empleado<?=$contadorEmpleado?>">
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
              <button type="submit" class="btn-cambiar" name="actualizar" id="btn-actualizar-empleado<?=$contadorEmpleado?>">Actualizar</button>
            </div>
    </div>
  </div>
</div>
<!--------------Fin ventana modal-------------->

<?php endforeach; ?>

<!--Input para obtener el numero de modales, y asi pasarlo al js que confirma el envio del formulario-->
<input type="hidden" value="<?=$contadorEmpleado?>" id="contadorEmpl">
<!----Fin Input---------------------------> 
