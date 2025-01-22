<?php
// Generar un número de factura en formato: año mes 0 día R
function generarNumeroFacturaInterno()
{
    $fechaActual = new DateTime(); // Obtener la fecha actual
    $anio = $fechaActual->format('Y'); // Año en formato YYYY
    $mes = $fechaActual->format('m'); // Mes en formato MM
    $dia = $fechaActual->format('d'); // Día en formato DD

    // Generar el número de factura
    $numeroFactura = "$anio$mes" . "0" . "$dia" . "R";

    return $numeroFactura;
}

// Ejemplo de uso
echo "Número de factura generado: " . generarNumeroFacturaInterno();



// Generar un número de factura secuencial de diez dígitos según el año actual
function generarNumeroFacturaSecuencial($secuenciaInicial = 1)
{
    $anio = date('Y'); // Obtener el año actual

    // Leer el último número de secuencia almacenado (simulación)
    // En una aplicación real, este valor debería provenir de una base de datos o archivo
    static $ultimaSecuencia = null;
    if ($ultimaSecuencia === null) {
        $ultimaSecuencia = $secuenciaInicial - 1; // Inicializar la secuencia si no existe
    }

    // Incrementar la secuencia
    $ultimaSecuencia++;

    // Formatear el número de factura con una barra entre el año y el secuencial
    $numeroFactura = sprintf('%4d/%04d', $anio, $ultimaSecuencia);

    return $numeroFactura;
}

// Ejemplo de uso
for ($i = 0; $i < 5; $i++) {
    echo "Número de factura generado: " . generarNumeroFacturaSecuencial() . "\n";
}






