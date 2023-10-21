<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí se debe procesar y almacenar la información del pago en la base de datos.
    // Puedes utilizar la función insertarTransaccion() definida en el archivo 'funciones.php'.
    $codigo_contrato = $_POST['codigo_contrato'];
    $valor_pagado = $_POST['valor_pagado'];
    $fecha_hora_pago = date("Y-m-d H:i:s");
    // insertarTransaccion($codigo_contrato, $valor_pagado, $fecha_hora_pago);
}
?>
