<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_task = $_POST;

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
            if ($errors[$key] ===  $errors['name']) {
                $errors[$key] = 'Это поле надо заполнить';
            }
            if ($errors[$key] ===  $errors['project']) {
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
    return $errors;
}
