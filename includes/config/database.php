<?php
    function database_connect() : mysqli{
        $db = mysqli_connect('localhost', 'root', 'admin123', 'real_state');
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $db;
    }
?>