<?php

function buscar_por_precio($propiedades, $precio_minimo, $precio_maximo)
{
    if ($precio_minimo == "" && $precio_maximo == "") {
        return $propiedades;
    }
    $resultado = [];
    foreach ($propiedades as $propiedad) {
        if ($propiedad["precio"] >= $precio_minimo && $propiedad["precio"] <= $precio_maximo) {
            $resultado[] = $propiedad;
        }
    }
    return $resultado;
}

function buscar_por_tipo_de_alojamiento($conjunto_de_precio, $alojamiento_completo, $habitacion_compartida, $habitacion_privada)
{
    if($alojamiento_completo == "true"){
        $alojamiento_completo = "total-accomodation";
    }
    if($habitacion_compartida == "true"){
        $habitacion_compartida = "shared-room";
    }
    if($habitacion_privada == "true"){
        $habitacion_privada = "private-room";
    }
    $resultado = [];
    foreach ($conjunto_de_precio as $alojamiento) {
        if ($alojamiento["tipo_de_alojamiento"] == $alojamiento_completo || $alojamiento["tipo_de_alojamiento"] == $habitacion_compartida || $alojamiento["tipo_de_alojamiento"] == $habitacion_privada) {
            $resultado[] = $alojamiento;
        }
    }
    return $resultado;
}

// function buscar_por_cantidad_de_habitaciones_camas_banos($conjunto_tipo_de_alojamiento, $habitaciones, $camas, $banos){
//     $resultado = [];
//     foreach ($conjunto_tipo_de_alojamiento as $cantidad) {
//         if ($cantidad["habitaciones"] == $habitaciones && $cantidad["camas"] == $camas && $cantidad["banos"] == $banos) {
//             $resultado[] = $cantidad;
//         }
//     }
//     return $resultado;
// }

function imprimir_propiedades($item)
{
    echo '<div class="ficha">
    <img src="'.$item["imagen"].'">
    <br>
    <strong>El precio es ' . $item["precio"] . '</strong>
    <br>
    <strong> Tipo de alojamiento: ' . $item["tipo_de_alojamiento"] . '</strong>
    <br>
    <strong> Cantidad de habitaciones: ' . $item["habitaciones"] . '</strong>
    <br>
    <strong> Cantidad de camas: ' . $item["camas"] . '</strong>
    <br>
    <strong> Cantidad de banos: ' . $item["banos"] . '</strong>
         </div>';
}

function validar_datos($property_details)
{
    if ($property_details["precio_minimo"] !== "") {
        if ($property_details["precio_minimo"] < 0 || !is_numeric($property_details["precio_minimo"])) {
            return false;
        }
    }
    if ($property_details["precio_maximo"] !== "") {
        if ($property_details["precio_maximo"] < 0 || !is_numeric($property_details["precio_maximo"])) {
            return false;
        }
    }
    return true;
}
