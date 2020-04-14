<?php

include 'plantilla.php';
include '../php_action/db_connect.php';

$query = "SELECT * FROM clients WHERE  categoria = 1";
$resultado = $connect->query($query);


$pdf = new Oro('L');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,6,'Clave',1,0,'C',1);
$pdf->Cell(60,6,'Nombre',1,0,'C',1);
$pdf->Cell(60,6,'Direccion',1,0,'C',1);
$pdf->Cell(30,6,'Telefono',1,0,'C',1);

$pdf->Cell(90,6,'Comentario',1,1,'C',1);


while($row = $resultado->fetch_assoc() ){

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(15,6,$row['id_client'],1,0,'L');
    $pdf->Cell(60,6,utf8_decode($row['nombre_cte']),1,0,'L');
    $pdf->Cell(60,6,utf8_decode($row['direccion']),1,0,'L');
    $pdf->Cell(30,6,utf8_decode($row['telefono']),1,0,'L');


    $pdf->SetFont('Arial','',8);
    $pdf->MultiCell(90,6,utf8_decode($row['comentario']),1,'L',0);

}

$pdf->Output('Clientes_Cat_Oro.pdf', 'I');