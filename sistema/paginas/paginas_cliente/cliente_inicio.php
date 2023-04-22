
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
<?php
	// metodo buscar
	if(isset ($_POST['buscar_placa'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$connection->prepare(
    'SELECT v.placa1, v.fecha_ingreso, e.estado, v.fecha_salida, v.diagnostico_entrada, v.diagnostico_salida
     FROM vehiculos_estados  AS v 
     INNER JOIN estados AS e
     ON v.idestado1 = e.idestado WHERE v.placa1 LIKE :buscar;');

		$select_buscar->execute(array(':buscar' =>"%".$buscar_text."%"));

		$resultado_busqueda=$select_buscar->fetchAll(PDO::FETCH_ASSOC);

   	// Mostrar los resultados de la búsqueda
     if(count($resultado_busqueda) > 0) {

      echo '<div >
            <div class="card" style=" width: 67%;  margin:auto;">        
              <div class="card-body">
                <table id="tablaCliente" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Placa</th>
                      <th>Fecha Ingreso</th>
                      <th>Estado</th>
                      <th>Fecha Salida</th>
                      <th>Diagnostico De Entrada</th>
                      <th>Diagnostico De Salida</th>
                    </tr>
                  </thead>
                  <tbody>';
        foreach($resultado_busqueda as $fila){
                  echo "<tr>
                        <td>". $fila['placa1'] ."</td>
                        <td>". $fila['fecha_ingreso'] ."</td>
                        <td>". $fila['estado'] ."</td>
                        <td>". $fila['fecha_salida'] ."</td>
                        <td>". $fila['diagnostico_entrada'] ."</td>
                        <td>". $fila['diagnostico_salida'] ."</td>
                      </tr>";
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

<section class="section_panel">
<img src="../assets/img/personal_info.svg" alt="ilustracion" class="personal_info">
</section>

