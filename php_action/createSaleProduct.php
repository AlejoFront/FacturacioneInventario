<?php
require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
ini_set('date.timezone', 'America/Mexico_City');

if ($_POST) {
    $codProduct = $_POST['productCod'];
    $priceProduct = $_POST['productPrice'];
    $cantProduct = $_POST['productCant'];
    $fecha = date('d/m/Y');

    $sql = "INSERT INTO salesproducts (id_product, costo, cant,fchSaleProd_add) VALUE ('$codProduct', '$priceProduct','$cantProduct','$fecha')";

    $sql2 = "SELECT * FROM products WHERE estado = 1";
    $result = $connect->query($sql2);

    $output = array('data' => array());
    if($result->num_rows > 0) {
        while ($row = $result->fetch_array()){
            $cantAnt = $row[8];
        }

    }

        $cantNueva = $cantAnt + $cantProduct;

    $sql3 = "UPDATE products SET cantidad = '$cantNueva' WHERE id_product = $codProduct";

        if($connect->query($sql) === TRUE && $connect->query($sql3) === TRUE) {
            $valid['success'] = true;
            $valid['messages'] = "Compra exitosa";
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error no se ha podido Agregar la compra";
        }


    $connect->close();

    echo json_encode($valid);
}