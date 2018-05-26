<?php
    define('TEMPLATE_PATH', './templates/');
    define('TEMPLATE_EXT', '.php');

    require_once('./config.php');
    require_once('./functions.php');
    require_once('./data.php');

    $modal_task = generate_template('modal-task', [

    ]);

    $content = generate_template('index',
    ['tasks' => $tasks,
    'show_complete_tasks' => $show_complete_tasks
    ]);

    $layout = generate_template('layout', [
    'project_id' => $project_id,
    'categories' => $categories,
    'tasks' => db_query($db_connect, get_tasks_by_user($users[0]['user_id'])),
    'title' => $title,
    'content' => $content,
    'modal_task' =>  $modal_task
    ]);

    print($layout);
