# Получим список всех пользователей
SELECT user_name FROM users

# Добавить пользователя Артем
INSERT INTO users (user_name, password, user_email)
VALUES ('Артем', '123', 'aaltigin@gmail.com');

# Добавить пользователя Игорь
INSERT INTO users (user_name, password, user_email)
SET ('Игорь', '123', 'igor@gmail.com');

# Добавим проекты
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


#Заполняем задачи
INSERT INTO tasks
set task_name = 'Задача для решиния времени', start_date = '2018-05-10',
finish_date = '2018-05-16', deadline_date = '2018-05-15', user_id = 1,
project_id = 7

INSERT INTO tasks
set task_name = 'Собеседование в IT компании', start_date = '2018-05-10',
finish_date = '2018-05-18', deadline_date = '2018-05-17', user_id = 1,
project_id = 5

INSERT INTO tasks
set task_name = 'Выполнить тестовое задание', start_date = '2018-05-10',
finish_date = '2018-05-20', deadline_date = '2018-05-19', user_id = 1,
project_id = 5

INSERT INTO tasks
set task_name = 'Сделать задание первого раздела', start_date = '2018-05-10',
finish_date = '2018-05-21', deadline_date = '2018-05-20', user_id = 1,
project_id = 4

INSERT INTO tasks
set task_name = 'Встреча с другом', start_date = '2018-05-10',
finish_date = '2018-05-20', deadline_date = '2018-05-21', user_id = 2,
project_id = 3

INSERT INTO tasks
set task_name = 'Купить корм для кота', start_date = '2018-05-10',
finish_date = '2018-05-13', deadline_date = '2018-05-12', user_id = 1,
project_id = 6

INSERT INTO tasks
set task_name = 'Заказать пиццу', start_date = '2018-05-10',
finish_date = '2018-05-13', deadline_date = '2018-05-12', user_id = 2,
project_id = 6

# Получить список из всех проектов для одного пользователя
SELECT tasks.task_name FROM tasks WHERE tasks.user_id = 1

# Получить список из всех задач для одного проекта
SELECT tasks.task_name FROM tasks WHERE tasks.project_id = 5

# Пометить задачу как выполненную
UPDATE tasks SET tasks.finish_date = '2018-05-17'
WHERE tasks.task_id = 8

# Получить все задачи для завтрашнего дня
SELECT tasks.task_name FROM tasks WHERE tasks.start_date = '2018-05-18'

# Обновить название задачи по её идентификатору
UPDATE tasks SET tasks.task_name = 'Встреча с лучшим другом'
WHERE tasks.task_id = 8
