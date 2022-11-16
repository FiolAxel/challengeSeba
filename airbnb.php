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
$casa = $_POST["option-house"] ?? "";
$departamento = $_POST["option-appartment"] ?? "";
$casa_de_huespedes = $_POST["option-guest"] ?? "";
$hotel = $_POST["option-hotel"] ?? "";
$wifi = $_POST["services-wifi"] ?? "";
$cocina = $_POST["services-kitchen"] ?? "";
$lavarropas = $_POST["services-washing"] ?? "";
$secadora = $_POST["services-dryer"] ?? "";
$aire_acondicionado = $_POST["services-air"] ?? "";
$calefaccion = $_POST["services-heating"] ?? "";
$reserva_inmediata = $_POST["immediate-booking"] ?? "";
$reserva_sin_restricciones = $_POST["unrestricted-booking"] ?? "";
$entrada_sin_escalones = $_POST["accesibility-guest-entrance"] ?? "";
$entrada_mas_de_81_centimetros = $_POST["accesibility-entrance-81"] ?? "";
$estacionamiento_accesible = $_POST["accesibility-parking"] ?? "";
$entrada_con_sendero = $_POST["accesibility-pathway"] ?? "";
$super_anfitrion = $_POST["superhost"] ?? "";
$airbnb_plus = $_POST["airbnb-plus"] ?? "";
$ingles = $_POST["language-english"] ?? "";
$frances = $_POST["language-french"] ?? "";
$aleman = $_POST["language-german"] ?? "";
$italiano = $_POST["language-italian"] ?? "";

$property_details = [
    "precio_minimo" => $precio_minimo,
    "precio_maximo" => $precio_maximo,
    "alojamiento_completo" => $alojamiento_completo,
    "habitacion_compartida" => $habitacion_compartida,
    "habitacion_privada" => $habitacion_privada,
    "habitaciones" => $habitaciones,
    "camas" => $camas,
    "banos" => $banos,
    "casa" =>  $casa,
    "departamento" => $departamento,
    "casa_de_huespedes" => $casa_de_huespedes,
    "hotel" => $hotel,
    "servicios" => [
        "wifi" => $wifi,
        "cocina" => $cocina,
        "lavarropas" => $lavarropas,
        "secadora" => $secadora,
        "aire_acondicionado" => $aire_acondicionado,
        "calefaccion" => $calefaccion
    ],
    "opciones_de_reserva" => [
        "reserva_inmediata" => $reserva_inmediata,
        "reserva_sin_restricciones" => $reserva_sin_restricciones
    ],
    "accesibilidad" => [
        "entrada_sin_escalones" => $entrada_sin_escalones,
        "entrada_mas_de_81_centimetros" => $entrada_mas_de_81_centimetros,
        "estacionamiento_accesible" => $estacionamiento_accesible,
        "entrada_con_sendero" => $entrada_con_sendero
    ],
    "alojamiento_de_primera_clase" => [
        "super_anfitrion" => $super_anfitrion,
        "airbnb_plus" => $airbnb_plus
    ],
    "lenguajes" => [
        "ingles" => $ingles,
        "frances" => $frances,
        "aleman" => $aleman,
        "italiano" => $italiano
    ]
];

function principal($propiedades, $property_details)
{
    $validacion = validar_datos($property_details);
    if ($validacion == true) {
        $resultado_de_precio = buscar_por_precio($propiedades, $property_details["precio_minimo"], $property_details["precio_maximo"]);
        $resultado_tipo_de_alojamiento = buscar_por_tipo_de_alojamiento($resultado_de_precio, $property_details["alojamiento_completo"], $property_details["habitacion_compartida"], $property_details["habitacion_privada"]);
        $resultado_cantidad_de_habitaciones_camas_banos = buscar_por_cantidad_de_habitaciones_camas_banos($resultado_tipo_de_alojamiento, $property_details["habitaciones"], $property_details["camas"], $property_details["banos"]);
        $resultado_tipo_de_propiedad = buscar_por_tipo_de_propiedad($resultado_cantidad_de_habitaciones_camas_banos, $property_details["casa"], $property_details["departamento"], $property_details["casa_de_huespedes"], $property_details["hotel"]);
        $resultado_de_servicios = buscar_por_servicios($resultado_tipo_de_propiedad, $property_details["servicios"]["wifi"], $property_details["servicios"]["cocina"], $property_details["servicios"]["lavarropas"], $property_details["servicios"]["secadora"], $property_details["servicios"]["aire_acondicionado"], $property_details["servicios"]["calefaccion"]);
        $resultado_opciones_de_reserva = buscar_por_reserva($resultado_de_servicios, $property_details["opciones_de_reserva"]["reserva_inmediata"], $property_details["opciones_de_reserva"]["reserva_sin_restricciones"]);
        $resultado_de_accesibilidad = buscar_por_accesibilidad($resultado_opciones_de_reserva, $property_details["accesibilidad"]["entrada_sin_escalones"], $property_details["accesibilidad"]["entrada_mas_de_81_centimetros"], $property_details["accesibilidad"]["estacionamiento_accesible"], $property_details["accesibilidad"]["entrada_con_sendero"]);
        $resultado_de_alojamiento_primera_clase = buscar_por_alojamiento_primera_clase($resultado_de_accesibilidad, $property_details["alojamiento_de_primera_clase"]["super_anfitrion"], $property_details["alojamiento_de_primera_clase"]["airbnb_plus"]);
        $resultado_de_lenguajes = buscar_por_lenguaje($resultado_de_alojamiento_primera_clase, $property_details["lenguajes"]["ingles"], $property_details["lenguajes"]["frances"], $property_details["lenguajes"]["aleman"], $property_details["lenguajes"]["italiano"]);
        foreach ($resultado_de_lenguajes as $value) {
            imprimir_propiedades($value);
        }
    } else {
        echo "Los datos ingresados son incorrectos" . "<br>";
    }
}

principal($propiedades, $property_details);
