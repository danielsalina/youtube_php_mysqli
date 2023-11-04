<?php

require_once("../../app/models/TaskModel.php");

$rows = tasksList();
$json = array();

foreach ($rows as $row) {
    $json[] = array(
        "id" => $row["id"],
        "name" => $row["name"],
        "description" => $row["description"]
    );
}

$json_string = json_encode($json);

echo $json_string;
