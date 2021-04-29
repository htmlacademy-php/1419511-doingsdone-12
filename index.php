<?php

require_once('functions.php');
include('helpers.php');
include('dbconnect.php');

// Имя страницы
$title = 'Дела в порядке';

$user_id = '1';

//получить список проектов и задач
$projects = get_fetch_all($dbconnect, "SELECT * FROM projects where user_id = '$user_id'");
$tasks = get_fetch_all($dbconnect, "SELECT * FROM tasks where user_id = '$user_id'");

//
$content = include_template('main.php',['projects' => $projects, 'tasks'=> $tasks, 'show_complete_tasks' => $show_complete_tasks]);
echo include_template('layout.php', ['title' => 'Дела в порядке', 'content' => $content]);
