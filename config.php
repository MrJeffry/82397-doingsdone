<?php

$db_connect = [
    'address' => '127.0.0.1',
    'login' => 'root',
    'password' => 'Altigin0210',
    'name' => '82397_doingsdone'
];


$categories_query = 'SELECT `project_id`, `project_name` FROM `projects`';
$task_query = 'SELECT `task_name`, `finish_date`, `deadline_date`, `project_id` FROM `tasks` WHERE `user_id` = 1';

// Сделать отдельный файл функции которая будет возвращать текст запроса
