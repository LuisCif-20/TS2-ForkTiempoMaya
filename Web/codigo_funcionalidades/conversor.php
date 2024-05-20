<?php

define("CONST_CORRELATIVA", gregoriantojd(8, 11, -3114)); // Definimos la fecha inicial en calendario juliano - Constante correlativa
function convertir_CL_a_CG($baktun, $katun, $tun, $uinal, $kin)
{
    $diasCuentaLarga = ($baktun * 144000) + ($katun * 7200) + ($tun * 360) + ($uinal * 20) + $kin; // Obtenemos los dias totales de la cuenta larga
    $diasTotales = $diasCuentaLarga + CONST_CORRELATIVA; // Obtenemos el total de dias trasncurridos
    $fechaGregoriana = jdtogregorian($diasTotales); // Obtenemos ahora la fecha gregoriana en base a los dias totales
    $resultado = new DateTime($fechaGregoriana); // Convertimos a un objeto fecha manipulable
    return $resultado->format('Y-m-d'); // Retornamos la fecha en calendario gregoriano
}

function convertir_CG_a_CL($fecha)
{
    // Convertir la fecha proporcionada al calendario juliano
    list($anio, $mes, $dia) = explode('-', $fecha);
    $diasJulianos = gregoriantojd((int) $mes, (int) $dia, (int) $anio);
    $diasTotales = $diasJulianos - CONST_CORRELATIVA; // Obtenemos ahora el total de dias transcurridos
    $cuentaLarga = convertirACuentaLarga($diasTotales); //Obtenemos el dato en cuenta larga
    return $cuentaLarga; // Retornamos el resultado

}

function convertirACuentaLarga($diasJulianos)
{
    $baktun = floor($diasJulianos / 144000); // Obtenemos el Baktun
    $diasRestantes = $diasJulianos % 144000; // Obtenemos los dias que sobran
    $katun = floor($diasRestantes / 7200); // Obtenemos el Katun
    $diasRestantes %= 7200; // Obtenemos los dias que sobran
    $tun = floor($diasRestantes / 360); // Obtenemos el Tun
    $diasRestantes %= 360; // Obtenemos los dias que sobran
    $uinal = floor($diasRestantes / 20); // Obtenemos el Uinal
    $kin = $diasRestantes % 20; // Obtenemos el Kin
    // Retornamos los valores de cuenta larga
    return [
        "baktun" => $baktun,
        "katun" => $katun,
        "tun" => $tun,
        "uinal" => $uinal,
        "kin" => $kin
    ];
}

?>