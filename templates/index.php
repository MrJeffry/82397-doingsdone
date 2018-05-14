<?php
$show_complete_tasks = rand(0, 1);
 define('SEC_IN_DAY', 86400);

/**
 * @param strung $task_date - дата выполнения задачи
 * @param boolean true если до дедлайна осталось 24 часа или меньше
 */
function set_deadline($task_date) {
    date_default_timezone_set("Europe/Moscow");
    $current_day_TS = time();
    $task_date_TS = strtotime($task_date);
    $days_diff = floor($task_date_TS - $current_day_TS);
    if (floor($days_diff / SEC_IN_DAY) <= $days_diff) {
        return true;
    }
    return false;
};
?>

<main class="content__main">
    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.html" method="post">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <nav class="tasks-switch">
            <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
            <a href="/" class="tasks-switch__item">Повестка дня</a>
            <a href="/" class="tasks-switch__item">Завтра</a>
            <a href="/" class="tasks-switch__item">Просроченные</a>
        </nav>

        <label class="checkbox">
            <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
            <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?= $show_complete_tasks ? 'checked' : '' ?>>
            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <table class="tasks">
        <?php foreach ($tasks as $item):?>
        <tr class="tasks__item task
        <?= set_deadline($item['task-date']) ? 'task--important' : ''?>
        <?= $item['task-checked'] === true ? 'task--completed' : '' ?>">
            <td class="task__select">
                <label class="checkbox task__checkbox">
                    <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                    <span class="checkbox__text">
                        <?= input_validation($item['task-name'])?>
                    </span>
                </label>
            </td>

            <td class="task__file">

            </td>

            <td class="task__date">
                <?= $item['task-date']?>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>
</main>
