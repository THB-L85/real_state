<?php 
    require('../includes/functions.php');
    require('../includes/config/database.php');


    $db = database_connect();

    $properties_query = "SELECT properties.*, sellers.first_name, sellers.last_name FROM properties
    LEFT JOIN sellers ON properties.seller_id = sellers.id
    ORDER BY properties.created_at ASC";
    $properties = mysqli_query($db, $properties_query);

    includeTemplate('header');
?>

    <main class="container section">
        <h1>Properties Administrator</h1>

        <div class="container">
            <a href="/admin/properties/create.php" class="green-button">Create a new property</a>
            <table class="table-properties">
                <thead>
                    <tr class="table-header">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Seller</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($property = mysqli_fetch_assoc($properties)):
                    ?>
                        <tr>
                            <td><?= $property['id'] ?></td>
                            <td><?= $property['title'] ?></td>
                            <td> $<?= number_format($property['price'],2) ?></td>
                            <td><img src="/images/<?= $property['cover'] ?>" alt="<?= $property['title'] ?>" class="image-property"></td>
                            <td><?= $property['description'] ?></td>
                            <td><?= $property['first_name'] . ' ' . $property['last_name'] ?></td>
                            <td class="actions">
                                <a href="/admin/properties/update.php?id=<?= $property['id'] ?>" class="yellow-button action-button">Edit</a>
                                <form method="POST" action="/admin/properties/delete.php">
                                    <input type="hidden" name="id" value="<?= $property['id'] ?>">
                                    <button type="submit" class="red-button action-button"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
    </main>

<?php 
   includeTemplate('footer');
?>