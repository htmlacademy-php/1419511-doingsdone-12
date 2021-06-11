<?php

require_once('functions.php');
include('helpers.php');

// выбор пользователя
$user_id = 1;

// подключение к БД
$dbconnect = mysqli_connect("127.0.0.1:3306", "root", "root", "doingsdone");
if ($dbconnect == false){
    print('Ошибка подключения: ' . mysqli_connect_error());
}

// проверка на существование параметра запроса с идентификатором проекта
// если параметр присутствует, то показываем только те задачи, что относятся к этому проекту
$project_id = isset($_GET['project_id']);

// если подключение успешно делаем выборки, нет - выводим ошибку
if ($dbconnect === false) {
    http_response_code(503);
    print(render_template('templates/error.php'));
    exit();
} else {
// указание, какую кодировку использовать
mysqli_set_charset($dbconnect, "utf8");

// выборка списка(массива) всех проектов текущего пользователя
$sql = "SELECT id, headline_project FROM projects WHERE user_id = " . $user_id;
$result = mysqli_query($dbconnect, $sql);
if (!$result) {
    http_response_code(503);
    print(render_template('templates/error.php'));
    exit();
}
$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

// выборка списка(массива) задач текущего пользователя с условиями (для выбранного проекта)
// если проект не указан, то выводим все задачи пользователя
// если указан, то выводим задачи только для выбранного проекта
$sql =  "SELECT t.title, t.file_path, date_format(t.create_date, '%d.%m.%Y') AS create_date, p.id, p.headline_project, t.deadline_date"
    ."  FROM tasks t JOIN projects p ON t.project_id = p.id where t.user_id = " . $user_id
    . (is_int($project_id) ? " and project_id = " . $project_id : "");
$result = mysqli_query($dbconnect, $sql);
if (!$result) {
    http_response_code(503);
    print(render_template('templates/error.php'));
    exit();
}
$tasks_cond = mysqli_fetch_all($result, MYSQLI_ASSOC);

// выборка списка(массива) всех задач текущего пользователя
    $sql =  "SELECT t.title, t.file_path, date_format(t.create_date, '%d.%m.%Y') AS create_date, p.id, p.headline_project, t.deadline_date"
        ."  FROM tasks t JOIN projects p ON t.project_id = p.id where t.user_id = " . $user_id;
    $result = mysqli_query($dbconnect, $sql);
    if (!$result) {
        http_response_code(503);
        print(render_template('templates/error.php'));
        exit();
    }
    $tasks_all = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


$page_content = include_template('main.php', ['projects' => $projects, 'tasks' => $tasks_cond]);
$layout_content = include_template('layout.php', ['content' => $page_content, 'title' => 'Дела в порядке','projects' => $projects, 'tasks' => $tasks_all]);

print($layout_content);

?>
