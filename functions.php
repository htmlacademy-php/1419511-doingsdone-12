<?php
// функция подсчета задач
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
