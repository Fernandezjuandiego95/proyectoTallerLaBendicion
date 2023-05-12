<h1>Hola Empleado</h1>



    <form action="" method="post">
                      
         <input type ="text" name ="placa_sms">
          
         <input type="submit" name="sms">
                                         
    </forme>



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

            var_dump($celular2);

}

       include("componentes/testAltiriaSms.php");

    }
    
    
    ?>

