<?php 
    require('../../includes/config/database.php');
    $db = database_connect();

    require('../../includes/functions.php');
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Create Property</h1>

        <a href="/admin/index" class="yellow-button">Back</a>

        <form class="form" method="POST" action="" enctype="multipart/form-data">

            <fieldset>
                <legend>General Information</legend>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>

                <label for="cover">Image:</label>
                <input type="file" id="cover" name="cover" accept="image/jpeg, image/jpg">

                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>

            </fieldset>
            <fieldset>
                <legend>Property Information</legend>
                <label for="rooms">Bedrooms:</label>
                <input type="number" id="rooms" name="rooms" required>

                <label for="wc">Bathrooms:</label>
                <input type="number" id="wc" name="wc" required>

                <label for="parking">Parking Spaces:</label>
                <input type="number" id="parking" name="parking" required>
            </fieldset>
            <fieldset>
                <legend>Seller</legend>
                <label for="seller">Select Seller:</label>
                <select id="seller" name="seller" required>
                    <option value="" disabled selected>-- Select --</option>
                    <option value="1">Seller 1</option>
                    <option value="2">Seller 2</option>
                </select>
            </fieldset>
            <input type="submit" value="Create Property" class="green-button">
        </form>
    </main>

<?php 
   includeTemplate('footer');
?>