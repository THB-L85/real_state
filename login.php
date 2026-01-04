<?php 
    require 'includes/functions.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Here handle the login logic
        echo "Login form submitted";
        exit();
    }

    includeTemplate('header');
?>
    <main class="container section ads container-center">
        <h2> Login </h2>
        <form action="/login.php" method="POST">
            <fieldset>
                <legend>Email and Password</legend>

                <label for="email">Email</label>
                <input type="email" placeholder="Your Email" id="email" required>

                <label for="password">Password</label>
                <input type="password" placeholder="Your Password" id="password" require>

            </fieldset>

            <button type="submit" class="green-button"> Log In </button> 
        </form>
    </main>
<?php
    includeTemplate('footer');
?>