<?php
    $show_complete_tasks = rand(0, 1);
    $title = 'Дела в порядке';

    $categories = db_query($db_connect, $categories_query);
    $tasks = db_query($db_connect, $task_query);
