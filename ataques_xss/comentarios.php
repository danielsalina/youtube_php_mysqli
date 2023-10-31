<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $comentario = htmlspecialchars($_POST["comentario"]);

    echo $comentario;
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

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="comentario">Escribe un comentario:</label><br>
        <textarea name="comentario" rows="5" cols="40"></textarea><br>
        <input type="submit" value="Enviar">
    </form>

</body>

</html>