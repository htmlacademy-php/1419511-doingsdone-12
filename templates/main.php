<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>

    <nav class="main-navigation">
        <ul class="main-navigation__list">
            <?php foreach ($projects as $key => $item) : ?>
                <li class="main-navigation__list-item
                            <?= intval($item['id'])   === $project_id &&  is_int($project_id) ? 'main-navigation__list-item--active' : '' ?>
                            <?= $item['project_name'] === 'Все'       && !is_int($project_id) ? 'main-navigation__list-item--active' : '' ?>"
                >
                    <a class="main-navigation__list-item-link"
                       href="index.php<?= $item['headline_project'] === 'Все' ? '' : '?project_id='.$item['id'] ?>"
                    >
                        <?= htmlspecialchars($item['headline_project']); ?>
                    </a>
                    <span class="main-navigation__list-item-count"><?= countTask($tasks, $item['headline_project']); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button" href="pages/form-project.html" target="project_add">Добавить проект</a>
</section>
<main class="content__main">
    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.php" method="post" autocomplete="off">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <nav class="tasks-switch">
            <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
            <a href="/" class="tasks-switch__item">Повестка дня</a>
            <a href="/" class="tasks-switch__item">Завтра</a>
            <a href="/" class="tasks-switch__item">Просроченные</a>
        </nav>

        <label class="checkbox">
            <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?php if ($show_complete_tasks): ?>checked<?php endif; ?>>
            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <table class="tasks">
        <?php foreach ($tasks as $item) : ?>
            <tr class="tasks__item task
                                <?= $item['deadline_date'] ? 'task--completed' : '' ?>
                                <?= !$item['deadline_date'] && task_near_finish($item['create_date']) ? 'task--important' : '' ?>
                              ">
                <td class="task__select">
                    <label class="checkbox task__checkbox">
                        <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1"
                            <?= $item['deadline_date'] ? 'checked' : '' ?>
                        >
                        <span class="checkbox__text"><?= htmlspecialchars($item['title']); ?></span>
                    </label>
                </td>

                <td class="task__file">
                    <!-- если имя файла в таблице пустое, то ссылку не выводим -->
                    <?= $item['file_path'] ? '<a class="download-link" href="#">'.$item['file_path'].'</a>' : '' ?>
                </td>

                <td class="task__date"><?= (htmlspecialchars($item['create_date']) != null) ? htmlspecialchars($item['create_date']) : 'Нет'; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
