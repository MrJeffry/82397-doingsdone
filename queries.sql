// Получим список всех пользователей
SELECT user_name FROM users

// Добавить пользователя Артем
INSERT INTO users
SET user_name = 'Артем', password = '123', user_email = 'aaltigin@gmail.com';

// Добавить пользователя Игорь
INSERT INTO users
SET user_name = 'Игорь', password = '123', user_email = 'igor@gmail.com';

// Добавим проекты
    -- $categories= ['Все', 'Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
INSERT INTO projects
set project_name = 'Все', user_id = 1

INSERT INTO projects
set project_name = 'Входящие', user_id = 1

INSERT INTO projects
set project_name = 'Учеба', user_id = 1

INSERT INTO projects
set project_name = 'Работа', user_id = 2

INSERT INTO projects
set project_name = 'Домашние дела', user_id = 2

INSERT INTO projects
set project_name = 'Авто', user_id = 2


//Заполняем задачи
INSERT INTO tasks
set task_name = 'Задача для решиния времени', start_date = '2018.05.10',
finish_date = '2018.05.16', deadline_date = '2018.05.15', user_id = 1,
project_id = 7

INSERT INTO tasks
set task_name = 'Собеседование в IT компании', start_date = '2018.05.10',
finish_date = '2018.05.18', deadline_date = '2018.05.17', user_id = 1,
project_id = 5

INSERT INTO tasks
set task_name = 'Выполнить тестовое задание', start_date = '2018.05.10',
finish_date = '2018.05.20', deadline_date = '2018.05.19', user_id = 1,
project_id = 5

INSERT INTO tasks
set task_name = 'Сделать задание первого раздела', start_date = '2018.05.10',
finish_date = '2018.05.21', deadline_date = '2018.05.20', user_id = 1,
project_id = 4

INSERT INTO tasks
set task_name = 'Встреча с другом', start_date = '2018.05.10',
finish_date = '2018.05.20', deadline_date = '2018.05.21', user_id = 2,
project_id = 3

INSERT INTO tasks
set task_name = 'Купить корм для кота', start_date = '2018.05.10',
finish_date = '2018.05.13', deadline_date = '2018.05.12', user_id = 1,
project_id = 6

INSERT INTO tasks
set task_name = 'Заказать пиццу', start_date = '2018.05.10',
finish_date = '2018.05.13', deadline_date = '2018.05.12', user_id = 2,
project_id = 6

// Получить список из всех проектов для одного пользователя
SELECT task_name FROM tasks WHERE user_id = 1

// Получить список из всех задач для одного проекта
SELECT task_name FROM tasks WHERE project_id = 5

// Пометить задачу как выполненную

// Получить все задачи для завтрашнего дня
SELECT task_name FROM tasks WHERE start_date = '2018-05-18'

// Обновить название задачи по её идентификатору
UPDATE tasks SET task_name = 'Встреча с лучшим другом'
WHERE task_id = 8
