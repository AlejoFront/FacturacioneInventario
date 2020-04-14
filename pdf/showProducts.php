<?php

    include 'plantilla.php';
    include '../php_action/db_connect.php';

$query = "SELECT * FROM products ";
$resultado = $connect->query($query);


$pdf = new Productos('L','mm','legal');
$pdf->AliasNbPages();
$pdf->AddPage();

while($row = $resultado->fetch_assoc() ){

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(25,6,$row['id_product'],1,0,'L');
    $pdf->Cell(80,6,utf8_decode($row['nombre']),1,0,'L');
    $pdf->Cell(70,6,utf8_decode($row['marca']),1,0,'L');


    if ($row['categoria'] == 1) {
        $pdf->Cell(35,6,utf8_decode('Aseo'),1,0,'L');
    }elseif ($row['categoria'] == 2) {
        $pdf->Cell(35,6,utf8_decode('Electrodomesticos'),1,0,'L');
    }elseif ($row['categoria'] == 3) {
        $pdf->Cell(35,6,utf8_decode('Frutas'),1,0,'L');
    }elseif ($row['categoria'] == 4) {
        $pdf->Cell(35,6,utf8_decode('Carnes'),1,0,'L');
    }elseif ($row['categoria'] == 5) {
        $pdf->Cell(35,6,utf8_decode('Verduras'),1,0,'L');
    }elseif ($row['categoria'] == 6) {
        $pdf->Cell(35,6,utf8_decode('Lacteos'),1,0,'L');
    }elseif ($row['categoria'] == 7) {
        $pdf->Cell(35,6,utf8_decode('Embutidos'),1,0,'L');
    }elseif ($row['categoria'] == 8) {
        $pdf->Cell(35,6,utf8_decode('Dulces'),1,0,'L');
    }

    $pdf->Cell(20,6,$row['cantidad'],1,0,'C');

    if ($row['status'] == 1) {
        $pdf->Cell(30,6,utf8_decode('DISPONIBLE'),1,1,'L');
    }else{
        $pdf->Cell(30,6,utf8_decode('NO DISPONIBLE'),1,1,'L');
    }

}

$pdf->Output(utf8_decode('Cátalogo Productos.pdf'), 'I');