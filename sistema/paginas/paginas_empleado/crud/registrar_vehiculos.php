
<?php


      //consulta para desplegable estados 
      $query = $connection->prepare("SELECT * FROM estados");

      $query->execute();

      $desplegableEstados = $query->fetchAll(PDO::FETCH_ASSOC);
    //___________________________________________________________________________
     
    if (!$_POST){

      echo '<script>document.getElementById("vehiculo").reset();</script>';

   } 

    // incertar en la base de datos en las tablas vheiculos y estados_vehiculos 
      if (isset($_POST['registrar'])) {
      
      $placa = $_POST['placa'];
      $color = $_POST['color'];
      $marca = $_POST['marca'];
      $cedula = $_POST['cedula'];

     
      $fecha_ingreso             = $_POST['fecha_ingreso'];
      $diagnostico_entrada = $_POST['diagnostico_entrada'];
    
      $fecha_salida               = $_POST['fecha_salida'];
      $diagnostico_salida   = $_POST['diagnostico_salida'];

      $idestado1                     = $_POST['idestado1'];
 

     $query = $connection->prepare("INSERT INTO vehiculo(placa,color,marca,cedula2) VALUES (:placa,:color,:marca,:cedula) ");
    

    
     
     $query->bindParam("placa", $placa, PDO::PARAM_STR);
     $query->bindParam("color", $color, PDO::PARAM_STR);
     $query->bindParam("marca", $marca, PDO::PARAM_STR);
     $query->bindParam("cedula", $cedula, PDO::PARAM_STR);
     $result = $query->execute();

          if($result){
          
            $placa1= $placa;
            

        
            

            $query = $connection->prepare("INSERT INTO vehiculos_estados(fecha_ingreso,diagnostico_entrada,fecha_salida,diagnostico_salida,placa1,idestado1) VALUES (:fecha_ingreso,:diagnostico_entrada,:fecha_salida,:diagnostico_salida,:placa1,:idestado1)");
            $query->bindParam("fecha_ingreso", $fecha_ingreso, PDO::PARAM_STR);
            $query->bindParam("diagnostico_entrada", $diagnostico_entrada, PDO::PARAM_STR);
            $query->bindParam("fecha_salida", $fecha_salida, PDO::PARAM_STR);
            $query->bindParam("diagnostico_salida", $diagnostico_salida, PDO::PARAM_STR);
            $query->bindParam("placa1", $placa1, PDO::PARAM_STR);
            $query->bindParam("idestado1", $idestado1, PDO::PARAM_STR);
            $result = $query->execute();


            
      
            
              if ($result) {
                    echo '<script>alert ("¡Tu registro fue exitoso!")</script>';
              } else {
                    echo '<script>alert ("¡Algo salió mal!")</script>';
                }
            
          }else{

              echo '<script>alert ("¡Algo salió mal!")</script>';
        
          }
          
     

    
     }
      $query = null;

    //____________________________________________________________________________________________________________________________

    
   
     
?>
   



  <form id="vehiculo" action="index.php?evento=2" method="post">
    <ul>
      <li>
        <label>Cedula:</label>
        <input type="number"  name="cedula">
      </li>
      <li>
        <label>placa:</label>
        <input type="text"  name="placa">
      </li>
      <li>
        <label>Color:</label>
        <input type="text"  name="color">
      </li>

      <li>
        <label>Marca:</label>
        <input type="text"  name="marca">
      </li>

      <li>
        <label>Fecha ingreso: </label>
        <input type="date"  name="fecha_ingreso">
      </li>
      <li>
        <label>Diagnostico de entrada :</label>
        <input type="text"  name="diagnostico_entrada">
      </li>
      <li>
        <label>Fecha de salida:</label>
        <input type="date"  name="fecha_salida">
      </li>
      <li>
        <label>Diagnostico de salida:</label>
        <input type="txt"  name="diagnostico_salida">
      </li>
    

      <select class="form-control" name="idestado1" id="destino" required>
              
        <option  selected>Seleccione estado</option>

        <?php for($i=0; $i<sizeof($desplegableEstados);$i++){ ?>


        <option type ="number" value="<?php echo $desplegableEstados[$i]["idestado"]?>"><?php echo $desplegableEstados[$i]["estado"]?></option>
      
        <?php  } ?>


      </select>

      <input class="btn btn-primary" type="submit" name="registrar" value="Registrar">
    
    </ul>
  </form>
