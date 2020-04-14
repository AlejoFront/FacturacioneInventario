<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
ini_set('date.timezone', 'America/Mexico_City');
if ($_POST) {
    # code...

    $codProvider     = $_POST['providerCod'];
    $NameProvider    = $_POST['providerName'];
    $AddresProvider  = $_POST['providerAddres'];
    $EmailProvider   = $_POST['providerEmail'];
    $TelProvider     = $_POST['providerTelefono'];
    $CatProvider	 = $_POST['providerCategory'];

    $fecha = date('d/m/Y');
    //status del cliente, 1 = Activo 2 = Inactivo
    $sql = "INSERT INTO providers (id_provider,nombre, direccion, email, telefono, categoria, status, fecha_add) 
				VALUES ('$codProvider','$NameProvider', '$AddresProvider' ,'$EmailProvider', '$TelProvider', '$CatProvider', 1 , '$fecha')";

    if($connect->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Creado exitosamente";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error no se ha podido guardar";
    }


    $connect->close();

    echo json_encode($valid);

}