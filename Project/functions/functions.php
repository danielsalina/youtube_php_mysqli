<?php

function sanitizeInput(string $input): string
{
    return htmlspecialchars(trim($input));
}

function validateName(string $name): string
{
    return preg_match("/[a-zA-Z ]{2}/", $name);
}

function validateEmail(string $email): string
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function ValidatePassword(string $password): string
{
    return strlen($password) >= 6;
}
