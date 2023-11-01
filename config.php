<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "youtube";

try {
    $mysqli = mysqli_init();

    if (!$mysqli) {
        throw new Exception("Error al iniciar la conexión a la base de datos " . mysqli_connect_errno());
    }

    if (!mysqli_real_connect($mysqli, $host, $username, $password, $database)) {
        throw new Exception("Error al conectarse a la base de datos " . mysqli_connect_error());
    }
} catch (Exception $e) {
    echo "Hubo un error en la consulta " . $e->getMessage();
}
