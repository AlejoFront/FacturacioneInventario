<?php

include 'plantilla.php';
include '../php_action/db_connect.php';

$query = "SELECT id_client, nombre_cte, direccion, telefono, categoria, status FROM clients WHERE status = 1";
$resultado = $connect->query($query);

$pdf = new Activos('L');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(23,6,'Cedula',1,0,'C',1);
$pdf->Cell(70,6,'Nombre',1,0,'C',1);
$pdf->Cell(70,6,'Direccion',1,0,'C',1);
$pdf->Cell(50,6,'Telefono',1,0,'C',1);
$pdf->Cell(25,6,'Categoria',1,0,'C',1);
$pdf->Cell(25,6,'Status',1,1,'C',1);



while($row = $resultado->fetch_assoc() ){

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(23,6,$row['id_client'],1,0,'L');
    $pdf->Cell(70,6,utf8_decode($row['nombre_cte']),1,0,'L');
    $pdf->Cell(70,6,utf8_decode($row['direccion']),1,0,'L');
    $pdf->Cell(50,6,utf8_decode($row['telefono']),1,0,'L');

    if ($row['categoria'] == 1) {
        # code...
        $pdf->Cell(25,6,'ORO',1,0,'L');
    }elseif ($row['categoria'] == 2) {
        # code...
        $pdf->Cell(25,6,'PLATA',1,0,'L');
    }else{
        $pdf->Cell(25,6,'BRONCE',1,0,'L');
    }

    if ($row['status'] == 1) {
        # code...
        $pdf->Cell(25,6,'ACTIVO',1,1,'L');
    }else{
        $pdf->Cell(25,6,'INACTIVO',1,1,'L');
    }

}

$pdf->Output(utf8_decode('Catálogo de Clientes.pdf'), 'I');
