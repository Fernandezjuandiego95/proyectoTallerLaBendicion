
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrar_nuevo_cliente"]) && $_POST["registrar_nuevo_cliente"] == "nuevoCliente556") {
  
  $cedulaCliente = $_POST['cedulaCliente'];
  $nombreCliente = $_POST['nombreCliente'];
  $apellidoCliente = $_POST['apellidoCliente'];
  $direccionCliente = $_POST['direccionCliente'];
  $celularCliente = $_POST['celularCliente'];
  $passwordCliente = $_POST['passwordCliente'];
  $password_hash = password_hash($passwordEmpleado, PASSWORD_BCRYPT);
  $idrolCliente = $_POST['idrolCliente'];


      $existe_cedula = $connection->prepare("SELECT * FROM usuarios WHERE CEDULA=:cedulaCliente");
      $existe_cedula->bindParam("cedulaCliente", $cedulaCliente, PDO::PARAM_STR);
      $existe_cedula->execute();
   
      $existe_celular = $connection->prepare("SELECT * FROM usuarios WHERE CELULAR=:celularCliente");
      $existe_celular->bindParam("celularCliente", $celularCliente, PDO::PARAM_STR);
      $existe_celular->execute();

      if ($existe_cedula->rowCount() > 0) {
        echo '<script>alert("¡Este usuario ya existe!")</script>';
      }
      
      if ($existe_celular->rowCount() > 0) {
        echo '<script>alert("¡Este numero de celular ya existe!")</script>';
      }
      
      if ($existe_cedula->rowCount() == 0 && $existe_celular->rowCount() == 0){
            try {      

                $consulta_insert_clt = $connection->prepare("INSERT INTO usuarios(cedula, nombre, apellido, direccion, celular, password, idrol1) VALUES (:cedulaCliente, :nombreCliente, :apellidoCliente, :direccionCliente, :celularCliente, :password_hash, :idrolCliente) ");
                $consulta_insert_clt ->bindParam("cedulaCliente", $cedulaCliente, PDO::PARAM_STR);
                $consulta_insert_clt ->bindParam("nombreCliente", $nombreCliente, PDO::PARAM_STR);
                $consulta_insert_clt ->bindParam("apellidoCliente", $apellidoCliente, PDO::PARAM_STR);
                $consulta_insert_clt ->bindParam("direccionCliente", $direccionCliente, PDO::PARAM_STR);
                $consulta_insert_clt ->bindParam("celularCliente", $celularCliente, PDO::PARAM_STR);
                $consulta_insert_clt->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                $consulta_insert_clt ->bindParam("idrolCliente", $idrolCliente, PDO::PARAM_STR);
                $resultado_clt = $consulta_insert_clt ->execute(); 
                
                header('Location: index.php?home=2');
            } catch (PDOException $e) {
            // Mostrar un mensaje de error al usuario
            //die($e->getMessage());
            echo "<script> alert('Error: No se guardaron  los datos ❌')</script>";
            }
        }
}


?>

<!------------------Modal------------------------------->
<div class="modal fade" id="modal-lg-registrar-cliente">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" style="border-radius: 30px;border: solid  #BBB5B5; border-width: 2px 0px 0px 2px;">
            <!---------Encabezado-------------------------->
            <div class="encabezado">
                <div class="div-titulo">
                    <h2 class="titulo-act color-verde">Nuevo Registro</h2>
                </div>
                    <button type="button" class="close" style="color:red; font-size:50px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <!--------------------------------------------->
            <!----------Body------------------------------->
            <div class="modal-body">    
            <!-----------Formulario------------>
                <form id="form-nuevo-cliente" action=" " method="post" class="modal-form-usuarios">
                    <div class="div-padre-form form-usuarios"> 
                    
                        <div class="div-hijo1 panel-admin-div-h">
                            <label class="lb-margenTopCero">Cedula de Ciudadania</label>
                            <input type="bigint"  name="cedulaCliente" id="cedula-ciudadania-nuevo-cliente" required>
                                
                            <label class="lb-margenTop">Nombre</label>
                            <input type="text"  name="nombreCliente" id="nombre-nuevo-cliente" required>
                                
                            <label class="lb-margenTop">Apellido</label>
                            <input type="text"  name="apellidoCliente" id="apellido-nuevo-cliente" required>
                        </div>

                        <div class="div-hijo2 panel-admin-div-h">
                            <label class="lb-margenTopCero">Contraseña</label>
                            <input type="password"  name="passwordCliente" id="password-nuevo-cliente" required>
                    
                            <label class="lb-margenTop">Direccion</label>
                            <input type="text"  name="direccionCliente" id="direccion-nuevo-cliente" required>
                                
                            <label class="lb-margenTop">Celular</label>
                            <input type="tel"  name="celularCliente" id="celular-nuevo-cliente" required>
                        </div>
                        <input type="hidden" name="registrar_nuevo_cliente" value="nuevoCliente556">
                    </div>
                    <div id="div-radio">
                        <label class="lb-margenTop">Rol:</label>
                        <input type="radio"  name="idrolCliente" value="3" checked />
                        <label class="lb-radio">3-Cliente</label>
                    </div>
                    <input type="submit"  class="btn-actualizar btn-registrar"  value="Registrar">
                </form>
            </div>
        </div>
    </div>
</div>


<!----Ventana modal para confirmar el envio del formulario--->
<div class="modal fade"  id="modal-confirmar-nuevo-cliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 4px solid #AEC0FF; font-family: 'Open Sans';">
                <div>
                    <h3>CONFIRMAR</h3>
                    <h6>Nuevo Registro</h6>
                </div>
                <button type="button" class="close" style="color:red; font-size:30px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal_contenido">
            <img src="../assets/img/actualizar.png" alt="actualizar" width="90px">
            <br/>
            <p class="text_cambiar">Estas seguro de CREAR este Registro?</p>
            </div>

            <div class="modal-footer justify-content-right" style="border-top:1px solid #D1D5DB;">
            <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn-cambiar"  id="btn-registrar-nuevo-cliente">Registrar</button>
            </div>
        </div>
    </div>
</div>
<!--------------Fin ventana modal-------------->
