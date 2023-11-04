<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    session_start();

    require_once("../../functions/functions.php");
    require_once("../../app/models/UserModel.php");

    $csrf_token = $_POST['csrf_token'];

    $name = mysqli_real_escape_string(MYSQLI, sanitizeInput($_POST["name"]));
    $email = mysqli_real_escape_string(MYSQLI, sanitizeInput($_POST["email"]));
    $password = mysqli_real_escape_string(MYSQLI, sanitizeInput($_POST["password"]));
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Verificar el token CSRF
    if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
        die("Invalid CSRF token");
    }

    if (validateName($name) and validateEmail($email) and validatePassword($password)) {

        if (userRegister($name, $email, $password) === false) {
            header("Location: ../views/userExist.php");
            exit;
        }

        header("Location: ../../index.php?page=login");
        exit;
    } else {

        // Generar un nuevo token CSRF para el formulario
        $csrf_token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $csrf_token;
        header("Location: ../views/invalidRegister.php");
        exit;
    }
} else {

    // Generar un nuevo token CSRF para el formulario
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;

    require_once("app/views/register.php");
}
