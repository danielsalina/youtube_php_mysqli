<?php

if (isset($_POST["enviar"]) and $_SERVER["REQUEST_METHOD"] === "POST") {

    require_once("../config.php");

    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $password = mysqli_real_escape_string($mysqli, $_POST["password"]);

    $query = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";

    echo "Esta es nuestra consulta: $query <br><br><br>";

    $result = mysqli_query($mysqli, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . "<br>";
        echo "username: " . $row["username"] . "<br>";
        echo "email: " . $row["email"] . "<br>";
        echo "password: " . $row["password"] . "<br><br><br>";
    }

    mysqli_free_result($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <h1>Login</h1>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="email">Email:</label>
        <input type="text" name="email"><br><br>
        <label for="password">Contraseña:</label>
        <input type="text" name="password"><br><br>
        <input type="submit" name="enviar" value="Iniciar Sesión">
    </form>

</body>

</html>