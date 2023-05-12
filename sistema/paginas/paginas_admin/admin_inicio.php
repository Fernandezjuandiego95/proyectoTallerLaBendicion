<?php
   //Contar numero de vehiculos
<<<<<<< HEAD
   $contar_vehiculos = $connection->prepare("SELECT COUNT(*) AS cantidadVehiculo FROM vehiculo");
=======
   $contar_vehiculos = $connection->prepare("SELECT COUNT(*) AS cantidadVehiculo FROM vehiculo WHERE eliminar=1");
>>>>>>> desarrollo_m
   $contar_vehiculos->execute(); 
   $resultadoVhcl = $contar_vehiculos->fetch(PDO::FETCH_ASSOC); 

   //Contar nuemro de Empleados
<<<<<<< HEAD
   $contar_empleados = $connection->prepare("SELECT COUNT(*) AS cantidadEmpleado FROM usuarios WHERE idrol1 = 2");
=======
   $contar_empleados = $connection->prepare("SELECT COUNT(*) AS cantidadEmpleado FROM usuarios WHERE idrol1 = 2  AND eliminar_usuario=1");
>>>>>>> desarrollo_m
   $contar_empleados->execute(); 
   $resultadoEmpl = $contar_empleados->fetch(PDO::FETCH_ASSOC); 

   //contar numero de clientes
<<<<<<< HEAD
   $contar_clientes = $connection->prepare("SELECT COUNT(*) AS cantidadCliente FROM usuarios WHERE idrol1 = 3");
=======
   $contar_clientes = $connection->prepare("SELECT COUNT(*) AS cantidadCliente FROM usuarios WHERE idrol1 = 3  AND eliminar_usuario=1");
>>>>>>> desarrollo_m
   $contar_clientes->execute(); 
   $resultadoClt = $contar_clientes->fetch(PDO::FETCH_ASSOC);   
   
   //contar vehiculos en Espera
<<<<<<< HEAD
   $contar_estado_espera = $connection->prepare("SELECT COUNT(*) AS cantidadEspera FROM vehiculos_estados WHERE idestado1 = 1");
