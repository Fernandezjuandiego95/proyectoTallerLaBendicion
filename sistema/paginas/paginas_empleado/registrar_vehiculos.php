
<?php



if (isset($_POST['registrar'])) {
 
 $placa = $_POST['placa'];
 $color = $_POST['color'];
 $marca = $_POST['marca'];
 $cedula = $_POST['cedula'];




     $query = $connection->prepare("INSERT INTO vehiculo(placa,color,marca,cedula2) VALUES (:placa,:color,:marca,:cedula)");
     $query->bindParam("placa", $placa, PDO::PARAM_STR);
     $query->bindParam("color", $color, PDO::PARAM_STR);
     $query->bindParam("marca", $marca, PDO::PARAM_STR);
     $query->bindParam("cedula", $cedula, PDO::PARAM_STR);
    
     $result = $query->execute();

     if ($result) {
         echo '<script>alert ("¡Tu registro fue exitoso!")</script>';
     } else {
         echo '<script>alert ("¡Algo salió mal!")</script>';
     }

}
$query = null;

?>




<form action="" method="post">
 <ul>
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
    <label>Cedula:</label>
    <input type="number"  name="cedula">
  </li>

  <input class="btn btn-primary" type="submit" name="registrar" value="Registrar">
 
 </ul>
</form>
