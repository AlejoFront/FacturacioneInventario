<?php

include 'plantilla.php';
include '../php_action/db_connect.php';


$query = "SELECT * FROM products WHERE categoria = 5";
$resultado = $connect->query($query);


$pdf = new Verduras('L');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25,6,'Cod Barras',1,0,'C',1);
$pdf->Cell(80,6,'Nombre',1,0,'C',1);
$pdf->Cell(70,6,'Marca',1,0,'C',1);
$pdf->Cell(20,6,'Precio',1,1,'C',1);


while($row = $resultado->fetch_assoc() ){

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(25,6,$row['id_product'],1,0,'L');
    $pdf->Cell(80,6,utf8_decode($row['nombre']),1,0,'L');
    $pdf->Cell(70,6,utf8_decode($row['marca']),1,0,'L');
    $pdf->Cell(20,6,'$'.($row['precio']),1,1,'C');

}

$pdf->Output(utf8_decode('Productos Comprados.pdf'), 'I');