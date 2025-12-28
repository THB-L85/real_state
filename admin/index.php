<?php 
   require('../includes/functions.php');
   includeTemplate('header');
?>

    <main class="container section">
        <h1>Properties Administrator</h1>

        <a href="/admin/properties/create.php" class="green-button">Create</a>
        <a href="/admin/properties/update.php" class="green-button">Update</a>
        <a href="/admin/properties/delete.php" class="green-button">Delete</a>

    </main>

<?php 
   includeTemplate('footer');
?>