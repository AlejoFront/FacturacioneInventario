<?php

require_once 'core.php';

$sql = "SELECT salesproducts.id_product, products.nombre, salesproducts.cant, salesproducts.costo, salesproducts.fchSaleProd_add 
        FROM salesproducts, products WHERE salesproducts.id_product = products.id_product";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {

    $active = "";
    $categoria = "";

    while($row = $result->fetch_array()) {
        $productId = $row[0];



        $output['data'][] = array(
            $productId,
            $row[1],
            // Precio
            "$".number_format($row[3]),
            $row[2],
            // Stock
            $row[4]
        );

    } // /while
}// if num_rows

$connect->close();

echo json_encode($output);
