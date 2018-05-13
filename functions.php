<?php
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
