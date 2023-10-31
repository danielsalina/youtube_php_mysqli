<?php

session_start();

if (isset($_SESSION["username"])) {


    $mensaje_bienvenida = "¡Bienvenido, " . $_SESSION["username"] . "!";

    echo $mensaje_bienvenida;
}
