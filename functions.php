<?php
    function input_validation($input) {
        return htmlspecialchars($input);
    };

    function generate_template($template_path, $data) {
        if (file_exists($template_path) && (isset($data))) {
            ob_start();
            extract($data);
            require_once($template_path);
            return ob_get_clean();
        };
        return '';
    };
