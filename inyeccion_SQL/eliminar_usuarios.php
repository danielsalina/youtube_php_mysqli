<?php

if (isset($_POST["enviar"]) and $_SERVER["REQUEST_METHOD"] == "POST") {

    require_once("../config.php");

    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);

    $query = "DELETE FROM usuarios WHERE email = '$email'";

    echo "Esta es la consulta que estamos haciendo: $query <br><br>";

    $result = mysqli_query($mysqli, $query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>

<body>
    <h2>Delete User</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="email">Email:</label>
        <input type="text" name="email"><br><br>
        <input type="submit" name="enviar" value="Eliminar">
    </form>
</body>

</html>