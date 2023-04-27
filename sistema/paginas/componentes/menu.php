<?php
     //consulta para el menu dinamico  
    $query = $connection->prepare(
      "SELECT * 
       FROM roles_modulos r  
       inner join modulos m 
       on(r.idmodulo1 = m.idmodulo) 
       WHERE r.idrol2=$rol");
  
    $query->execute();

    $menu = $query->fetchAll(PDO::FETCH_ASSOC);
    

?>
<!-- ----------------------------------------------------------------------------------- -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link">
    <img src="../assets/img/logo_circulo.png" alt="Logo del Taller" class="brand-image img-circle elevation-3" style="opacity: .8">
   
    <div class="div_span">
    <span class="brand-text font-weight-light">MOTO-REPUESTOS <br/>LA BENDICION</span>
    </div>
  </a>
   <!-- Sidebar Menu -->
   <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <!-- menu dinamico  -->
            <?php for($i=0; $i<sizeof($menu);$i++){
                  if($i==(sizeof($menu)-1)){
                    echo  "<br><br>";
                  }
                  ?>
              <li class="nav-item">
                 <a href="<?php echo $menu[$i]["url"]?>" class="nav-link">
                  <i class="nav-icon <?php echo $menu[$i]["icono"]?>" ></i>
                
                  <p>
                    <?php echo $menu[$i]["modulo"]?>
                  </p>
                </a>
              </li>
              
            <?php }?>
 
          <!--------------------------------------------------------------> 
        </ul>
      </nav>
  </aside>

