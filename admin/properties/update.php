<?php 
   require('../../includes/functions.php');
   includeTemplate('header');
?>

    <main class="container section">
        <h1>Update Property</h1>

        <a href="/admin/index" class="yellow-button">Back</a>

        <form class="form" method="POST" action="" enctype= "multipart/form-data">
            <input type="submit" value="Update Property" class="button button-green">
        </form>
    </main>

<?php 
   includeTemplate('footer');
?>