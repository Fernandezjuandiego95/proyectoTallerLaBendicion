<?php

require('./fpdf.php');




class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {

    

      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('logo.jpeg', 170, 5, 30); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(100, 15, utf8_decode('MOTO-REPUESTO LA BENDICION '), 0, 0, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(20); // Salto de línea
      $this->SetTextColor(103); //color

      //$this->MultiCell(120, 10, "Este es un parrafo de ejemplo.\nSe puede escribir en varias lineas.", 1, 'L', false);

   

      


      
     

   }

   

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}


//$this->MultiCell(120, 10, "Este es un parrafo de ejemplo.\nSe puede escribir en varias lineas.", 1, 'L', false);

     


$idvehiculo_estado = $_GET['x'];

include('../../../config/conexionBD.php');

$select_buscar=$connection->prepare("SELECT *
FROM vehiculo v  
inner join vehiculos_estados vs 
on(v.placa = vs.placa1 ) 
inner join estados e 
on (vs.idestado1 = e.idestado)
WHERE vs.idvehicul_estado = :idvehiculo_estado and v.eliminar=1");

$select_buscar->bindParam(':idvehiculo_estado', $idvehiculo_estado);
$select_buscar->execute();
$resultado_pdf=$select_buscar->fetchAll();

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();


$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;

 // separador y titulo
       // Arial 12
       $pdf->SetFont('Arial','',12);
       // Color de fondo
       $pdf->SetFillColor(247,202,122);
       // Título
      
       $pdf->Cell(0,6,"Informacion del taller",0,0,'C',true);
       
       // Salto de línea
       $pdf->Ln(10);
//______________________________________________________pdf

         /* UBICACION */
         $pdf->Cell(10);  // mover a la derecha
         $pdf->SetFont('Arial', 'B', 10);
         $pdf->Cell(96, 10, utf8_decode("Ubicación: Carrera 2 # 6A - 38 Albania - Sucre "), 0, 0, '', 0);
         $pdf->Ln(5);

         /* TELEFONO */
         $pdf->Cell(10);  // mover a la derecha
         $pdf->SetFont('Arial', 'B', 10);
         $pdf->Cell(59, 10, utf8_decode("Teléfono : 3023473084 "), 0, 0, '', 0);
         $pdf->Ln(5);

         /* COREEO */
         $pdf->Cell(10);  // mover a la derecha
         $pdf->SetFont('Arial', 'B', 10);
         $pdf->Cell(85, 10, utf8_decode("Correo : repuestoslabendicion22@gmail.com"), 0, 0, '', 0);
         $pdf->Ln(5);

         /* TELEFONO */
         $pdf->Cell(10);  // mover a la derecha
         $pdf->SetFont('Arial', 'B', 10);
         $pdf->Cell(85, 10, utf8_decode("Sucursal : 1"), 0, 0, '', 0);
         $pdf->Ln(20);

        // separador y titulo
       // Arial 12
       $pdf->SetFont('Arial','',12);
       // Color de fondo
       $pdf->SetFillColor(247,202,122);
       // Título
      
       $pdf->Cell(0,6,"Informacion del vehiculo",0,0,'C',true);
       
       // Salto de línea
       $pdf->Ln(14);
       //_________________________________________________________
/* TABLA */
foreach($resultado_pdf as $fila){
   $pdf->Ln(-5);
   $pdf->Cell(10);
   $pdf->Cell(30, 10, utf8_decode("Placa:  ".$fila['placa1']), 0, 0, 'L', 0);
  
   $pdf->Ln(8);
   $pdf->Cell(10);
   $pdf->Cell(25, 10, utf8_decode("Color:  ".$fila['color']), 0, 0, 'L', 0);
   $pdf->Ln(8);
   $pdf->Cell(10);
   $pdf->Cell(20, 10, utf8_decode("Marca:  ".$fila['marca']), 0, 0, 'L', 0);
   $pdf->Ln(8);
   $pdf->Cell(10);
   $pdf->Cell(20, 10, utf8_decode("Estado del vehiculo: ".$fila['estado']), 0, 0, 'L', 0);
   $pdf->Ln(15);
    // separador y titulo
       // Arial 12
       $pdf->SetFont('Arial','',12);
       // Color de fondo
       $pdf->SetFillColor(247,202,122);
       // Título
      
       $pdf->Cell(0,6,"Diagnostico de entrada: ".$fila['fecha_ingreso'],0,0,'C',true);
       
       // Salto de línea
       $pdf->Ln(10);
       //_________________________________________________________
   
       $pdf->MultiCell(190, 7, '', 'T', 'L', 0);
       $pdf->Ln(-5);
       $pdf->MultiCell(190, 7, utf8_decode($fila['diagnostico_entrada']), 0, 'L', 0);
       $pdf->MultiCell(190, 7, '', 'B', 'L', 0);
       $pdf->Ln(40);
   // separador y titulo
       // Arial 12
       $pdf->SetFont('Arial','',12);
       // Color de fondo
       $pdf->SetFillColor(247,202,122);
       // Título
      
     
       $pdf->Cell(0,6,"Diagnostico de salida: ".$fila['fecha_salida'],0,0,'C',true);
       
       // Salto de línea
       $pdf->Ln(10);
       //_________________________________________________________
       
 
   $pdf->MultiCell(190, 7, '', 'T', 'L', 0);
   $pdf->MultiCell(190, 7, utf8_decode($fila['diagnostico_salida']), 0, 'L', 0);
   $pdf->MultiCell(190, 7, '', 'B', 'L', 0);
   
   

   
   
}



$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
