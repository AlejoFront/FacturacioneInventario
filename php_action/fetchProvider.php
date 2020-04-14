<?php

require_once 'core.php';
//status del providere, 1 = Activo 2 = Inactivo
$sql = "SELECT * FROM providers WHERE  status = 1";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {

    $categoria = "";


    while($row = $result->fetch_array()) {
        $providerId = $row[0];

        if($row[5] == 1) {
            $categoria = "<label>Aseo</label>";
        } elseif ($row[5] == 2) {
            $categoria = "<label>Electrodomesticos</label>";
        } elseif ($row[5] == 3) {
            $categoria = "<label>Frutas</label>";
        }elseif ($row[5] == 4) {
            $categoria = "<label>Carnes</label>";
        }elseif ($row[5] == 5) {
            $categoria = "<label>verduras</label>";
        } elseif ($row[5] == 6) {
            $categoria = "<label>Lacteos</label>";
        }elseif ($row[5] == 7) {
            $categoria = "<label>Embutidos</label>";
        }elseif ($row[5] == 8) {
            $categoria = "<label>Dulces</label>";
        }

        $button = '<!-- Single button -->
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Acción <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a type="button" data-toggle="modal" id="editClientModalBtn" data-target="#editClientModal"     onclick="editClient('.$providerId.')"> <i class="glyphicon glyphicon-edit"></i> Editar</a></li>
							<li><a type="button" data-toggle="modal" data-target="#removeClientModal" id="removeClientModalBtn" onclick="removeProvider('.$providerId.')"> <i class="glyphicon glyphicon-trash"></i> Eliminar</a></li>       
						</ul>
					</div>';

        $output['data'][] = array(
            //Codigo
            $providerId,
            // Nombre
            $row[1],
            $row[2],
            // email
            $row[3],
            $row[4],
            $categoria,
            // button
            $button
        );

    } // /while
}// if num_rows

$connect->close();

echo json_encode($output);