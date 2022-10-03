<?php

include 'db_connection.php';
include 'functions.php';


// conexion a la BD

$db_con = open_connection();

if($db_con){
    echo 'conexion exitosa ---';
}
else {
    echo 'error de conexion';
}

// aca conseguimos el numero mas alto de formulario.
$sql = "SELECT MAX(form_id) FROM form_filters";
$result = $db_con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "max form id: " . $row["MAX(form_id)"]. "<br>";

        $new_form_id = $row["MAX(form_id)"] +1;
    }
} else {
    echo "0 results";
}

echo print_r($result);

// mostramos la data que viene por POST (todo lo que esta seleccionado en el form de filtros)
echo print_r($_POST);

$parameters_array = array_keys($_POST);

save_data_db($parameters_array, $new_form_id, $db_con);
