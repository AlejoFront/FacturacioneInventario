<?php

include '../php_action/db_connect.php';
require_once  'plantilla.php';

$query = "SELECT  orders.fecha_add, orders.id_order, orders.client_id, orders.total, orders.monto, 
                  orders.saldo, orders.fecha_liqui, clients.id_client, clients.nombre_cte
			  FROM orders 
			  INNER JOIN clients
			  ON orders.client_id = clients.id_client
			  WHERE  tipo_orden = 1 AND  saldo != 0";
$resultado = $connect->query($query);


$pdf = new ConsigSaldo('L');
$pdf->AliasNbPages();
$pdf->AddPage();

while($row = $resultado->fetch_assoc() ){

    //$totalGasto = $totalGasto + $row['total'];
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(25,6,$row['fecha_add'],1,0,'C');
    $pdf->Cell(15,6,$row['id_order'],1,0,'C');
    $pdf->Cell(15,6,$row['client_id'],1,0,'C');
    $pdf->Cell(70,6,utf8_decode($row['nombre_cte']),1,0,'C');
    $pdf->Cell(30,6,'$'.number_format($row['total'],2,'.',','),1,0,'C');
    $pdf->Cell(30,6,'$'.number_format($row['monto'],2,'.',','),1,0,'C');
    $pdf->Cell(30,6,'$'.number_format($row['saldo'],2,'.',','),1,0,'C');
    $pdf->Cell(35,6,$row['fecha_liqui'],1,1,'C');



}



$pdf->Output('Consinaciones con Saldo.pdf', 'I');