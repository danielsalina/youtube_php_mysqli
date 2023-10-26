<?php

require_once("config.php");

// Insertar un nuevo usuario
/* $query = "INSERT INTO usuarios(username, email, password) VALUES ('Donald','donald@gmail.com','123456')";

if (mysqli_query($mysqli, $query)) {
    echo "Inserción exitosa";
} else {
    echo "Error en la operación: " . mysqli_error($mysqli);
}

mysqli_close($mysqli); */


// Actualizar un usuario
/* $query = "UPDATE usuarios SET username = 'Buzz', email = 'buzz@gmail.com', password = '123456' WHERE id = '5'";

if (mysqli_query($mysqli, $query)) {

    echo "Actualización exitosa";
} else {
    echo "Error en la operación: " . mysqli_error($mysqli);
}

mysqli_close($mysqli); */


// Eliminar un usuario
$query = "DELETE FROM usuarios WHERE id = '2'";

if (mysqli_query($mysqli, $query)) {

    if (mysqli_affected_rows($mysqli) > 0) {
        echo "Eliminación exitosa";
    } else {
        echo "No hay registros que eliminar";
    }
} else {
    echo "Error en la operación: " . mysqli_error($mysqli);
}

mysqli_close($mysqli);
