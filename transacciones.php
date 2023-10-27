<?php

require_once("config.php");

// Iniciamos la transacción
mysqli_autocommit($mysqli, false); // Deshabilitamos la confirmación automática

$query1 = "INSERT INTO usuarios (username, email, password) VALUES ('fulano', 'fulano@gmail.com', '123456')";
$query2 = "UPDATE usuarios SET password = 'csdkmcds6556cds' WHERE id = '8'";
$query3 = "UPDATE usuarios SET username = 'Mickey', email = 'mickey@gmail.com' WHERE id = '3'";

// Realizamos la primera consulta
$result1 = mysqli_query($mysqli, $query1);

if ($result1) {

    echo "Transacción 1 completada";

    // Realizamos la segunda consulta
    $result2 = mysqli_query($mysqli, $query2);

    if ($result2) {

        echo "Transacción 2 completada";

        // Realizamos la tercera consulta
        $result3 = mysqli_query($mysqli, $query3);

        if ($result3) {

            mysqli_commit($mysqli);

            echo "Transacción 3 completada";
        } else {
            // Deshacemos la transacción en caso de error
            mysqli_rollback($mysqli);
            echo "Error en la tercera consulta. La transacción ha sido deshecha.";
        }
    } else {
        // Deshacemos la transacción en caso de error
        mysqli_rollback($mysqli);
        echo "Error en la segunda consulta. La transacción ha sido deshecha.";
    }
} else {
    // Deshacemos la transacción en caso de error
    mysqli_rollback($mysqli);
    echo "Error en la primera consulta. La transacción ha sido deshecha.";
}

// Habilitamos la confirmación automática nuevamente
mysqli_autocommit($mysqli, true);

// Cerramos la conexión
mysqli_close($mysqli);
