<?php
    $show_complete_tasks = rand(0, 1);
    $title = 'Дела в порядке';
    $categories= ['Все', 'Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
    $tasks = [
        [
            'task-name' => 'Задача для решиния времени',
            'task-date' => '16.05.2018',
            'task-category' => 'Авто',
            'task-checked' => false
        ],
        [
            'task-name' => 'Собеседование в IT компании',
            'task-date' => '15.05.2018',
            'task-category' => 'Работа',
            'task-checked' => false
        ],
        [
            'task-name' => 'Выполнить тестовое задание',
            'task-date' => '01.06.2008',
            'task-category' => 'Работа',
            'task-checked' => false
        ],
        [
            'task-name' => 'Сделать задание первого раздела',
            'task-date' => '21.04.2018',
            'task-category' => 'Учеба',
            'task-checked' => true
        ],
        [
            'task-name' => 'Встреча с другом',
            'task-date' => '22.04.2018',
            'task-category' => 'Входящие',
            'task-checked' => false
        ],
        [
            'task-name' => 'Купить корм для кота',
            'task-date' => '',
            'task-category' => 'Домашние дела',
            'task-checked' => false
        ],
        [
            'task-name' => 'Заказать пиццу',
            'task-date' => '',
            'task-category' => 'Домашние дела',
            'task-checked' => false
        ]
    ];
