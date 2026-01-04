<?php 
    require 'includes/config/database.php';
    $db = database_connect();

    $name = 'Admin User';
    $email = 'admin@admin.com';
    $password = 'admin123';
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (name, email, password,created_at) VALUES ('$name', '$email', '$hashed_password', NOW())";
    mysqli_query($db, $query);
    
?>