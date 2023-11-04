<?php

require_once("../../app/models/TaskModel.php");

if (isset($_POST["id"])) {

    $task_id = $_POST["id"];
    $task_name = $_POST["name"];
    $task_description = $_POST["description"];

    editTask($task_id, $task_name, $task_description);

    echo "The task has been updated";
}
