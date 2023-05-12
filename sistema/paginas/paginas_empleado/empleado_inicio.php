<div class="div_content_text_sms">
    <h2 class="text_notificar">Notificar Vehiculo Finalizado</h2>
    <div class="div-notificar">
    <img src="../assets/img/carta.svg"> 
    </div>
</div>
    <form action="" method="post" class="form-sms">    
        <input type ="text" name ="placa_sms" placeholder="Ingrese la Placa" class="input-sms">
        <input type="submit" name="sms" class="btn-notificar">                                  
    </form>
<div class="div_img">
 <img src="../assets/img/notify.svg">   
</div>
<?php 
    
    if(isset($_POST['sms'])){

        $placa_sms = $_POST['placa_sms'];

        $mensaje=$connection->prepare("SELECT us.celular
                                        FROM vehiculo v  
                                        inner join usuarios us 
                                        on(v.cedula2 = us.cedula) 
                                        WHERE v.placa = :placa_sms and v.eliminar=1 and us.eliminar_usuario=1");
        $mensaje->bindParam(':placa_sms', $placa_sms);
        $mensaje->execute();
        $resultado=$mensaje->fetchAll();

        foreach ($resultado as $celular){
            $celular2 = '57'.$celular['celular'];
        }

       include("componentes/testAltiriaSms.php");
 }
      
?>

