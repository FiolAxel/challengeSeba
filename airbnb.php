<?php

include("propiedades.php");
include("funciones.php");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="airbnb.css">
</head>

<body>
</body>

</html>
<?php
$precio_minimo = $_POST["min-price"] ?? 0;
$precio_maximo = $_POST["max-price"] ?? 0;
$alojamiento_completo = $_POST["total-accomodation"] ?? "";
$habitacion_compartida = $_POST["shared-room"] ?? "";
$habitacion_privada = $_POST["private-room"] ?? "";
$habitaciones = $_POST["options-bedrooms"] ?? "";
$camas = $_POST["options-beds"] ?? "";
$banos = $_POST["options-bathrooms"] ?? "";
// $tipo_de_propiedad = $_POST["tipo_de_propiedad"] ?? "";
// $servicios = $_POST["servicios"] ?? "";
// $opciones_de_reserva = $_POST["opciones_de_reserva"] ?? "";
// $accesibilidad = $_POST["accesibilidad"] ?? "";
// $alojamiento_de_primera_clase = $_POST["alojamiento_de_primera_clase"] ?? "";
// $lenguajes = $_POST["lenguajes"] ?? "";

$property_details = [
    "precio_minimo" => $precio_minimo,
    "precio_maximo" => $precio_maximo,
    "alojamiento_completo" => $alojamiento_completo,
    "habitacion_compartida" => $habitacion_compartida,
    "habitacion_privada" => $habitacion_privada,
    "habitaciones" => $habitaciones,
    "camas" => $camas,
    "banos" => $banos
];

function principal($property_details, $propiedades)
{
    $validacion = validar_datos($property_details);
    if ($validacion == true) {
        $resultado_de_precio = buscar_por_precio($propiedades, $property_details["precio_minimo"], $property_details["precio_maximo"]);
        $resultado_de_tipo_de_alojamiento = buscar_por_tipo_de_alojamiento($resultado_de_precio, $property_details["alojamiento_completo"], $property_details["habitacion_compartida"], $property_details["habitacion_privada"]);
        // $resultado_cantidad_de_habitaciones_camas_banos = buscar_por_cantidad_de_habitaciones_camas_banos($resultado_de_tipo_de_alojamiento, $property_details["habitaciones"], $property_details["camas"], $property_details["banos"]);
        foreach ($resultado_de_tipo_de_alojamiento as $value) {
            imprimir_propiedades($value);
        }
    } else {
        echo "Los datos ingresados son incorrectos" . "<br>";
    }
}

principal($property_details, $propiedades);
