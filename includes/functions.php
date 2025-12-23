<?php
    require 'app.php';

    function includeTemplate(string $name, bool $isHome = false) {
        include TEMPLATES_URL . "/{$name}.php";
    }