<?php
    require_once('./functions.php');
    require_once('./data.php');

    $content = generate_template('./templates/index.php', ['tasks' => $tasks,'show_complete_tasks' => $show_complete_tasks]);
    $layout = generate_template('./templates/layout.php', ['categories' => $categories, 'tasks' => $tasks, 'content' => $content, 'title' => $title]);

    print($layout);
