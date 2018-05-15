<?php
    /**
     * @param string $input - текст названия новой задачи
     * @return srting
     */
    function input_validation($input) {
        return htmlspecialchars($input);
    };

    /**
     * @param string $template_name - название шаблона
     * @param array $data - данные бадлона
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
     * @param string $task_date - дата выполнения задачи
     * @param boolean true если до дедлайна осталось 24 часа или меньше
     */
    function set_deadline(string $task_date) {
        if (empty($task_date)) {
            return false;
        }
        $datetime1 = date_create(date('d.m.Y'));
        $datetime2 = date_create($task_date);

        $interval = date_diff($datetime1, $datetime2);
        if ($interval -> d <= 1) {
            return true;
        };
    };
