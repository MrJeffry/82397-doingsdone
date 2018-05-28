<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data['task_name'] = $_POST['name'];
    $data['project_id'] = intval($_POST['project']);
    $data['user_id'] = $users[0]['user_id'];
    $data['start_date'] = date('Y-m-d H:i:s', strtotime("now"));
    $data['file_path'] = '';
    $data['project_completed'] = 0;


    if (! empty($_POST['date'])) {
        $data['deadline_date'] = date("Y-m-d H:i:s", strtotime($_POST['date']));
    }

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
        $data['file_path'] = $path;
    }

    if (!count($errors)) {
        db_insert($db_connect_handler, 'tasks', $data);
        header('Location: index.php');
    };
}
