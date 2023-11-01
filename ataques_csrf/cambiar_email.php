<?php

session_start();

// Función para generar un token CSRF
function generarTokenCSRF()
{
    return bin2hex(random_bytes(32));
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $csrf_token = $_POST['csrf_token'];

    // Comprobar si se ha enviado el formulario
    if (isset($_POST['cambiar_email'])) {

        // Verificar el token CSRF
        if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
            die("Token CSRF no válido");
        }

        require_once("../config.php");

        $nuevo_email = htmlspecialchars($_POST['nuevo_email']);
        $query = "UPDATE usuarios SET email = '$nuevo_email' WHERE id = 10";

        if (mysqli_query($mysqli, $query)) {

            echo "Dirección de correo electrónico cambiada con éxito a " . $nuevo_email;
            unset($_SESSION['csrf_token']);
        } else {
            echo "Error en la operación: " . mysqli_error($mysqli);
        }

        mysqli_close($mysqli);
    }
}

// Generar un nuevo token CSRF para el formulario de inicio de sesión
$csrf_token = generarTokenCSRF();
$_SESSION['csrf_token'] = $csrf_token;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Cambiar Dirección de Correo Electrónico</title>
</head>

<body>
    <h1>Cambiar Dirección de Correo Electrónico</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="email" name="nuevo_email" placeholder="Nuevo Correo Electrónico" required><br>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="submit" name="cambiar_email" value="Cambiar">
    </form>
</body>

</html>