<?php
    define('TEMPLATE_PATH', './templates/');
    define('TEMPLATE_EXT', '.php');

    require_once('./config.php');
    require_once('./init.php');

    require_once('./functions.php');
    require_once('./data.php');
    require_once('./add.php');
    // require_once('./create_user.php');

    $guest = generate_template('guest', []);
    $modal_task = generate_template('modal-task', [
        'categories' => $categories,
        // Не уверен что это тут нужно, но без весят нотисы
        'errors' => isset($errors)
    ]);
    $content = generate_template('index',[
        'tasks' => $tasks,
        'show_complete_tasks' => $show_complete_tasks
    ]);
    $layout = generate_template('layout', [
        'project_id' => $project_id,
        'categories' => $categories,
        'tasks' => db_query($db_connect, get_tasks_by_user($users[0]['user_id'])),
        'title' => $title,
        'content' => $content,
        'modal_task' =>  $modal_task,
        // Не уверен что это тут нужно, но без весят нотисы
        'errors' => isset($errors)
    ]);

    print($guest);
