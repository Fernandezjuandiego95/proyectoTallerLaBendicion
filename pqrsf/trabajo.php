
<?php

//variables 
$nombre_art= $_POST ['nombre_art'];

$cantidad_art=$_POST ['cantidad_art'];
$precio_art = $_POST ['precio_art'];
$tipo_cliente=$_POST ['selector1'];
$tipo_tarejeta=$_POST ['selector2'];

$numero_tar=$_POST ['numero_tar'];
$codigo_tar=$_POST ['codigo_tar'];

$mayorista= "Mayorista";
$distribuidor= "Distribuidor";
$normal= "Normal";

$devito= "Devito";
$credito= "Credito";

$desc_10 = 0.1;
$desc_15= 0.15;

//__________________________________


//cantidad de articulos X presio de articulos

$total= $cantidad_art * $precio_art;



//____________________________________________


	//if
		if($tipo_cliente==$mayorista){
			
			$cliente=$mayorista;
			
			//operacion mayorista
			if($total>=1000000){
				
				$ret_des = $total* $desc_10;
				$de= "(10%)";
				
			$desc_may=$total-$ret_des;
			
			$desc_inc=$desc_may*$desc_10;
			$des= "(10%)";
			$desc_in=$desc_may-$desc_inc;
				
			}
			else{
				
				$ret_des = $total* $desc_10;
				$de= "(10%)";
				$des= "(10%)";
			
			$desc_may=$total-$ret_des;
			$desc_in=$desc_may;
			
			
			$desc_inc=0;
			
			}
			//____________________________________________
			
//distribuidor
	}
	else{
		//operacion distribuidor
		if($tipo_cliente==$distribuidor){
			
			$cliente=$distribuidor;
			
			if($total>=1000000){
				
				$ret_des = $total* $desc_15;
			$de= "(15%)";
			
			$desc_may=$total-$ret_des;
		
			$desc_inc=$desc_may*$desc_10;
			$des= "(10%)";
			$desc_in=$desc_may-$desc_inc;
				
			}
			else{
				
					$ret_des = $total* $desc_15;
				$de= "(15%)";
				$des="(10%)";
				
			$desc_may=$total-$ret_des;
			
			$desc_in=$desc_may;
			
			$desc_inc=0;	
			}
			
		}
		//____________________________________________
		
		// normal
		else{
			//operacion normal
				if($tipo_cliente==$normal){
				$cliente=$normal;
	
			if($total>=1000000){
				
				$ret_des = $total* $desc_10;
				
			$desc_may=$total;
			
			
			$desc_inc=$desc_may*$desc_10;
			$de="(0%)";

			$des="(10%)";
	
			$desc_in=$desc_may-$desc_inc;
			

				$ret_des=0;
			}
			else{
				
					$desc_in=$total;
		
				$de="(0%)";
		
			$des="(10%)";
			$desc_inc=0;
		
			$ret_des=0;
			
			}
					
				}
				else{
	
				}
		}
		//____________________________________________
	}
	
	//_____________________________________


//forma de pago tarejeta Devito o credito

	if($tipo_tarejeta==$devito){
		
		$tarejeta =$devito;
		$numero_tar=$numero_tar;	
		$codigo_tar=$codigo_tar;

	}
	else{
		
		if($tipo_tarejeta==$credito){
			
			$tarejeta = $credito;
			$numero_tar=$numero_tar;
			$codigo_tar=$codigo_tar;
		}
		else{
			echo " selecciono ";
		}
	}
//____________________________________________



?>


<html>

<head>
<title>factura </title>
<link rel=stylesheet href="estilos.css" type="text/css"></link>
</head>


<body>


<table border ="1">
			<tr>
			<th> cliente  </th>
				<th><?php echo "".$cliente;?></th>
			</tr>
			
			<tr>
				<td>Nombre der articulo </td>
				<td><?php echo "".$nombre_art;?></td>
			</tr>
			
			<tr>
				<td>cantidad de articulos ingresados</td>
				<td><?php echo "".$cantidad_art;?></td>
			</tr>
			
			<tr>
				<td>presio neto por unidad  </td>
				<td><?php echo "".$precio_art;?></td>
			</tr>
			
			<tr>
				<td>total a precio neto</td>
				<td><?php echo "".$total;?> </td>
			</tr>
			
			<tr>
				<td><?php echo "descuento ".$de." por ser cliente ".$cliente;?></td>
				<td><?php echo "".$ret_des;?> </td>
			</tr>
				
				<td><?php echo "<br>descuento ".$des." por compra mallor a un millon: ";?></td>
				<td><?php echo "".$desc_inc;?> </td>
			
			<tr>
				<td>total a pagar</td>
				<td><?php echo "".$desc_in;?> </td>
			</tr>
			
			<tr>
				<td>tipo de tarejeta</td>
				<td><?php echo "".$tarejeta;?> </td>
			</tr>
			
			<tr>
				<td>Número de la tarjeta</td>
				<td><?php echo "".$numero_tar;?> </td>
			</tr>
			
			<tr>
				<td>Código de verificación</td>
				<td><?php echo "".$codigo_tar;?> </td>
			</tr>
		 
	</table>


</body>


</html>

