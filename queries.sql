/*Добавить пользователей*/
INSERT INTO users (name, email, password, date_reg)
VALUES ('Сергей', 'serg@mail.com', 'werty', '2021.04.03'),
       ('Михаил', 'misha@mail.com', 'Qwerty090', '2021.04.01');

/*Добавить список проектов для одного пользователя*/
INSERT INTO projects (user_id, headline_project)
VALUES  (1, 'Новые'),
        (1, 'Учёба'),
        (1, 'Работа'),
        (1, 'Домашние дела'),
        (1, 'Авто'),
        (2, 'Прочее'),
        (2, 'Здоровье'),
        (2, 'Дом');

/*Добавить задачи*/
INSERT INTO tasks (create_date, status, title, file_path, deadline_date, user_id, project_id)
VALUES ('2021.02.03', 0, 'Собеседование в IT компании','Home.psd', '2021.03.01', 1, 3),
       ('2021.01.25', 0, 'Выполнить тестовое задание','Home.psd', '2021.02.04', 1, 3),
       ('2021.04.24', 1, 'Сделать задание первого раздела','Home.psd', '2020.12.21', 1, 2),
       ('2021.03.08', 0, 'Встреча с другом','Home.psd', '2021.02.22', 2, 1),
       ('2021.04.10', 0, 'Купить корм для кота','Home.psd', '2021.01.31', 1, 8),
       ('2021.05.02', 0, 'Заказать пиццу','Home.psd', null, 2, 7);

/*Получить список всех проектов для одного пользователя*/
SELECT name FROM projects WHERE user_id = 1;
SELECT name FROM projects WHERE user_id = 2;

/*Получить список всех задач для одного проекта*/
SELECT * FROM tasks WHERE project_id = 1;
SELECT * FROM tasks WHERE project_id = 2;
SELECT * FROM tasks WHERE project_id = 3;
SELECT * FROM tasks WHERE project_id = 4;

/*Пометить задачу как выполненную*/
UPDATE tasks SET status = 1 WHERE id = 4;

/*Обновить название задачи по её идентификатору*/
UPDATE tasks SET title = 'Сделать новое задание раздела' WHERE id = 3;
