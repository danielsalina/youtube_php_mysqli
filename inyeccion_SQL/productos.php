<?php

if (isset($_POST["enviar"]) and $_SERVER["REQUEST_METHOD"] == "POST") {

    require_once("../config.php");

    $nombre = mysqli_real_escape_string($mysqli, $_POST["nombre"]);

    $query = "SELECT * FROM productos WHERE nombre = '$nombre'";

    echo "Esta es la consulta que estamos haciendo: $query <br><br>";

    $result = mysqli_query($mysqli, $query);


    while ($row = mysqli_fetch_array($result)) {
        echo "id: " . $row["id"] . "<br>";
        echo "nombre: " . $row["nombre"] . "<br>";
        echo "categoría: " . $row["categoria"] . "<br>";
        echo "stock: " . $row["stock"] . "<br><br><br>";
    }

    mysqli_free_result($result);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
    <h2>Productos</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="nombre">Nombre del producto</label>
        <input type="text" name="nombre"><br><br>
        <input type="submit" name="enviar" value="Buscar">
    </form>
</body>

</html>