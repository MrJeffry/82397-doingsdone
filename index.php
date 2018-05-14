<?php
    define('TEMPLATE_PATH', './templates/');
    define('TEMPLATE_EXT', '.php');

    require_once('./functions.php');
    require_once('./data.php');

    $content = generate_template('index', ['tasks' => $tasks]);
    $layout = generate_template('layout', ['categories' => $categories, 'tasks' => $tasks, 'content' => $content, 'title' => $title]);

    print($layout);
// В одном дне 86400 секунд
// date_default_timezone_set('Europe/Moscow');

// $datetime1 = time();
// $end_ts = strtotime("30 May 2018");

// print($end_ts);
