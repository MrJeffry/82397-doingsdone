<?php
    define('TEMPLATE_PATH', './templates/');
    define('TEMPLATE_EXT', '.php');

    require_once('./config.php');
    require_once('./functions.php');
    require_once('./data.php');

    $content = generate_template('index', ['tasks' => $tasks, 'show_complete_tasks' => $show_complete_tasks]);
    $layout = generate_template('layout', ['categories' => $categories, 'tasks' => db_query($db_connect, get_tasks_by_user($users[0]['user_id'])), 'content' => $content, 'title' => $title]);

    print($layout);
