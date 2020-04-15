<?php 

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
ini_set('date.timezone', 'America/Mexico_City');
if ($_POST) {
	# code...

	$productName    = $_POST['productName'];
	$productCosto   = $_POST['costo'];
	$productPrecio  = $_POST['precio'];
	$productMarca   = $_POST['marca'];
	$productStatus  = $_POST['productStatus'];
	$categoria		= $_POST['productCat'];
	$plata			= $_POST['Plata'];
	$bronce			= $_POST['Bronce'];
	$fecha = date('d/m/Y');

	# Guardar Imagem Productos

	$type = explode('.', $_FILES['productImage']['name']);
	$type = $type[count($type)-1];
	$url  = '../assests/images/stock/'.uniqid(rand()).'.'.$type;


	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
				//estado del producto, 1 = Activo 2 = Inactivo
				$sql = "INSERT INTO products (nombre, imagen, costo, precio, plata, bronce, marca, cantidad, categoria, status, estado, fchProd_add) 
				VALUES ('$productName', '$url', '$productCosto', '$productPrecio', '$plata', '$bronce', '$productMarca', 0, '$categoria', '$productStatus', 1, '$fecha')";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Creado exitosamente";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error no se ha podido guardar";
				}

			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST



?>
