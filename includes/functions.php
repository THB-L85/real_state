<?php

    define('TEMPLATES_URL', __DIR__ . '/templates');
    define('FUNCTIONS_URL', __DIR__ . 'functions.php');

    function includeTemplate(string $name, bool $isHome = false) {
        include TEMPLATES_URL . "/{$name}.php";
    }

    function isAuthenticated(){
        session_start();

        if(!$_SESSION['login']){
            header('Location: /');
        }

    }

    function debugg($var){
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        exit();
    }