<?php
    require 'app.php';

    function includeTemplate(string $name, bool $isHome = false) {
        include TEMPLATES_URL . "/{$name}.php";
    }

    function isAuthenticated():bool{
        session_start();

        if(isset($_SESSION['login']) && $_SESSION['login'] === true){
            return true;
        }

        return false;
    }