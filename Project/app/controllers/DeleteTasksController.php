<?php

require_once("../../app/models/TaskModel.php");

if (isset($_POST["id"])) {

    $id = $_POST["id"];

    deleteTask($id);

    echo "The task has been deleted!";
}
