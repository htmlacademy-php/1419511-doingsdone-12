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
function countHoursBetweenDates($date)
{
    $ts = time(); // дата сегодняшнего дня
    $end_ts = strtotime($date); // дата события
    $date_diff = floor(($end_ts - $ts) / 3600);
    return $date_diff;
};



// функция подсчета задач
/**
 * Подсчет проектов
 * @param array $task_arr Массив задач
 * @param array $name_project Массив с проектами
 *
 * @return integer $count Возвращаем число задач
 */
function countTask($task_arr, $name_project)
{
	$count = 0;
	foreach ($task_arr as $value) {
		if ($value['category'] === $name_project) {
			$count++;
		}
	}

	return $count;
};
