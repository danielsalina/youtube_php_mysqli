<?php

require_once("../../app/models/TaskModel.php");

if (isset($_POST["id"])) {

    $id = $_POST["id"];
    $row = getATask($id);
    $json[] = array(
        "id" => $row["id"],
        "name" => $row["name"],
        "description" => $row["description"]
    );
    $json_string = json_encode($json[0]);

    echo $json_string;
}
