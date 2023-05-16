<?php
   
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["actualizar_cliente"]) && $_POST["actualizar_cliente"] == "formClientes47856"){

        $cedulaCliente = $_POST['cedulaCliente'];
        $nombreCliente = $_POST['nombreCliente'];
        $apellidoCliente = $_POST['apellidoCliente'];
        $direccionCliente = $_POST['direccionCliente'];
        $celularCliente = $_POST['celularCliente'];
 
      try {      

        $consulta_update_clt=$connection->prepare('UPDATE usuarios SET  nombre = :nombreCliente, apellido = :apellidoCliente, direccion = :direccionCliente, celular = :celularCliente WHERE  cedula = :cedulaCliente;');
        $consulta_update_clt->execute(array(
          ':cedulaCliente' =>$cedulaCliente,
          ':nombreCliente' =>$nombreCliente, 
          ':apellidoCliente' =>$apellidoCliente, 
          ':direccionCliente' =>$direccionCliente,
            ':celularCliente' =>$celularCliente
          ));
              
          header('Location: index.php?home=2');

        } catch (PDOException $e) {
         // Mostrar un mensaje de error al usuario
         die($e->getMessage());
         echo "<script> alert('Error: No se actualizaron  los datos ❌')</script>";
        }
                 
    }

    $contadorCliente=0;
    foreach($resultado_clientes as $fila):
      $contadorCliente++;
?>
    

<!------------------Modal Diagnostico Entrada---------------->
<div class="modal fade" id="modal-lg-editar-cliente<?=$contadorCliente?>">
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
                <form id="form-actualizar-cliente<?=$contadorCliente?>" action=" " method="post" class="modal-form-usuarios">
                    <div class="div-padre-form form-usuarios"> 
                            <div class="div-hijo1 panel-admin-div-h">
                                <label class="lb-margenTopCero">Cedula de Ciudadania</label>
                                <input type="bigint"  name="cedulaCliente" value="<?=$fila['cedula']?>" id="cedula-ciudadania-actualizar-cliente" required>
                                    
                                <label class="lb-margenTop">Nombre</label>
                                <input type="text"  name="nombreCliente" value="<?=$fila['nombre']?>" id="nombre-actualizar-cliente" required>
                                    
                                <label class="lb-margenTop">Apellido</label>
                                <input type="text"  name="apellidoCliente" value="<?=$fila['apellido']?>" id="apellido-actualizar-cliente" required>
                            </div>

                            <div class="div-hijo2 panel-admin-div-h">
                                
                                <label class="lb-margenTopCero">Direccion</label>
                                <input type="text"  name="direccionCliente" value="<?=$fila['direccion']?>" id="direccion-actualizar-cliente" required>
                                    
                                <label class="lb-margenTop">Celular</label>
                                <input type="tel"  name="celularCliente" value="<?=$fila['celular']?>" id="celular-actualizar-cliente" required>
                            </div>
                        
                    </div>
                    <input type="hidden" name="actualizar_cliente" value="formClientes47856">
                    <input  class="btn-actualizar" type="submit"  value="Actualizar">
                </form>
			</div>
		</div>
    </div>
</div>



<!----Ventana modal para confirmar el envio del formulario--->
<div class="modal fade"  id="modal-confirmar-actualizar-cliente<?=$contadorCliente?>">
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
              <button type="submit" class="btn-cambiar" name="actualizar" id="btn-actualizar-cliente<?=$contadorCliente?>">Actualizar</button>
            </div>
    </div>
  </div>
</div>
<!--------------Fin ventana modal-------------->

<?php endforeach; ?>

<!--Input para obtener el numero de modales, y asi pasarlo al js que confirma el envio del formulario-->
<input type="hidden" value="<?=$contadorCliente?>" id="contadorClt">
<!----Fin Input---------------------------> 
