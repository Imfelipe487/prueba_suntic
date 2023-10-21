<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Información</title>
</head>
<body>

<div class="container mt-5">
    <h1>Información</h1>

    <?php
    // Conectar a la base de datos PostgreSQL
    $host = 'localhost';
    $port = '5432';  // Por defecto, es 5432 para PostgreSQL
    $database = 'datosdb';
    $user = 'postgres';
    $password = 'datosdbphp';

    $conexion = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

    if (!$conexion) {
        die("Error de conexión a la base de datos: " . pg_last_error());
    }

    // Consultar todos los registros
    $consulta = "SELECT * FROM informacion";
    $resultado = pg_query($conexion, $consulta);

    if (!$resultado) {
        die("Error al obtener registros: " . pg_last_error($conexion));
    }
    ?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre de Archivo</th>
            <th scope="col">Cantidad de Líneas</th>
            <th scope="col">Cantidad de Palabras</th>
            <th scope="col">Cantidad de Caracteres</th>
            <th scope="col">Fecha de Registro</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Mostrar los registros en la tabla
        while ($fila = pg_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<th scope='row'>{$fila['codigo']}</th>";
            echo "<td>{$fila['nombrearchivo']}</td>";
            echo "<td>{$fila['cantlineas']}</td>";
            echo "<td>{$fila['cantpalabras']}</td>";
            echo "<td>{$fila['cantcaracteres']}</td>";
            echo "<td>{$fila['fecharegistro']}</td>";
            echo "</tr>";
        }

        // Liberar el resultado
        pg_free_result($resultado);

        // Cerrar la conexión a la base de datos
        pg_close($conexion);
        ?>
        </tbody>
    </table>

    <!-- Formulario para subir archivos -->
    <form action="programa.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="archivo">Seleccionar archivo:</label>
            <input type="file" class="form-control-file" id="archivo" name="archivo" accept=".txt">
        </div>
        <button type="submit" class="btn btn-primary">Procesar Archivo</button>
    </form>

    <a class="btn btn-primary" href="generar_pdf.php" target="_blank">Descargar PDF</a>
</div>

</body>
</html>
