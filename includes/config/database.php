<?php
    function database_connect() : mysqli{
        $db = mysqli_connect('localhost', 'root', 'admin23', 'real_state');
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $db;
    }
?>