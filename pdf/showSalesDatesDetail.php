<?php

$desde = date('d/m/Y', strtotime($_POST['fcha1X']));
$hasta = date('d/m/Y', strtotime($_POST['fcha2Z']));

include '../php_action/db_connect.php';
require_once  'fpdf/fpdf.php';


$query = "SELECT orders.id_order, orders.fecha_add, orders.client_id, orders.tipo_orden, 
                 orders_detalle.order_id, orders_detalle.product_id, orders_detalle.cantidad, 
                 orders_detalle.precio, orders_detalle.total, products.id_product, products.nombre, clients.id_client, 
			     clients.nombre_cte
	          FROM orders 
	          INNER JOIN orders_detalle
	          ON orders.id_order = orders_detalle.order_id 
	          INNER JOIN clients 
	          ON orders.client_id = clients.id_client 
	          INNER JOIN products
	          ON orders_detalle.product_id = products.id_product
	          WHERE orders.fecha_add BETWEEN '$desde' AND '$hasta' AND tipo_orden = 2 ";
$resultado = $connect->query($query);

$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(245, 6, 'Reporte de Ventas Detallado',0,0,'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30, 6, 'Hoy: '.date('d/m/Y').'',0,1,'R');
$pdf->SetFont('Arial','',11);
$pdf->Cell(90,6,'',0,0);
$pdf->Cell(80,6, 'Desde: '.$desde.' 		Hasta: '.$hasta,0,1);
$pdf->Ln(2);


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,6,'Folio',1,0,'C',1);
$pdf->Cell(20,6,'Fecha',1,0,'C',1);
$pdf -> SetFont('Arial', 'B', 7);
$pdf->Cell(12,6,'Cod Cte',1,0,'C',1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,6,'Nombre Cte.',1,0,'C',1);
$pdf -> SetFont('Arial', 'B', 7);
$pdf->Cell(20,6,'Cod Produc.',1,0,'C',1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(90,6,utf8_decode('Descripción'),1,0,'C',1);
$pdf -> SetFont('Arial', 'B', 7);
$pdf->Cell(12,6,'Cantidad',1,0,'C',1);
$pdf->Cell(20,6,'Precio Unit.',1,0,'C',1);
$pdf->Cell(25,6,'Total',1,1,'C',1);

$totalGasto = 0;
while($row = $resultado->fetch_assoc() ){

    $totalGasto = $totalGasto + $row['total'];
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(15,6,$row['id_order'],1,0,'C');
    $pdf->Cell(20,6,$row['fecha_add'],1,0,'C');
    $pdf->Cell(12,6,$row['client_id'],1,0,'C');
    $pdf->Cell(60,6,utf8_decode($row['nombre_cte']),1,0,'C');
    $pdf->Cell(20,6,$row['product_id'],1,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(90,6,utf8_decode($row['nombre']),1,0,'C');
    $pdf->Cell(12,6,$row['cantidad'],1,0,'C');
    $pdf->Cell(20,6,'$'.number_format($row['precio'],2,'.',','),1,0,'R');
    $pdf->Cell(25,6,'$'.number_format($row['total'],2,'.',','),1,1,'R');

}

$pdf -> SetFont('Arial', 'B', 8);
$pdf->SetFillColor(232,232,232);
$pdf -> Cell(249,6,'',0);
$pdf -> Cell(25,6,'$'.number_format($totalGasto,2,'.',','),1,1,'R',1);


$pdf->Output(utf8_decode('Ventas_Detallado.pdf'), 'I');