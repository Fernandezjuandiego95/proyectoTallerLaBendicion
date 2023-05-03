
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formulario_especifico"]) && $_POST["formulario_especifico"] == "12345") {
  
  $cedulaEmpleado = $_POST['cedulaEmpleado'];
  $nombreEmpleado = $_POST['nombreEmpleado'];
  $apellidoEmpleado = $_POST['apellidoEmpleado'];
  $direccionEmpleado = $_POST['direccionEmpleado'];
  $celularEmpleado = $_POST['celularEmpleado'];
  $passwordEmpleado = $_POST['passwordEmpleado'];
  $password_hash = password_hash($passwordEmpleado, PASSWORD_BCRYPT);
  $idrolEmpleado = $_POST['idrolEmpleado'];


      $existe_cedula = $connection->prepare("SELECT * FROM usuarios WHERE CEDULA=:cedulaEmpleado");
      $existe_cedula->bindParam("cedulaEmpleado", $cedulaEmpleado, PDO::PARAM_STR);
      $existe_cedula->execute();
   
      $existe_celular = $connection->prepare("SELECT * FROM usuarios WHERE CELULAR=:celularEmpleado");
      $existe_celular->bindParam("celularEmpleado", $celularEmpleado, PDO::PARAM_STR);
      $existe_celular->execute();

      if ($existe_cedula->rowCount() > 0) {
        echo '<script>alert("¡Este usuario ya existe!")</script>';
      }
      
      if ($existe_celular->rowCount() > 0) {
        echo '<script>alert("¡Este numero de celular ya existe!")</script>';
      }
      
      if ($existe_cedula->rowCount() == 0 && $existe_celular->rowCount() == 0){
            try {      

                $consulta_insert_empld = $connection->prepare("INSERT INTO usuarios(cedula, nombre, apellido, direccion, celular, password, idrol1) VALUES (:cedulaEmpleado, :nombreEmpleado, :apellidoEmpleado, :direccionEmpleado, :celularEmpleado, :password_hash, :idrolEmpleado) ");
                $consulta_insert_empld ->bindParam("cedulaEmpleado", $cedulaEmpleado, PDO::PARAM_STR);
                $consulta_insert_empld ->bindParam("nombreEmpleado", $nombreEmpleado, PDO::PARAM_STR);
                $consulta_insert_empld ->bindParam("apellidoEmpleado", $apellidoEmpleado, PDO::PARAM_STR);
                $consulta_insert_empld ->bindParam("direccionEmpleado", $direccionEmpleado, PDO::PARAM_STR);
                $consulta_insert_empld ->bindParam("celularEmpleado", $celularEmpleado, PDO::PARAM_STR);
                $consulta_insert_empld->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                $consulta_insert_empld ->bindParam("idrolEmpleado", $idrolEmpleado, PDO::PARAM_STR);
                $resultado_empld = $consulta_insert_empld ->execute(); 
                
                header('Location: index.php?home=1');
            } catch (PDOException $e) {
            // Mostrar un mensaje de error al usuario
            die($e->getMessage());
            echo "<script> alert('Error: No se guardaron  los datos ❌')</script>";
            }
        }
}


?>

<!------------------Modal Diagnostico Entrada---------------->
<div class="modal fade" id="modal-lg-registrar-empleado">
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
                <form id="form-nuevo-empleado" action=" " method="post" class="modal-form-usuarios">
                    <div class="div-padre-form form-usuarios"> 
                    
                        <div class="div-hijo1 panel-admin-div-h">
                            <label class="lb-margenTopCero">Cedula de Ciudadania</label>
                            <input type="bigint"  name="cedulaEmpleado" id="cedula-cidadania-nuevo-empleado" required>
                                
                            <label class="lb-margenTop">Nombre</label>
                            <input type="text"  name="nombreEmpleado" id="nombre-nuevo-empleado" required>
                                
                            <label class="lb-margenTop">Apellido</label>
                            <input type="text"  name="apellidoEmpleado" id="apellido-nuevo-empleado" required>
                        </div>

                        <div class="div-hijo2 panel-admin-div-h">
                            <label class="lb-margenTopCero">Contraseña</label>
                            <input type="password"  name="passwordEmpleado" id="password-nuevo-empleado" required>
                    
                            <label class="lb-margenTop">Direccion</label>
                            <input type="text"  name="direccionEmpleado" id="direccion-nuevo-empleado" required>
                                
                            <label class="lb-margenTop">Celular</label>
                            <input type="tel"  name="celularEmpleado" id="celular-nuevo-empleado" required>
                        </div>
                        <input type="hidden" name="formulario_especifico" value="12345">
                    </div>
                    <div id="div-radio">
                        <label class="lb-margenTop">Rol:</label>
                        <input type="radio"  name="idrolEmpleado" value="2" checked />
                        <label class="lb-radio">2-Empleado</label>
                    </div>
                    <input type="submit"  class="btn-actualizar btn-registrar"  value="Registrar">
                </form>
            </div>
        </div>
    </div>
</div>


<!----Ventana modal para confirmar el envio del formulario--->
<div class="modal fade"  id="modal-confirmar-nuevo-empleado">
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
            <button type="submit" class="btn-cambiar"  id="btn-registrar-nuevo-empleado">Registrar</button>
            </div>
        </div>
    </div>
</div>
<!--------------Fin ventana modal-------------->
