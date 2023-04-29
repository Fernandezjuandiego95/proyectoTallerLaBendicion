<?php
     //consulta para el menu dinamico  
    $consultar_icon = $connection->prepare("SELECT icono FROM roles WHERE IDROL=$rol");
    $consultar_icon->execute();
   
    $resultado =  $consultar_icon->fetch(PDO::FETCH_ASSOC);
?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background:#F7F8FC; border:none;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars fa-2x"></i></a>
      </li>
      <li class="nav_text">
        <span>
          <?php if($resultado_modulo != null){
                    echo $dato;
                }else{
                    echo "Error";
                }?>
        </span>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <span><?php echo $nombre." ".$apellido; ?></span>
      </li>
    </ul>

    <div class="div_image_user elevation-1">
        <img src="<?php foreach($resultado as $fila){echo $fila; }?>" class="image_user" alt="usuario">
    </div>
    
  </nav>
  <!-- /.navbar -->