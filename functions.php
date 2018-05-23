<?php
    /**
     * @param array $category массив категорий задач
     * @param array $array_task массив задач
     */
    function task_counter($category, $array_task) {
        if ($category['project_name'] === 'Все') {
            return count ($array_task);
        };
        $count = 0;
        foreach ($array_task as $item) {
            if ($category['project_id'] === $item['project_id']) {
                $count++;
            }
        };
        return $count;
    };

    /**
     * @param string $date текстовое представление даты
     */
    function date_conversions($date) {
        return date('d.m.Y', strtotime($date));
    };

    /**
     * @param string $input текст названия новой задачи
     * @return srting
     */
    function input_validation($input) {
        return htmlspecialchars($input);
    };

    /**
     * @param string $template_name название шаблона
     * @param array $data данные шаблона
     * @return string
     */
    function generate_template(string $template_name, array $data) {
        $template_path = TEMPLATE_PATH . $template_name . TEMPLATE_EXT;
        if (!file_exists($template_path) && (!isset($data))) {
            return '';
        };
        ob_start();
        extract($data);
        require_once($template_path);
        return ob_get_clean();
    };

    /**
     * @param string $task_date дата выполнения задачи
     * @param boolean true если до дедлайна осталось 24 часа или меньше
     */
    function set_deadline(string $task_date) {
        if (empty($task_date)) {
            return false;
        }
        $datetime1 = date_create(date('d.m.Y'));
        $datetime2 = date_create($task_date);

        $interval = date_diff($datetime1, $datetime2);
        print_r($interval);
        if ($interval -> d <= 1) {
            return true;
        };
    };

    /**
     * @param array $db_param параметры подключения к базе данных
     * @param string $query sql запрос на получение данных из бд
     */
    function db_query($db_param, $query)  {
        $db_coonect = mysqli_connect($db_param['address'], $db_param['login'],
        $db_param['password'], $db_param['name']);

        $db_coonect == false ? print("Ошибка: Невозможно подключиться к MySQL "
        . mysqli_connect_error()): '';

        mysqli_set_charset($db_coonect, "utf8");

        $query_result = mysqli_query($db_coonect, $query);

        return mysqli_fetch_all($query_result, MYSQLI_ASSOC);
    }

    /**
     * @return string возвращает строку запроса для получения пользователей
     */
    function get_users() {
        return "SELECT `user_id`, `user_name` FROM `users`";
    };

    /**
     * @param mixed $id пользователя для которого нужно получить данные
     * @return string возвращает строку запроса для получения данных пользователя
     */
    function get_tasks_by_user($id) {
        intval($id);
        return "SELECT tasks.task_name, tasks.finish_date, tasks.deadline_date,
        tasks.project_id FROM tasks WHERE tasks.user_id = '$id'";
    };

    /**
     * @param mixed $id пользователя для которого нужно получить данные
     * @return string возвращает строку запроса для получения данных пользователя
     */
    function get_categories_by_user($id) {
        intval($id);
        return "SELECT projects.project_id, projects.project_name FROM projects WHERE projects.user_id = '$id'";
    };

    function get_task_by_categories_and_user($project_categories_id, $user_id) {
        return "SELECT tasks.task_name, tasks.finish_date, tasks.deadline_date,
        tasks.project_id FROM tasks WHERE tasks.project_id = '$project_categories_id' && '$user_id'";
    }

    function get_task($project_id, $user_id) {
    if ($project_id['categories'] == '2' && sizeof($project_id)) {
        return get_tasks_by_user($user_id);
        } else {
            return get_task_by_categories_and_user($project_id['categories'], $user_id);
        }
    };
