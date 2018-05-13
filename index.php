<?php
    define('TEMPLATE_PATH', './templates/');
    define('TEMPLATE_EXT', '.php');

    require_once('./functions.php');
    require_once('./data.php');

    $content = generate_template('index', ['tasks' => $tasks,'show_complete_tasks' => $show_complete_tasks]);
    $layout = generate_template('layout', ['categories' => $categories, 'tasks' => $tasks, 'content' => $content, 'title' => $title]);

    print($layout);
