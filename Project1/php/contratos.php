<!DOCTYPE html>
<html>
<head>
    <title>Contratos</title>
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
        <h2>Contratos</h2>
        <form action="submit_contrato.php" method="post">
            <label for="numero_cliente">Número de cliente:</label><br>
            <input type="text" id="numero_cliente" name="numero_cliente"><br>
            <label for="numero_linea">Número de línea:</label><br>
            <input type="text" id="numero_linea" name="numero_linea"><br>
            <label for="fecha_activacion">Fecha de activación:</label><br>
            <input type="date" id="fecha_activacion" name="fecha_activacion"><br>
            <label for="valor_plan">Valor del plan:</label><br>
            <input type="text" id="valor_plan" name="valor_plan"><br>
            <label for="estado">Estado:</label><br>
            <input type="text" id="estado" name="estado"><br><br>
            <input type="submit" value="Crear Contrato">
        </form>
    </div>
</body>
</html>

