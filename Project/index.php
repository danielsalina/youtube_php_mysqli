<?php

session_start();

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "/";
}

switch ($page) {
    case 'register':
        require_once "app/controllers/RegisterController.php";
        break;
    case 'login':
        require_once "app/controllers/LoginController.php";
        break;

    default:
        require_once "app/controllers/LoginController.php";
        break;
}
