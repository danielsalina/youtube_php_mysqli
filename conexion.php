<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "youtube";

// Conexión básica
$conexion = mysqli_connect($servername, $username, $password, $database);

if (!$conexion) {
    die("La conexión a la base de datos ha fallado");
}

echo "Conexión establecida!";

mysqli_close($conexion);
