<?php

require_once("../../config/db.php");

function insertTask(string $task_name, string $task_description): bool
{
    $query = "INSERT into tasks (name, description) VALUES ('$task_name', '$task_description')";
    $result = mysqli_query(MYSQLI, $query);

    return $result;
}

function deleteTask(string $id): bool
{
    $query = "DELETE FROM tasks WHERE id = $id";
    $result = mysqli_query(MYSQLI, $query);

    return $result;
}

function editTask(string $task_id, string $task_name, string $task_description): bool
{
    $query = "UPDATE tasks SET name = '$task_name', description = '$task_description' WHERE id = '$task_id'";
    $result = mysqli_query(MYSQLI, $query);

    return $result;
}

function getATask(string $id): array
{
    $query = "SELECT * FROM tasks WHERE id = {$id} ";
    $result = mysqli_query(MYSQLI, $query);

    $row = mysqli_fetch_assoc($result);

    return $row;
}

function tasksList(): array
{
    $query = "SELECT * FROM tasks";
    $result = mysqli_query(MYSQLI, $query);
    $rows = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function taskSearch(string $search): array
{
    $query = "SELECT * FROM tasks WHERE name LIKE '$search%'";
    $result = mysqli_query(MYSQLI, $query);
    $rows = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
