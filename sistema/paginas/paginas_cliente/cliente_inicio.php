<!------------------------Barra Buscar------------------------>
<div class="barra__buscador">
    <img src="../assets/img/Businessman.png" alt="ilustracion" class="Businessman">
    <form action="" class="formulario" method="post">
        <fieldset class="field-container">
        <input type="text" name="buscar" placeholder="Ingrese la placa de su vehiculo" 
        value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text" required>
        <input type="submit" class="buscar_placa" name="buscar_placa" >
        </fieldset>
    </form>
</div>
<br/>
<!----------------------Fin Barra Buscar---------------------->


<!------------------------Codigo PHP-------------------------->
<!------------------------------------------------------------>
<?php
	// metodo buscar
	if(isset ($_POST['buscar_placa'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$connection->prepare(
    'SELECT v.idvehicul_estado, v.placa1, v.fecha_ingreso, e.estado, v.fecha_salida, v.diagnostico_entrada, v.diagnostico_salida
     FROM vehiculos_estados  AS v 
     INNER JOIN estados AS e
     ON v.idestado1 = e.idestado WHERE v.placa1 LIKE :buscar;');

		$select_buscar->execute(array(':buscar' =>"%".$buscar_text."%"));

		$resultado_busqueda=$select_buscar->fetchAll(PDO::FETCH_ASSOC);

   	// Mostrar los resultados de la búsqueda
     if(count($resultado_busqueda) > 0) {
      $contador = 0; 
      echo '<div>
            <div class="card" style=" width: 67%;  margin:auto;">        
              <div class="card-body">
                <table id="tablaCliente" class="table table-bordered table-striped align-middle">
                  <thead>
                    <tr>
                      <th>Placa</th>
                      <th>Fecha Ingreso</th>
                      <th>Estado</th>
                      <th>Fecha Salida</th>
                      <th>Diagnostico <br> De Entrada</th>
                      <th>Diagnostico <br> De Salida</th>
                    </tr>
                  </thead>
                  <tbody>';
        foreach($resultado_busqueda as $fila){
          $contador++;
                  echo "<tr>
                        <td>". $fila['placa1'] ."</td>
                        <td>". $fila['fecha_ingreso'] ."</td>
                        <td>". $fila['estado'] ."</td>
                        <td>". $fila['fecha_salida'] ."</td>
                        <td>".
                              '<a class="btn btn-app bg-cyan" data-toggle="modal" data-target="#modal-lg-D-entrada-'.$contador.'">
                              <i class="fas fa-envelope"></i> Ver
                              </a>'
                        ."</td>
                        <td>". 
                             '<a class="btn btn-app bg-teal" data-toggle="modal" data-target="#modal-lg-D-salida-'.$contador.'">
                              <i class="fas fa-envelope"></i> Ver
                              </a>'
                        ."</td>
                      </tr>";

                     //------------------Modal Diagnostico Entrada----------------
                 echo '<div class="modal fade" id="modal-lg-D-entrada-'.$contador.'">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                              <div class="modal-header" style="border-bottom: 4px solid #AEC0FF; font-family: \'Open Sans\';">
                                <h4 class="modal-title">Diagnostico De Entrada</h4>
                                <button type="button" class="close" style="color:red; font-size:30px;" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                              <div class="modal-body">
                                <div class="div-modal-body">
                                  <div class="div-modal-fila">
                                      <i class="fas fa-caret-left fa-2x"></i>
                                      <p class="parrafo-modal">'.$fila['idvehicul_estado'].') '
                                      .$fila['fecha_ingreso'].': <br>'
                                      .$fila['diagnostico_entrada'].'</p>
                                  </div>
                                </div>
                              </div>

                              <div class="modal-footer justify-content-right" style="border-top:1px solid #D1D5DB;">
                                <button type="button" class="btn-cancelar" data-dismiss="modal">Cerrar</button>
                              </div>
                        </div>
                      </div>
                      </div>';
                      //-------------Fin Modal diagnostico Entrada--------------


                    //------------------Modal Diagnostico Salida----------------
              echo '<div class="modal fade" id="modal-lg-D-salida-'.$contador.'">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                            <div class="modal-header" style="border-bottom: 4px solid #AEC0FF; font-family: \'Open Sans\';">
                              <h4 class="modal-title">Diagnostico De Salida</h4>
                              <button type="button" class="close" style="color:red; font-size:30px;" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <div class="modal-body">
                              <div class="div-modal-body">
                                <div class="div-modal-fila">
                                <i class="fas fa-caret-left fa-2x"></i>'.
                                      '<p class="parrafo-modal">'.$fila['idvehicul_estado'].') '.
                                        $fila['fecha_ingreso'].': <br>'.
                                        $fila['diagnostico_salida'].'</p>
                                </div>
                              </div>
                            </div>

                            <div class="modal-footer justify-content-right" style="border-top:1px solid #D1D5DB;">
                              <button type="button" class="btn-cancelar" data-dismiss="modal">Cerrar</button>
                            </div>
                      </div>
                    </div>
                    </div>';
                    //-------------Fin Modal diagnostico Entrada--------------

        }
                  echo '
                  </tbody>
                </table>
              </div>
          </div>';
      } else {
        echo '<p class="BusquedaNoencontrada">No se encontraron resultados.</p>';
      }
   }
$connection = null;
?>
<!---------------------Fin codigo PHP-------------------------->

<!----------------------Ilustracion---------------------------->
<section class="section_panel">
<img src="../assets/img/personal_info.svg" alt="ilustracion" class="personal_info">
</section>
<!---------------------Fin Ilustracion-------------------------->