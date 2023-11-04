<?php

require_once("../../config/db.php");

function userRegister(string $user, string $email, string $password): bool
{

    // Check if the user already exists
    $query = "SELECT email FROM users WHERE email = ?";
    $stmt = mysqli_prepare(MYSQLI, $query);

    if (!$stmt) {
        die("Query preparation error: " . mysqli_error(MYSQLI));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $found_email);
    mysqli_stmt_fetch($stmt);

    if (!empty($found_email)) {
        return false; // The email already exists
    }

    mysqli_stmt_close($stmt);

    // Insert new user
    $query = "INSERT INTO users (name, email, password) VALUES (?,?,?)";
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare(MYSQLI, $query);

    if (!$stmt) {
        die("Query preparation error: " . mysqli_error(MYSQLI));
    }

    mysqli_stmt_bind_param($stmt, "sss", $user, $email, $hashed_password);

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_close($stmt);
        mysqli_close(MYSQLI);
        return true;
    } else {
        die("Error when registering the user");
    }
}

function login(string $email, string $password): bool
{
    // Check if the user already exists
    $query = "SELECT email, password FROM users WHERE email = ?";
    $stmt = mysqli_prepare(MYSQLI, $query);

    if (!$stmt) {
        die("Query preparation error: " . mysqli_error(MYSQLI));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $found_email, $found_password);
    mysqli_stmt_fetch($stmt);

    if (empty($found_email) || empty($found_password)) {
        mysqli_stmt_close($stmt);
        mysqli_close(MYSQLI);
        return false; // Invalid data
    }

    // Verify password
    if (password_verify($password, $found_password)) {
        mysqli_stmt_close($stmt);
        mysqli_close(MYSQLI);
        $_SESSION["user"] = $email;
        return true;
    }

    mysqli_stmt_close($stmt);
    mysqli_close(MYSQLI);
    return false; // Contraseña incorrecta
}
