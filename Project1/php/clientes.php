<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="clientes.php">Clientes</a></li>
            <li><a href="contratos.php">Contratos</a></li>
            <li><a href="pagos.php">Pagos</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>Clientes</h2>
        <table>
            <tr>
                <th>Número de cliente</th>
                <th>Tipo de identificación</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
                <th>Correo</th>
            </tr>
            <?php
            // Aquí se debe obtener y mostrar dinámicamente la lista de clientes desde la base de datos.
            // Puedes utilizar la función obtenerClientes() definida en el archivo 'funciones.php'.
            foreach ($clientes as $cliente) {
                echo "<tr>";
                echo "<td>".$cliente['numero_cliente']."</td>";
                echo "<td>".$cliente['tipo_identificacion']."</td>";
                echo "<td>".$cliente['nombre']."</td>";
                echo "<td>".$cliente['telefono']."</td>";
                echo "<td>".$cliente['ciudad']."</td>";
                echo "<td>".$cliente['correo']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
