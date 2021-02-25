<?php

require_once('functions.php');
include('helpers.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

// массив проектов
$projects = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];

// массив задач
$task_list = [
    [
        'task' => 'Собеседование в IT компании',
        'date' => '01.12.2018',
        'category' => 'Работа',
        'completed' => false
    ],
    [
        'task' => 'Выполнить тестовое задание',
        'date' => '25.12.2018',
        'category' => 'Работа',
        'completed' => false
    ],
    [
        'task' => 'Сделать задание первого раздела',
        'date' => '21.12.2018',
        'category' => 'Учеба',
        'completed' => true
    ],
    [
        'task' => 'Встреча с другом',
        'date' => '22.12.2018',
        'category' => 'Входящие',
        'completed' => false
    ],
    [
        'task' => 'Купить корм для кота',
        'date' => null,
        'category' => 'Домашние дела',
        'completed' => false
    ],
    [
        'task' => 'Заказать пиццу',
        'date' => null,
        'category' => 'Домашние дела',
        'completed' => false
    ]
];
// Имя страницы
$title = 'Дела в порядке';

// Пользователь
$username = 'Константин';

//
$content = include_template('main.php',['projects' => $projects, 'task_list'=> $task_list, 'show_complete_tasks' => $show_complete_tasks]);
echo include_template('layout.php', ['title' => 'Дела в порядке', 'content' => $content]);
?>
