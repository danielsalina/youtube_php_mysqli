<?php

session_start();

function generarToken()
{
    return bin2hex(random_bytes(32));
}

if (isset($_POST["transferir_fondos"])) {

    $csrf_token = $_POST["csrf_token"];

    if (!hash_equals($_SESSION["csrf_token"], $csrf_token)) {
        die("Token CSRF no válido");
    }

    $destinatario = htmlspecialchars($_POST["destinatario"]);
    $monto = htmlspecialchars($_POST["monto"]);

    echo "Transferencia de $ $monto a $destinatario realizada con éxito.";
    unset($_SESSION["csrf_token"]);
}

$csrf_token = generarToken();
$_SESSION["csrf_token"] = $csrf_token;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Transferencias de fondo</h1>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="destinatario" placeholder="Destinatario" required>
        <input type="text" name="monto" placeholder="Monto" required>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="submit" name="transferir_fondos" value="Transferir Fondos">
    </form>
</body>

</html>