=======
   $contar_estado_espera = $connection->prepare("SELECT COUNT(*) AS cantidadEspera FROM vehiculos_estados vs inner join vehiculo v 
   on(vs.placa1 = v.placa )   WHERE idestado1 = 1 AND v.eliminar=1 " );
>>>>>>> desarrollo_m
   $contar_estado_espera->execute(); 
   $resultadoEspr = $contar_estado_espera->fetch(PDO::FETCH_ASSOC);  

   //contar vehiculos en Revision
<<<<<<< HEAD
   $contar_estado_revision = $connection->prepare("SELECT COUNT(*) AS cantidadRevision FROM vehiculos_estados WHERE idestado1 = 2");
=======
   $contar_estado_revision = $connection->prepare("SELECT COUNT(*) AS cantidadRevision FROM vehiculos_estados vs inner join vehiculo v 
   on(vs.placa1 = v.placa )   WHERE idestado1 = 2 AND v.eliminar=1");
>>>>>>> desarrollo_m
   $contar_estado_revision->execute(); 
   $resultadoRvsn = $contar_estado_revision->fetch(PDO::FETCH_ASSOC);

   //contar vehiculos en Proceso
<<<<<<< HEAD
   $contar_estado_proceso = $connection->prepare("SELECT COUNT(*) AS cantidadProceso FROM vehiculos_estados WHERE idestado1 = 3");
=======
   $contar_estado_proceso = $connection->prepare("SELECT COUNT(*) AS cantidadProceso FROM vehiculos_estados vs inner join vehiculo v 
   on(vs.placa1 = v.placa )   WHERE idestado1 = 3 AND v.eliminar=1");
>>>>>>> desarrollo_m
   $contar_estado_proceso->execute(); 
   $resultadoPcs = $contar_estado_proceso->fetch(PDO::FETCH_ASSOC);

   //contar vehiculos en Verificacion
<<<<<<< HEAD
   $contar_estado_verifi = $connection->prepare("SELECT COUNT(*) AS cantidadVerifi FROM vehiculos_estados WHERE idestado1 = 4");
=======
   $contar_estado_verifi = $connection->prepare("SELECT COUNT(*) AS cantidadVerifi FROM vehiculos_estados vs inner join vehiculo v 
   on(vs.placa1 = v.placa  )  WHERE idestado1 = 4 AND v.eliminar=1  ");
>>>>>>> desarrollo_m
   $contar_estado_verifi->execute(); 
   $resultadoVfcn = $contar_estado_verifi->fetch(PDO::FETCH_ASSOC);

   //contar vehiculos en Finalizacion
<<<<<<< HEAD
   $contar_estado_Fnld = $connection->prepare("SELECT COUNT(*) AS cantidadFinalizado FROM vehiculos_estados WHERE idestado1 = 5");
=======
   $contar_estado_Fnld = $connection->prepare("SELECT COUNT(*) AS cantidadFinalizado FROM vehiculos_estados vs inner join vehiculo v 
   on(vs.placa1 = v.placa )   WHERE idestado1 = 5 AND v.eliminar=1");
>>>>>>> desarrollo_m
   $contar_estado_Fnld->execute(); 
   $resultadoFnld = $contar_estado_Fnld->fetch(PDO::FETCH_ASSOC);

    //contar vehiculos en Entregado
<<<<<<< HEAD
    $contar_estado_Etgd = $connection->prepare("SELECT COUNT(*) AS cantidadEntregado FROM vehiculos_estados WHERE idestado1 = 6");
=======
    $contar_estado_Etgd = $connection->prepare("SELECT COUNT(*) AS cantidadEntregado FROM vehiculos_estados vs inner join vehiculo v 
    on(vs.placa1 = v.placa )   WHERE idestado1 = 6 AND v.eliminar=1");
>>>>>>> desarrollo_m
    $contar_estado_Etgd->execute(); 
    $resultadoEtgd = $contar_estado_Etgd->fetch(PDO::FETCH_ASSOC);
?>

<section class="section-content">
    <section>
        <h4 class="text-informacion">Registros Importantes:</h4>
            <section class="section-group">

                <div class="div-card">
                    <h4 class="text-h4">Vehiculos</h4>
                    <span class="text-span"><?=$resultadoVhcl['cantidadVehiculo']?></span>
                </div>

                <div class="div-card">
                    <h4 class="text-h4">Empleados</h4>
                    <span class="text-span"><?=$resultadoEmpl['cantidadEmpleado']?></span>
                </div>

                <div class="div-card">
                    <h4 class="text-h4">Clientes</h4>
                    <span class="text-span"><?=$resultadoClt['cantidadCliente']?></span>
                </div>
            </section>
    </section>
    <br/>
    <section>
        <h4 class="text-informacion">Vehiculos En Estado:</h4>
            <section class="section-group">
                <div class="div-card card-estados">
                    <h4 class="text-h4 text-estados-h4">Espera</h4>
                    <span class="text-span text-estados-span"><?=$resultadoEspr['cantidadEspera']?></span>
                </div>

                <div class="div-card card-estados">
                    <h4 class="text-h4 text-estados-h4">Revisión</h4>
                    <span class="text-span text-estados-span"><?=$resultadoRvsn['cantidadRevision']?></span>
                </div>

                <div class="div-card card-estados">
                    <h4 class="text-h4 text-estados-h4">Proceso</h4>
                    <span class="text-span text-estados-span"><?=$resultadoPcs['cantidadProceso']?></span>
                </div>

                <div class="div-card card-estados">
                    <h4 class="text-h4 text-estados-h4">Verificación</h4>
                    <span class="text-span text-estados-span"><?=$resultadoVfcn['cantidadVerifi']?></span>
                </div>

                <div class="div-card card-estados">
                    <h4 class="text-h4 text-estados-h4">Finalizado</h4>
                    <span class="text-span text-estados-span"><?=$resultadoFnld['cantidadFinalizado']?></span>
                </div>

                <div class="div-card card-estados">
                    <h4 class="text-h4 text-estados-h4">Entregado</h4>
                    <span class="text-span text-estados-span"><?=$resultadoEtgd['cantidadEntregado']?></span>
                </div>
            </section>
    </section>
    
    <section class="ilustracion">
        <img src="../assets/img/planta1.png" alt="Ilustracion" width="110px" height="140px">
        <img src="../assets/img/progreso.png" alt="Ilustracion" width="350px" height="250px">
        <img src="../assets/img/planta2.png" alt="Ilustracion" width="86px" height="150px">
    </section>
</section>