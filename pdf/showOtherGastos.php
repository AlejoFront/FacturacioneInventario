<?php

include 'plantilla.php';
include '../php_action/db_connect.php';

$query = "SELECT * FROM gasto";
$resultado = $connect->query($query);


$pdf = new ListGastosFijos('L','mm','legal');
$pdf->AliasNbPages();
$pdf->AddPage();

$totalGasto = 0;
while($row = $resultado->fetch_assoc() ){
    $totalGasto = $totalGasto + $row['monto'];
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(60,6,utf8_decode($row['id_gasto']),1,0,'L');
    $pdf->Cell(60,6,utf8_decode($row['fecha_add']),1,0,'L');
    $pdf->Cell(70,6,utf8_decode($row['concepto']),1,0,'C');
    $pdf->Cell(30,6,'$'.number_format($row['monto'],0,'.',','),1,1,'L');



}
$pdf -> SetFont('Arial', 'B', 8);
$pdf->SetFillColor(232,232,232);
$pdf -> Cell(190,6,'',0);
$pdf -> Cell(30,6,'Total: $'.number_format($totalGasto,2,'.',','),1,1,'L',1);
$pdf->Output(utf8_decode('Cátalogo Productos.pdf'), 'I');