<?php 
    require('../includes/app.php');

    isAuthenticated();

    $db = database_connect();

    $properties_query = "SELECT properties.*, sellers.first_name, sellers.last_name FROM properties
    LEFT JOIN sellers ON properties.seller_id = sellers.id
    ORDER BY properties.created_at ASC";

    $properties = mysqli_query($db, $properties_query);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = mysqli_real_escape_string($db, $_POST['id']);

        $query = "SELECT cover FROM properties WHERE id = $id";
        $result = mysqli_query($db, $query);
        unlink('../images/' . mysqli_fetch_assoc($result)['cover']);

        $query = "DELETE FROM properties WHERE id = $id";
        $result = mysqli_query($db, $query);

        if($result){
            header('Location: /admin/index');
        }
    }

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
                        if(mysqli_num_rows($properties) === 0):
                    ?>
                        <tr><td colspan='7' style="height:5rem;background-color: #e6e6e6;color:black">No properties yet.</td></tr>
                    <?php endif; ?>
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
                                <form method="POST" action="/admin/index.php">
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