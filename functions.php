<?php
//функция подсчета времени
date_default_timezone_set('Europe/Moscow');
setlocale(LC_ALL, 'ru_RU');

/**
 * Считаем время до завершения
 * @param string $date Строка с датой
 *
 * @return float $date_diff Возвращаем дни
 */
function countHoursBetweenDates($date){
    $ts = time(); // дата сегодняшнего дня
    $end_ts = date("Y-m-d", strtotime($date));// дата события
    $date_diff = floor(($end_ts - $ts) / 3600);
    return $date_diff;
};

function eventDateDisplay($date){
    $end_ts = date("Y-m-d", strtotime($date));// дата события
    if ($end_ts == "1970-01-01") {
        $end_ts = "No date...";
    }
    return $end_ts;
};

// функция подсчета задач
/**
 * Подсчёт количества задач в каждом из проектов
 * @param array $tasks список задач
 * @param int $project_id id проекта
 * @return int $count число задач для переданного проекта
 */
function countTask(array $tasks, int $project_id) : int {
    $count = 0;
    foreach ( $tasks as $task ) {
        if (strval( $task['project_id'] === $project_id)) {
            ++$count;
        }
    }
    return $count;
}

// возвращает результат запроса с базы
/**
 * возвращает результат запроса в виде ассоциативного массива
 * @param mysqli $dbconnect параметры соединения
 * @param string $sql_query sql-запрос
 */
function get_fetch_all($dbconnect, string $sql_query) {
    $result = mysqli_query($dbconnect, $sql_query);

    if(!$result) {
        $error = mysqli_error($dbconnect);
        die('Ошибка MySQL: ' . $error);
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
