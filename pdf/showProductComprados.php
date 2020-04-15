<?php

include 'plantilla.php';
include '../php_action/db_connect.php';

$query = "SELECT salesproducts.id_product, products.nombre, salesproducts.cant, salesproducts.costo, salesproducts.fchSaleProd_add 
        FROM salesproducts, products WHERE salesproducts.id_product = products.id_product";
$resultado = $connect->query($query);


$pdf = new ListComprado('L','mm','legal');
$pdf->AliasNbPages();
$pdf->AddPage();

while($row = $resultado->fetch_assoc() ){

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(25,6,utf8_decode($row['id_product']),1,0,'L');
    $pdf->Cell(80,6,utf8_decode($row['nombre']),1,0,'L');
    $pdf->Cell(70,6,utf8_decode($row['cant']),1,0,'L');
    $pdf->Cell(70,6,$row['costo'],1,0,'C');
    $pdf->Cell(30,6,utf8_decode($row['fchSaleProd_add']),1,1,'L');


}

$pdf->Output(utf8_decode('Cátalogo Productos.pdf'), 'I');