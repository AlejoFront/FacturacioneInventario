<?php

include 'plantilla.php';
include '../php_action/db_connect.php';


$query = "SELECT * FROM products ";
$resultado = $connect->query($query);


$pdf = new Utilidad('L');
$pdf->AliasNbPages();
$pdf->AddPage();


$costo      = 0;
$precio     = 0;
$utilidad   = 0;
$plata      = 0;
$utilplata  = 0;
$bronce 	= 0;
$utilbronce = 0;
while($row = $resultado->fetch_assoc() ){

    $costo     = $row['costo'];
    $precio    = $row['precio'];
    $plata     = $row['plata'];
    $bronce    = $row['bronce'];
    $utilidad  = $precio - $costo;
    $utilplata = $plata  - $costo;
    $utilbronce= $bronce - $costo;

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(18,6,$row['id_product'],1,0,'L');
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(60,6,utf8_decode($row['nombre']),1,0,'L');
    $pdf->Cell(50,6,utf8_decode($row['marca']),1,0,'L');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(20,6,'$'.number_format($row['costo'],2,'.',','),1,0,'C');
    $pdf->Cell(20,6,'$'.number_format($row['precio'],2,'.',','),1,0,'C');
    $pdf->Cell(20,6,'$'.number_format($utilidad,2,'.',','),1,0,'C');
    $pdf->Cell(20,6,'$'.number_format($row['plata'],2,'.',','),1,0,'C');
    $pdf->Cell(20,6,'$'.number_format($utilplata,2,'.',','),1,0,'C');
    $pdf->Cell(20,6,'$'.number_format($row['bronce'],2,'.',','),1,0,'C');
    $pdf->Cell(20,6,'$'.number_format($utilbronce,2,'.',','),1,1,'C');

}

$pdf->Output(utf8_decode('Utilidad Productos.pdf'), 'I');