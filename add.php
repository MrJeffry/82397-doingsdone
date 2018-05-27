<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_task = $_POST;

    $new_task_name = $_POST['name'];
    $new_task_project = $_POST['project'];
    $new_task_date = date("Y-m-d H:i:s", strtotime($_POST['date']));

    // $new_task_date = 'NULL';
    // if (!empty($_POST['date'])) {
    //     $new_task_date = date("Y-m-d H:i:s", strtotime($_POST['date']));
    // }


    $required = ['name', 'project'];

    $dict = [
        'name' => 'Название задачи',
        'project' => 'Название проекта',
        'date' => 'Срок выполнения',
        'preview' => 'Файл'
    ];

    $errors = [];

    foreach ($required as $key) {
        if(empty($_POST[$key])) {
            if (isset($errors[$key]) ===  isset($errors['name'])) {
                $errors[$key] = 'Это поле надо заполнить';
            }
            if (isset($errors[$key]) === isset($errors['project'])) {
                $errors[$key] = 'Нужно выбрать проект';
            }
        }
    }

    if (isset($_FILES['preview']['name'])) {
        $tmp_name = $_FILES['preview']['tmp_name'];
        $path = $_FILES['preview']['name'];
        move_uploaded_file($tmp_name, './' . $path);
        $gif['path'] = $path;
    }

    if (!count($errors)) {
       db_query($db_connect,
       set_new_task(
           $new_task_name,
           $new_task_project,
           $users[0]['user_id'] ,
           $new_task_date,
           0
        )
       );
    };
}
