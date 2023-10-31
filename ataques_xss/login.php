<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    session_start();

    function usuario_autenticado()
    {
        // Aquí deberiamos de implementar la lógica de autenticación
        // Esta función podría verificar credenciales, consultar una base de datos, etc.
        // Devuelve true si el usuario está autenticado, de lo contrario, false.
        // Por simplicidad, en este ejemplo, siempre devuelve true.
        return true;
    }

    if (usuario_autenticado()) {

        // El valor del nombre de usuario debe escaparse antes de almacenarlo en la sesión
        $nombre_usuario = htmlspecialchars($_POST["nombre_usuario"], ENT_QUOTES, "UTF-8");

        $_SESSION["username"] = $nombre_usuario;

        header("Location: bienvenido.php"); // Redirige a la página de bienvenida
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Login</h1>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="nombre_usuario">Nombre de Usuario:</label><br>
        <input type="text" name="nombre_usuario"><br>
        <input type="submit" name="enviar" value="Iniciar Sesión">
    </form>

</body>

</html>