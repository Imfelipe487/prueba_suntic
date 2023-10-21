<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí se debe procesar y almacenar la información del contrato en la base de datos.
    // Puedes utilizar la función insertarContrato() definida en el archivo 'funciones.php'.
    $numero_cliente = $_POST['numero_cliente'];
    $numero_linea = $_POST['numero_linea'];
    $fecha_activacion = $_POST['fecha_activacion'];
    $valor_plan = $_POST['valor_plan'];
    $estado = $_POST['estado'];
    // insertarContrato($numero_cliente, $numero_linea, $fecha_activacion, $valor_plan, $estado);
}
?>
