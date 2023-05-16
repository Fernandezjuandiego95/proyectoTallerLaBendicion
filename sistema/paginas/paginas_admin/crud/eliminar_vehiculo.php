<?php
  
    if(isset($_POST["btn-eliminar-vehiculo"])){

        $placa = $_POST['placa'];
        $eliminar = $_POST['eliminar'];
       

    
        $consulta_update1=$connection->prepare('UPDATE vehiculo SET eliminar= :eliminar WHERE  placa= :placa;');
        $consulta_update1->execute(array(':eliminar' =>$eliminar, ':placa' => $placa));

      
         
        header('Location: index.php?home=3');
        exit();
                 
    }

    $contadorVehiculo=0;
    foreach($resultado as $fila):
      $contadorVehiculo++;
?>
    




<!----Ventana modal para confirmar el envio del formulario--->
<div class="modal fade"  id="modal-x1-eliminar-<?=$contadorVehiculo?>" >
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
                            
            
                      <input type="hidden"  name ="placa" value="<?=$fila['placa']?>">
                      <input type="hidden" name ="eliminar" value="0">
                              
                      <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn-cambiar" name="btn-eliminar-vehiculo" id="btn-actualizar-vehiculo">Eliminar</button>
                  </form>
           
            </div>
    </div>
  </div>
</div>
<!--------------Fin ventana modal-------------->

<?php endforeach; ?>
