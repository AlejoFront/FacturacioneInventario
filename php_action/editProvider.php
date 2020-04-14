<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

    $codProvider     = $_POST['providerId'];
    $NameProvider    = $_POST['editProviderName'];
    $AddProvider     = $_POST['editProviderAddress'];
    $EmailProvider   = $_POST['editProviderEmail'];
    $TelProvider    = $_POST['editProviderTelefono'];
    $CatProvider	   = $_POST['editproviderCategory'];

    $sql = "UPDATE providers SET nombre = '$NameProvider', direccion = '$AddProvider', email = '$EmailProvider', telefono = '$TelProvider'
                                 , categoria = '$CatProvider'
			WHERE id_provider = $codProvider";

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
