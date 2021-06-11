<?php
//функция подсчета времени
date_default_timezone_set('Europe/Moscow');
setlocale(LC_ALL, 'ru_RU');

// функция подсчета задач
/**
 * Подсчёт количества задач в каждом из проектов
 * @param array $tasks список задач
 * @param int $project_id id проекта
 * @return int $count число задач для переданного проекта
 */

function countTask($task_array, $headline_project) {
    if ($headline_project=== 'Все') {
        return count($task_array);
    } else {
        $count = 0;
        foreach ($task_array as $item) {
            if ($item['headline_project'] === $headline_project) {
                $count += 1;
            }
        }
        return $count;
    }
}


// функция для определения задач, у которых <24 часа до завершения
function task_near_finish($task_completion_date) {
    if ($task_completion_date != null) {
        $hours_to_finish = floor((strtotime($task_completion_date.' 00:00') - time())/3600);
        if ($hours_to_finish < 24) {
            return true;
        }
    }
    return false;
}
