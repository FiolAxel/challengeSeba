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
    if ($alojamiento_completo == "false" && $habitacion_compartida == "false" && $habitacion_privada == "false") {
        return $conjunto_de_precio;
    }
    if ($alojamiento_completo == "true") {
        $alojamiento_completo = "total-accomodation";
    }
    if ($habitacion_compartida == "true") {
        $habitacion_compartida = "shared-room";
    }
    if ($habitacion_privada == "true") {
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

function buscar_por_cantidad_de_habitaciones_camas_banos($conjunto_tipo_de_alojamiento, $habitaciones, $camas, $banos)
{
    if ($habitaciones == "any" && $camas == "any" && $banos == "any") {
        return $conjunto_tipo_de_alojamiento;
    }
    $resultado = [];
    foreach ($conjunto_tipo_de_alojamiento as $cantidad) {
        if ($cantidad["habitaciones"] == $habitaciones || $cantidad["camas"] == $camas || $cantidad["banos"] == $banos) {
            $resultado[] = $cantidad;
        }
    }
    return $resultado;
}

function buscar_por_tipo_de_propiedad($conjunto_cantidad_de_habitaciones_camas_banos, $casa, $departamento, $casa_de_huespedes, $hotel)
{
    if ($casa == "false" && $departamento == "false" && $casa_de_huespedes == "false" && $hotel == "false") {
        return $conjunto_cantidad_de_habitaciones_camas_banos;
    }
    if ($casa == "true") {
        $casa = "option-house";
    }
    if ($departamento == "true") {
        $departamento = "option-appartment";
    }
    if ($casa_de_huespedes == "true") {
        $casa_de_huespedes = "option-guest";
    }
    if ($hotel == "true") {
        $hotel = "option-hotel";
    }
    $resultado = [];
    foreach ($conjunto_cantidad_de_habitaciones_camas_banos as $tipo) {
        if ($tipo["tipo_de_propiedad"] == $casa || $tipo["tipo_de_propiedad"] == $departamento || $tipo["tipo_de_propiedad"] == $casa_de_huespedes || $tipo["tipo_de_propiedad"] == $hotel) {
            $resultado[] = $tipo;
        }
    }
    return $resultado;
}

function buscar_por_servicios($conjunto_tipo_de_propiedad, $wifi, $cocina, $lavarropas, $secadora, $aire_acondicionado, $calefaccion)
{
    if ($wifi == "false" && $cocina == "false" && $lavarropas == "false" && $secadora == "false" && $aire_acondicionado == "false" && $calefaccion == "false") {
        return $conjunto_tipo_de_propiedad;
    }
    $resultado = [];

    foreach ($conjunto_tipo_de_propiedad as $servicio) {
        $validacion = true;
        if ($wifi == "true" && $servicio["servicios"]["wifi"] == "false") {
            $validacion = false;
        }
        if ($cocina == "true" && $cocina != $servicio["servicios"]["cocina"]) {
            $validacion = false;
        }
        if ($lavarropas == "true" && $lavarropas != $servicio["servicios"]["lavarropas"]) {
            $validacion = false;
        }
        if ($secadora == "true" && $secadora != $servicio["servicios"]["secadora"]) {
            $validacion = false;
        }
        if ($aire_acondicionado == "true" && $aire_acondicionado != $servicio["servicios"]["aire_acondicionado"]) {
            $validacion = false;
        }
        if ($calefaccion == "true" && $calefaccion != $servicio["servicios"]["calefaccion"]) {
            $validacion = false;
        }

        if ($validacion == true) {
            $resultado[] = $servicio;
        }
    }
    return $resultado;
}

function buscar_por_reserva($conjunto_de_servicios, $reserva_inmediata, $reserva_sin_restricciones)
{
    if ($reserva_inmediata == "false" && $reserva_sin_restricciones == "false") {
        return $conjunto_de_servicios;
    }
    $resultado = [];

    foreach ($conjunto_de_servicios as $reservas) {
        $reserva = true;
        if ($reserva_inmediata == "true" && $reserva_inmediata != $reservas["opciones_de_reserva"]["reserva_inmediata"]) {
            $reserva = false;
        }
        if ($reserva_sin_restricciones == "true" && $reserva_sin_restricciones != $reservas["opciones_de_reserva"]["acceso_inmediato"]) {
            $reserva = false;
        }
        if ($reserva == true) {
            $resultado[] = $reservas;
        }
    }
    return $resultado;
}

function buscar_por_accesibilidad($conjunto_de_reserva, $entrada_sin_escalones, $entrada_mas_de_81_centimetros, $estacionamiento_accesible, $entrada_con_sendero)
{
    if ($entrada_sin_escalones == "false" && $entrada_mas_de_81_centimetros == "false" && $estacionamiento_accesible == "false" && $entrada_con_sendero == "false") {
        return $conjunto_de_reserva;
    }
    $resultado = [];

    foreach ($conjunto_de_reserva as $accesibilidad) {
        $accesibilidades = true;
        if ($entrada_sin_escalones == "true" && $entrada_sin_escalones != $accesibilidad["accesibilidad"]["entrada_sin_escalones"]) {
            $accesibilidades = false;
        }
        if ($entrada_mas_de_81_centimetros == "true" && $entrada_mas_de_81_centimetros != $accesibilidad["accesibilidad"]["entrada_mas_de_81_centimetros"]) {
            $accesibilidades = false;
        }
        if ($estacionamiento_accesible == "true" && $estacionamiento_accesible != $accesibilidad["accesibilidad"]["estacionamiento_accesible"]) {
            $accesibilidades = false;
        }
        if ($entrada_con_sendero == "true" && $entrada_con_sendero != $accesibilidad["accesibilidad"]["entrada_con_sendero"]) {
            $accesibilidades = false;
        }
        if ($accesibilidades == true) {
            $resultado[] = $accesibilidad;
        }
    }
    return $resultado;
}

function buscar_por_alojamiento_primera_clase($conjunto_de_accesibilidad, $super_anfitrion, $airbnb_plus)
{
    if ($super_anfitrion == "false" && $airbnb_plus == "false") {
        return $conjunto_de_accesibilidad;
    }
    $resultado = [];

    foreach ($conjunto_de_accesibilidad as $alojamiento) {
        $control = true;
        if ($super_anfitrion == "true" && $super_anfitrion != $alojamiento["alojamiento_de_primera_clase"]["super_anfitrion"]) {
            $control = false;
        }
        if ($airbnb_plus == "true" && $airbnb_plus != $alojamiento["alojamiento_de_primera_clase"]["airbnb_plus"]) {
            $control = false;
        }
        if ($control == true) {
            $resultado[] = $alojamiento;
        }
    }
    return $resultado;
}

function buscar_por_lenguaje($conjunto_de_alojamiento_de_primera_clase, $ingles, $frances, $aleman, $italiano) {
    if ($ingles == "false" && $frances == "false" && $aleman == "false" && $italiano == "false") {
        return $conjunto_de_alojamiento_de_primera_clase;
    }
    $resultado = [];

    foreach ($conjunto_de_alojamiento_de_primera_clase as $lenguajes) {
        $lenguaje = true;
        if($ingles == "true" && $ingles != $lenguajes["lenguajes"]["ingles"]){
            $lenguaje = false;
        }
        if($frances == "true" && $frances != $lenguajes["lenguajes"]["frances"]){
            $lenguaje = false;
        }
        if($aleman == "true" && $aleman != $lenguajes["lenguajes"]["aleman"]){
            $lenguaje = false;
        }
        if($italiano == "true" && $italiano != $lenguajes["lenguajes"]["italiano"]){
            $lenguaje = false;
        }
        if ($lenguaje == true) {
            $resultado[] = $lenguajes;
        }
    }
    return $resultado;
}

function imprimir_propiedades($item)
{
    echo '<div class="ficha">
    <img src="' . $item["imagen"] . '">
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
    <br>
    <strong> Tipo de propiedad: ' . $item["tipo_de_propiedad"] . '</strong>
    <br>
    <strong> Servicio Wifi: ' . $item["servicios"]["wifi"] . '</strong>
    <br>
    <strong> Servicio Cocina: ' . $item["servicios"]["cocina"] . '</strong>
    <br>
    <strong> Servicio Lavarropas: ' . $item["servicios"]["lavarropas"] . '</strong>
    <br>
    <strong> Servicio Secadora: ' . $item["servicios"]["secadora"] . '</strong>
    <br>
    <strong> Servicio Aire Acondicionado: ' . $item["servicios"]["aire_acondicionado"] . '</strong>
    <br>
    <strong> Servicio Calefaccion: ' . $item["servicios"]["calefaccion"] . '</strong>
    <br>
    <strong> Reserva Inmediata: ' . $item["opciones_de_reserva"]["reserva_inmediata"] . '</strong>
    <br>
    <strong> Acceso inmediato: ' . $item["opciones_de_reserva"]["acceso_inmediato"] . '</strong>
    <br>
    <strong> Entrada sin escalones: ' . $item["accesibilidad"]["entrada_sin_escalones"] . '</strong>
    <br>
    <strong> Entrada con mas de 81 entimetros: ' . $item["accesibilidad"]["entrada_mas_de_81_centimetros"] . '</strong>
    <br>
    <strong> Estacionamiento Accesible: ' . $item["accesibilidad"]["estacionamiento_accesible"] . '</strong>
    <br>
    <strong> Entrada con sendero: ' . $item["accesibilidad"]["entrada_con_sendero"] . '</strong>
    <br>
    <strong> Super Anfitrion: ' . $item["alojamiento_de_primera_clase"]["super_anfitrion"] . '</strong>
    <br>
    <strong> Airbnb Plus: ' . $item["alojamiento_de_primera_clase"]["airbnb_plus"] . '</strong>
    <br>
    <strong> Ingles: ' . $item["lenguajes"]["ingles"] . '</strong>
    <br>
    <strong> Frances: ' . $item["lenguajes"]["frances"] . '</strong>
    <br>
    <strong> Aleman: ' . $item["lenguajes"]["aleman"] . '</strong>
    <br>
    <strong> Italiano: ' . $item["lenguajes"]["italiano"] . '</strong>
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
