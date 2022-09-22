<?php

function open_connection(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db     = "challengeseba";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    return $conn;
}

function close_connection($conn){
    $conn->close();
}

// $db_connection = open_connection();

// if($db_connection) {
//     echo 'conexion exitosa';
// }
// else {
//     echo 'error de conexion';
// }

