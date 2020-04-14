<?php

require_once 'core.php';

$providerId = $_POST['providerId'];

$sql = "SELECT * FROM providers WHERE id_provider= $providerId";
$result = $connect->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);