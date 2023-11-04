<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    session_start();

    require_once("../../functions/functions.php");
    require_once("../../app/models/UserModel.php");

    $csrf_token = $_POST['csrf_token'];

    $email = mysqli_real_escape_string(MYSQLI, sanitizeInput($_POST["email"]));
    $password = mysqli_real_escape_string(MYSQLI, sanitizeInput($_POST["password"]));

    // Verificar el token CSRF
    if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
        die("Invalid CSRF token");
    }

    if (validateEmail($email) and validatePassword($password)) {

        if (login($email, $password) === false) {
            header("Location: ../../index.php?page=login");
            exit;
        }

        header("Location: DashboardController.php");
        exit;
    } else {

        // Generar un nuevo token CSRF para el formulario
        $csrf_token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $csrf_token;
        header("Location: ../views/invalidLogin.php");
        exit;
    }
} else {

    // Generar un nuevo token CSRF para el formulario
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;
    require_once("app/views/login.php");
}
