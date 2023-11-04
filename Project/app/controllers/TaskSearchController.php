<?php

require_once("../../app/models/TaskModel.php");

$search = $_POST["search"];

if (!empty($search)) {

    $rows = taskSearch($search);
    $json = array();

    foreach ($rows as $row) {
        $json[] = array(
            "id" => $row["id"],
            "name" => $row["name"],
            "description" => $row["description"]
        );
    }

    $jsons_tring = json_encode($json);

    echo $jsons_tring;
}
