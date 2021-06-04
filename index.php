<?php

require_once('functions.php');
include('helpers.php');
$user = 4;

$dbconnect = mysqli_connect("127.0.0.1:3306", "root", "root", "doingsdone");
if ($dbconnect == false){
    print('Ошибка подключения: ' . mysqli_connect_error());
}

$sql = "SELECT id, headline_project, projects.user_id FROM projects";
$result = mysqli_query($dbconnect, $sql);

if($result){
    $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$sql = "SELECT title, user_id, project_id, deadline_date FROM tasks WHERE tasks.user_id = " . $user;
$result = mysqli_query($dbconnect, $sql);
if($result){
    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$sort = filter_input(INPUT_GET, 'sort');
if($sort){
    $sql = "SELECT title, project_id, deadline_date, tasks.user_id, projects.id FROM tasks
    JOIN projects WHERE tasks.user_id =" . $user ." && projects.id =" . $sort . " && project_id=" . $sort;
    $result = mysqli_query($dbconnect, $sql);

    $tasks_sort = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if(!$tasks_sort){
        http_response_code(404);
    }

}
else {
    $tasks_sort = $tasks;
}

$page_content = include_template('main.php', ['projects' => $projects, 'tasks' => $tasks, 'tasks_sort' => $tasks_sort, 'sort' => $sort, 'show_complete_tasks' => $show_complete_tasks]);
$layout_content = include_template('layout.php', ['content' => $page_content, 'title' => 'Дела в порядке']);

print($layout_content);

?>
