<?php
// Esta función simula la obtención de clientes desde la base de datos.
function obtenerClientes() {
    return [
        ["numero_cliente" => 1, "tipo_identificacion" => "Cédula", "nombre" => "Carlos Zapata", "telefono" => "315 6785678", "ciudad" => "Cali", "correo" => "cahuza@hotmail.com"],
        ["numero_cliente" => 2, "tipo_identificacion" => "Cédula", "nombre" => "Luis Fernando Martinez", "telefono" => "320 4512231", "ciudad" => "Palmira", "correo" => "fercho03@gmail.com"],
        ["numero_cliente" => 3, "tipo_identificacion" => "NIT", "nombre" => "Cacharrería la Económica", "telefono" => "602 456 7823", "ciudad" => "Bogotá", "correo" => "clientes@laeconomica.com"]
    ];
}
?>
