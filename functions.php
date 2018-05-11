<?php
    function generate_template($template_path) {
        if (file_exists($template_path)) {
            echo 'Файл'. $template_path. ' существует';
        } else {
            echo 'Файл'. $template_path. ' не существует';
        }

    }
?>
