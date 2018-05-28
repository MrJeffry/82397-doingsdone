<?php
require_once('./init.php');
require_once('./functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    foreach ($_POST as $key => $value) {
        if ($key == "email") {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors[$key] = 'Email должен быть корректным';
            }
        } else {
            $data['user_email'] = $_POST['email'];
        }
    }

    $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $data['user_name'] = $_POST['name'];

    $required = ['email', 'password', 'name'];

    $dict = [
        'email' => 'E-mail пользователя',
        'password' => 'Пароль пользователя',
        'name' => 'Имя пользователя'
    ];

    foreach ($required as $key) {

        if (empty($_POST[$key])) {
            $errors[$key] = 'Это поле надо заполнить';
        }
    }

    if (!count($errors)) {
        db_insert($db_connect_handler, 'users', $data);
    };
}
