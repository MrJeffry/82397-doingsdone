<?php
    $show_complete_tasks = rand(0, 1);
    $title = 'Дела в порядке';

    $users = db_query($db_connect, get_users());
    $categories = db_query($db_connect, get_categories_by_user($users[0]['user_id']));
    $project_id = $_GET['categories'] ?? 0;
    $tasks = db_query($db_connect, get_task($project_id,$users[0]['user_id']));
