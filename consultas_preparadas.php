<?php

require_once("config.php");

/* $query = "SELECT id, username, email, password FROM usuarios WHERE password = ?";

$password = "123456";

if ($stmt = mysqli_prepare($mysqli, $query)) {

    mysqli_stmt_bind_param($stmt, "s", $password);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id, $username, $email, $password);

    while (mysqli_stmt_fetch($stmt)) {

        echo "Id: " . $id . "<br>";
        echo "Username: " . $username . "<br>";
        echo "Emial: " . $email . "<br>";
        echo "Password: " . $password . "<br><br><br>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error en la preparación de la consulta: " . mysqli_error($mysqli);
}

mysqli_close($mysqli); */

$username = "Red Hot Chili Peppers";
$email = "rhcp@gmail.com";
$password = "sdv651s61v6s51";

$query = "INSERT INTO usuarios (username, email, password) VALUES (?,?,?)";

$stmt = mysqli_prepare($mysqli, $query);

mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);

if (mysqli_stmt_execute($stmt)) {
    echo "Inserción exitosa";
} else {
    echo "Inserción NO exitosa";
}

mysqli_stmt_close($stmt);

mysqli_close($mysqli);
