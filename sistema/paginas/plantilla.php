<?php
    $evento = $_GET ['evento'] + 1;

    $consultar_modulo= $connection->prepare("SELECT modulo FROM modulos WHERE IDMODULO=:evento");
    $consultar_modulo->bindParam("evento", $evento, PDO::PARAM_STR);
    $consultar_modulo->execute();
 
    $resultado_modulo = $consultar_modulo->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?php foreach($resultado_modulo as $dato){ echo $dato;}?></title>

  <?php include_once "componentes/link_link.php";?>

</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background:#F7F8FC;">
  
  <div class="wrapper">

    <!-- Preloader 
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../assets/img/logo_circulo.png" alt="Logo" height="60" width="60">
    </div>
   -->
        <?php include "componentes/menu.php";?>

        <?php include "componentes/header.php";?>

        <div class="content-wrapper">
          <section class="content">
            <div class="container-fluid">

          <?php 
          if($rol == 1){
            $evento = $_GET ['evento'] ;

              switch ($evento) {
                case 0:
                  include "paginas_admin/admin_inicio.php";
                  break;
                  case 1:
                    include "paginas_admin/admin_empleado.php";
                    break;
                  case 4:
                    include "componentes/ajustes.php";
                    break;
                
                default:
                      include "paginas_admin/admin_inicio.php";
                  break;
              }
          } else if($rol == 3){
            $evento = $_GET ['evento'] ;

              switch ($evento) {
                case 0:
                  include "paginas_cliente/cliente_inicio.php";
                  break;
                  case 4:
                    include "componentes/ajustes.php";
                    break;
                
                default:
                      include "paginas_cliente/cliente_inicio.php";
                  break;
              }
          }
 
          ?>
          
            </div>
          </section>
        <div>

</div>

  <?php include_once "componentes/link_script.php";?>

</body>
</html>
