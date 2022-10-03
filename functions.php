<?php

function save_data_db( $parameters_array, $new_form_id, $db_con ){
    foreach($parameters_array as $param){
        if( strpos($param, "services") === false &&
        strpos($param, "accesibility") === false &&
        strpos($param, "language") === false) {
            save_field_db("$param", $new_form_id, $db_con);
        }
        else {
            // guardado del campo que es de tipo array
            // hay que ver si es services, accesibility o language
            if( strpos($param, "services") !== false){
                $services_options[] = $param;
            }
            if( strpos($param, "accesibility") !== false){
                $accesibility_options[] = $param;
            }
            if( strpos($param, "language") !== false){
                $language_options[] = $param;
            }
        }
    }
    $asd = 123;
    $arrayed_fields = array(
        'services_options'     => !empty($services_options) ? $services_options : array(),
        'accesibility_options' => !empty($accesibility_options) ? $accesibility_options : array(),
        'language_options'     => !empty($language_options) ? $language_options : array()
    );
    $arrayed_fields_transformed = transform_array($arrayed_fields);
    save_array_fields_db($arrayed_fields_transformed, $new_form_id, $db_con);
}

function save_array_fields_db($arrayed_fields, $new_form_id, $db_con){
    foreach($arrayed_fields as $key => $value){
        $encoded_features = json_encode($value);
        $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value) VALUES ($new_form_id, '$key', '$encoded_features')";
        if ( $db_con->query($sql) === TRUE ) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db_con->error;
        }
    }
}

function save_field_db( $field_name, $new_form_id, $db_con ) {
    if (! empty($_POST["$field_name"])) {
        $field_value = $_POST["$field_name"];
    }
    if (! empty($field_value)) {
        $sql = "INSERT INTO form_filters (form_id, meta_key, meta_value)
        VALUES ( $new_form_id, '$field_name', '$field_value')";

        if ($db_con->query($sql) === TRUE) {
            echo 'last id: '. mysqli_insert_id($db_con) . ' ----';
            echo "New record created successfully";
        }
        else {
            echo 'last id: '. mysqli_insert_id($db_con) . ' ----';
            echo "Error: " . $sql . "<br>" . $db_con->error;
        }
    }
}

function transform_array( $arrayed_fields ) {
    foreach($arrayed_fields as $key => $value){
        $new_array = array();
        foreach($value as $array_item){
            $new_array["$array_item"] = true;
        }
        $transformed_array_fields[$key] = $new_array;
    }
    return $transformed_array_fields;
}