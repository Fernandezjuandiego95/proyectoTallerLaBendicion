<?php
  
    if(isset($_POST["btn-eliminar"])){

        $cedula = $_POST['cedula'];
        $eliminar = $_POST['eliminar'];
       
       var_dump($eliminar);
var_dump($cedula);
    
        $consulta_update1=$connection->prepare('UPDATE usuarios SET eliminar_usuario= :eliminar_usuario WHERE  cedula= :cedula;');
        $consulta_update1->execute(array(':eliminar_usuario' =>$eliminar, ':cedula' => $cedula));

      
         
        header('Location: index.php?home=1');
        exit();
                 
    }

    $contadorEmpleado =0;
    foreach($resultado_empleados as $fila):
        $contadorEmpleado ++;
?>
    




<!----Ventana modal para confirmar el envio del formulario--->
<div class="modal fade"  id="modal-x1-eliminar-<?=$contadorEmpleado ?>" >
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header" style="border-bottom: 4px solid #AEC0FF; font-family: 'Open Sans';">
            <div>
            <h3>CONFIRMAR</h3>
            <h6>Eliminar Registro</h6>
            </div>
              <button type="button" class="close" style="color:red; font-size:30px;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
            <div class="modal_contenido">
              <img src="../assets/img/actualizar.png" alt="actualizar" width="90px">
              <br/>
              <p class="text_cambiar">Estas seguro de Eliminar este Registro?</p>
            </div>



            <div class="modal-footer justify-content-right" style="border-top:1px solid #D1D5DB;">

                  <form action="" method="post">
                            
            
                      <input type="hidden"  name ="cedula" value="<?=$fila['cedula']?>">
                      <input type="hidden" name ="eliminar" value="0">
                              
                      <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn-cambiar" name="btn-eliminar" id="btn-actualizar-vehiculo">Eliminar</button>
                  </form>
           
            </div>
    </div>
  </div>
</div>
<!--------------Fin ventana modal-------------->

<?php endforeach; ?>