<?php

include 'db_connection.php';

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

// guardamos el min price en la db

// primero tomo el min-price que me viene por el post
$min_price = $_POST["min-price"];
if (! empty($min_price)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ( $new_form_id, 'min-price', $min_price)";

    if ($db_con->query($sql) === TRUE) {
        echo 'last id: '. mysqli_insert_id($db_con) . ' ----';
        echo "New record created successfully";
    }
    else {
        echo 'last id: '. mysqli_insert_id($db_con) . ' ----';
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

$last_id = mysqli_insert_id($db_con);

// guardamos el max price en la db

// primero tomo el max-price que me viene por el post



$max_price = $_POST["max-price"];
if (! empty($max_price)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'max-price', $max_price)";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["total-accomodation"])) {
    $total_accomodation = $_POST["total-accomodation"];
}
if (! empty($total_accomodation)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'total_accomodation', '$total_accomodation')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["shared-room"])) {
    $shared_room = $_POST["shared-room"];
}
if (! empty($shared_room)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'shared_room', '$shared_room')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["private-room"])) {
    $private_room = $_POST["private-room"];
}
if (! empty($private_room)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'private_room', '$private_room')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["options-bedrooms"])) {
    $options_bedrooms = $_POST["options-bedrooms"];
}
if (! empty($options_bedrooms)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'options_bedrooms', '$options_bedrooms')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["options-beds"])) {
    $options_beds = $_POST["options-beds"];
}
if (! empty($options_beds)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'options_beds', '$options_beds')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["options-bathrooms"])) {
    $options_bathrooms = $_POST["options-bathrooms"];
}
if (! empty($options_bathrooms)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'options_bathrooms', '$options_bathrooms')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["option-house"])) {
    $options_house = $_POST["option-house"];
}
if (! empty($options_house)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'options_house', '$options_house')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["option-appartment"])) {
    $options_appartment = $_POST["option-appartment"];
}
if (! empty($options_appartment)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'options_appartment', '$options_appartment')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["option-guest"])) {
    $options_guest = $_POST["option-guest"];
}
if (! empty($options_guest)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'options_guest', '$options_guest')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["option-hotel"])) {
    $options_hotel = $_POST["option-hotel"];
}
if (! empty($options_hotel)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'options_hotel', '$options_hotel')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

$services_options = array(
    "services-wifi" => isset($_POST['services-wifi']),
    "services-kitchen" => isset($_POST['services-kitchen']),
    "services-washing" => isset($_POST['services-washing']),
    "services-dryer" => isset($_POST['services-dryer']),
    "services-air" => isset($_POST['services-air']),
    "services-heating" => isset($_POST['services-heating']),
);
$encoded_services = json_encode($services_options);
$sql = "INSERT INTO form_filters (form_id, meta_key, meta_value) VALUES ($new_form_id, 'services_options', '$encoded_services')";
if ( $db_con->query($sql) === TRUE ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $db_con->error;
}

if (! empty($_POST["immediate-booking"])) {
    $immediate_booking = $_POST["immediate-booking"];
}
if (! empty($immediate_booking)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'immediate_booking', '$immediate_booking')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["unrestricted-booking"])) {
    $unrestricted_booking = $_POST["unrestricted-booking"];
}
if (! empty($unrestricted_booking)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'unrestricted_booking', '$unrestricted_booking')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

$accessibility_features = array(
    "guest-entrance" => isset($_POST['guest-entrance']),
    "entrance-81" => isset($_POST['entrance-81']),
    "parking" => isset($_POST['parking']),
    "pathway" => isset($_POST['pathway']),
);
$encoded_features = json_encode($accessibility_features);
$sql = "INSERT INTO form_filters (form_id, meta_key, meta_value) VALUES ($new_form_id, 'accessibility_features', '$encoded_features')";
if ( $db_con->query($sql) === TRUE ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $db_con->error;
}

if (! empty($_POST["superhost"])) {
    $superhost = $_POST["superhost"];
}
if (! empty($superhost)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'superhost', '$superhost')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

if (! empty($_POST["airbnb-plus"])) {
    $airbnb_plus = $_POST["airbnb-plus"];
}
if (! empty($airbnb_plus)) {

    $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
    VALUES ($new_form_id, 'airbnb_plus', '$airbnb_plus')";

    if ($db_con->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $db_con->error;
    }
}

$host_language = array(
    "language-english" => isset($_POST['language-english']),
    "language-french" => isset($_POST['language-french']),
    "language-german" => isset($_POST['language-german']),
    "language-italian" => isset($_POST['language-italian']),
);
$encoded_languages = json_encode($host_language);
$sql = "INSERT INTO form_filters (form_id, meta_key, meta_value) VALUES ($new_form_id, 'host_language', '$encoded_languages')";
if ( $db_con->query($sql) === TRUE ) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $db_con->error;
}