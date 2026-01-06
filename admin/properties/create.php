<?php 
    require('../../includes/app.php');

    
    use App\Properties;


    isAuthenticated();

    $db = database_connect();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $property = new Properties($_POST);
        $property->save(); 
        
        exit();

        $dirImages = '../../images/';  
        if(!is_dir($dirImages)){
            mkdir($dirImages);
        }

        $image_name = md5(uniqid(rand(), true)) . '.jpg';

        move_uploaded_file($_FILES['cover']['tmp_name'], $dirImages . $image_name );

        // get inputs from form
        $title          = mysqli_real_escape_string($db, $_POST['title']);
        $price          = mysqli_real_escape_string($db, $_POST['price']);
        $description    = mysqli_real_escape_string($db, $_POST['description']);
        $rooms          = mysqli_real_escape_string($db, $_POST['rooms']);
        $wc             = mysqli_real_escape_string($db, $_POST['wc']);
        $parking        = mysqli_real_escape_string($db, $_POST['parking']);
        $seller_id      = mysqli_real_escape_string($db, $_POST['seller']);
        $created_at     = date("Y-m-d H:i:s");

        $query = "INSERT INTO properties (title, price, cover, description, rooms, wc, parking, seller_id, created_at)
        VALUES ('$title', $price, '$image_name','$description', $rooms, $wc, $parking, $seller_id, '$created_at')";

        $result = mysqli_query($db, $query);

        if($result){
            header('Location: /admin/index');
        }
    }

    $sellers_query = "SELECT * FROM sellers";
    $sellers = mysqli_query($db, $sellers_query);

    includeTemplate('header');
?>

    <main class="container section">
        <h1>Create Property</h1>

        <a href="/admin/index" class="yellow-button">Back</a>

        <form class="form" method="POST" action="/admin/properties/create.php" enctype="multipart/form-data">

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
                <label for="seller_id">Select Seller:</label>
                <select id="seller_id" name="seller_id" required>
                    <option value="" disabled selected>-- Select --</option>
                    <?php while($seller = mysqli_fetch_assoc($sellers)): ?>
                        <option value="<?php echo $seller['id']; ?>"><?php echo htmlspecialchars($seller['first_name']) . ' ' . htmlspecialchars($seller['last_name']); ?></option>
                    <?php endwhile; ?>
                </select>
            </fieldset>
            <input type="submit" value="Create Property" class="green-button">
        </form>
    </main>

<?php 
   includeTemplate('footer');
?>