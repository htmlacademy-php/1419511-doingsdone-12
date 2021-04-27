<?php
$dbconnect = mysqli_connect("127.0.0.1:3306", "root", "root", "doingsdone");
if ($dbconnect == false){
    print('Ошибка подключения: ' . mysqli_connect_error());
}

$sql = "SELECT headline_project, projects.user_id FROM projects";
$result = mysqli_query($dbconnect, $sql);

if($result){
    $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$sql = "SELECT title, user_id, project_id, deadline_date FROM tasks WHERE tasks.user_id = 4";
$result = mysqli_query($dbconnect, $sql);
if($result){
    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
