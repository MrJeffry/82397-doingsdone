<?php
require_once('config.php');

$db_connect_handler = mysqli_connect($db_connect['address'],
                                    $db_connect['login'],
                                    $db_connect['password'],
                                    $db_connect['name']);

if (!$db_connect_handler) {
    print("Ошибка: Невозможно подключиться к MySQL "
    . mysqli_connect_error());
    exit();
}
