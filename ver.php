<?php

include('../Conexion.php');

require("fpdf.php");

$pdf = new PDF('L','pt');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 8);
$pdf->Image('../imagenes/imajen.png' , 20 ,15, 50 , 50,'PNG');
$pdf->Cell(45, 10, '', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(650, 35, '"ejemplo"',0);
$pdf->Cell(30, 35, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(30);
$pdf->Cell(250, 10, '', 0);
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(300,35,'Ejemplo Fpdf',0);
$pdf->Ln(35);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(100, 35, 'NOTA: ejemplo basico', 0);
$pdf->Ln(35);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(30, 13, 'ITEM', 1);
$pdf->Cell(215, 13, 'DESCRIPCION', 1);

$pdf->Ln(13);
$pdf->SetFont('Arial', '', 8);
$pdf->tablewidths = array(30,215);

$resultado=mysql_query("SELECT A.Descripcion 
FROM libro A, usuario B, prestamos D
WHERE B.IdUsuario = D.IdUsuario
AND A.IdLibro = D.IdLibro
AND D.Fecha_Maxima_De_Devolucion < '".$fecha."' and D.Fecha_De_Devolucion = '".$fecha1."'");
if(mysql_num_rows($resultado)>0)
{
$item = 0;


while($fila=mysql_fetch_array($resultado)){
 
$item = $item+1;
$b=$fila['Descripcion'];


$data[] = array(utf8_decode($item),utf8_decode($b));

 
}

$pdf->morepagestable($data);

$pdf->Output()

}

?>