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

    $query = "SELECT * FROM usuarios WHERE 1";

    $result = mysqli_query($mysqli, $query);

    if (!$result) {

        throw new Exception("Error en la consulta: " . mysqli_error($mysqli));
    }

    while ($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . "<br>";
        echo "username: " . $row["username"] . "<br>";
        echo "email: " . $row["email"] . "<br>";
        echo "password: " . $row["password"] . "<br><br><br>";
    }

    mysqli_free_result($result);
} catch (Exception $e) {
    echo "Hubo un error en la consulta " . $e->getMessage();
} finally {
    if (isset($mysqli)) {
        mysqli_close($mysqli);
    }
}
