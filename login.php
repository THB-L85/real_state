<?php 
    require 'includes/app.php';

    $db = database_connect();

    $errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Here handle the login logic
        $email = mysqli_real_escape_string($db,filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db,$_POST['password']);

        if(!$email){
            $errors[] = "Email is required or invalid email format.";
        }

        if(!$password){
            $errors[] = "Password is required or wrong password.";
        }

        if(empty($errors)){
            // Check if the user exists
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($db, $query);

            if($result->num_rows){
                // User exists, verify password
                $user = mysqli_fetch_assoc($result);
                $verified = password_verify($password, $user['password']);

                if($verified){
                    // Start the session
                    session_start();

                    // Store user info in session
                    $_SESSION['user'] = $user['email'];
                    $_SESSION['login'] = true;

                    // Redirect to admin area
                    header('Location: /admin/index.php');
                } else {
                    $errors[] = "Incorrect password.";
                }
            } else {
                $errors[] = "User does not exist.";
            }
        }
    }

    includeTemplate('header');
?>
    <main class="container section ads container-center">
        <h2> Login </h2>
        <?php if(!empty($errors)): ?>
            <div class="errors-messages">
                <ul>
                    <?php foreach($errors as $error): ?>
                        <li> <?php echo $error; ?> </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="/login.php" method="POST">
            <fieldset>
                <legend>Email and Password</legend>

                <label for="email">Email</label>
                <input type="email" placeholder="Your Email" id="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" placeholder="Your Password" id="password" name="password" required>

            </fieldset>

            <button type="submit" class="green-button"> Log In </button> 
        </form>
    </main>
<?php
    includeTemplate('footer');
?>