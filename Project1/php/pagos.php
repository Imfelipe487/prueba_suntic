<!DOCTYPE html>
<html>
<head>
    <title>Pagos</title>
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
        <h2>Pagos</h2>
        <form action="submit_pago.php" method="post">
            <label for="codigo_contrato">Código de contrato:</label><br>
            <input type="text" id="codigo_contrato" name="codigo_contrato"><br>
            <label for="valor_pagado">Valor pagado:</label><br>
            <input type="text" id="valor_pagado" name="valor_pagado"><br><br>
            <input type="submit" value="Realizar Pago">
        </form>
    </div>
</body>
</html>
