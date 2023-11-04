<?php

require_once("../../app/models/TaskModel.php");

if (isset($_POST["name"])) {
    $task_name = $_POST["name"];
    $task_description = $_POST["description"];

    insertTask($task_name, $task_description);

    echo "Added task!";
}
