<?php
    function input_validation($input) {
        return $input = htmlspecialchars($input);
    };

    function generate_template($template_path, $data) {
        if (file_exists($template_path) and (isset($data))) {
            ob_start();
            extract($data);
            $print_data = require_once($template_path);
            return $print_data = ob_get_clean();
        };
        print ('');
    };
?>
