<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se proporciona un archivo
    if (empty($_FILES["archivo"]["name"])) {
        echo "No se proporcionó ningún archivo.";
        exit;
    }

    $archivo_nombre = $_FILES["archivo"]["name"];
    $archivo_tmp = $_FILES["archivo"]["tmp_name"];

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

    // Crear la tabla si no existe
    $crear_tabla = "CREATE TABLE IF NOT EXISTS informacion (
                    codigo SERIAL PRIMARY KEY,
                    nombrearchivo VARCHAR(250),
                    cantlineas INTEGER,
                    cantpalabras INTEGER,
                    cantcaracteres INTEGER,
                    fecharegistro TIMESTAMP
                )";

    if (!pg_query($conexion, $crear_tabla)) {
        die("Error al crear la tabla: " . pg_last_error($conexion));
    }

    // Leer el archivo y procesar la información
    $contenido = file_get_contents($archivo_tmp);
    $cant_lineas = count(file($archivo_tmp));
    $cant_palabras = str_word_count($contenido);
    $cant_caracteres = strlen($contenido);
    $fecha_registro = date("Y-m-d H:i:s");

    // Insertar la información en la base de datos
    $insertar_registro = "INSERT INTO informacion (nombrearchivo, cantlineas, cantpalabras, cantcaracteres, fecharegistro)
                        VALUES ('$archivo_nombre', $cant_lineas, $cant_palabras, $cant_caracteres, '$fecha_registro')";

    if (!pg_query($conexion, $insertar_registro)) {
        die("Error al insertar el registro: " . pg_last_error($conexion));
    }

    echo "Información procesada y guardada en la base de datos.";

    // Cerrar la conexión a la base de datos
    pg_close($conexion);
}
?>
