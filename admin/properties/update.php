<?php 
    require('../../includes/config/database.php');
    $db = database_connect();

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = mysqli_real_escape_string($db, $_GET['id']);

        $property_query = "SELECT * FROM properties WHERE id = $id";
        $property_result = mysqli_query($db, $property_query);
        $property = mysqli_fetch_assoc($property_result);

        // echo '<pre>'; 
        //     var_dump($_GET);
        // echo '</pre>';
        // echo '<pre>'; 
        //     var_dump($property);
        // echo '</pre>';
        // exit;

        if(!$property){
            header('Location: /admin/index');
        }
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {


        // echo '<pre>'; 
        //     var_dump($_POST);
        // echo '</pre>';
        // echo '<pre>'; 
        //     var_dump(empty($_FILES['cover']['tmp_name']));
        // echo '</pre>';
        // exit;

        $dirImages = '../../images/';  
        if(!is_dir($dirImages)){
            mkdir($dirImages);
        }

        // get inputs from form
        $idproperty     = mysqli_real_escape_string($db, $_POST['idproperty']);
        $title          = mysqli_real_escape_string($db, $_POST['title']);
        $price          = mysqli_real_escape_string($db, $_POST['price']);
        $description    = mysqli_real_escape_string($db, $_POST['description']);
        $image          = mysqli_real_escape_string($db, $_POST['image']);
        $rooms          = mysqli_real_escape_string($db, $_POST['rooms']);
        $wc             = mysqli_real_escape_string($db, $_POST['wc']);
        $parking        = mysqli_real_escape_string($db, $_POST['parking']);
        $seller_id      = mysqli_real_escape_string($db, $_POST['seller']);
        $created_at     = date("Y-m-d H:i:s");

        if(!empty($_FILES['cover']['tmp_name'])){
            $image_name = md5(uniqid(rand(), true)) . '.jpg';
            move_uploaded_file($_FILES['cover']['tmp_name'], $dirImages . $image_name );
            $cover = $image_name;
            unlink($dirImages . $image);
        }else{
            $cover = $image;
        }

        $query = "UPDATE properties SET title='$title', price=$price, cover='$cover', description='$description', rooms=$rooms, wc=$wc, parking=$parking, seller_id=$seller_id, created_at='$created_at' WHERE id = $idproperty";

        $result = mysqli_query($db, $query);

        if($result){
            header('Location: /admin/index');
        }
    }

    $sellers_query = "SELECT * FROM sellers";
    $sellers = mysqli_query($db, $sellers_query);

    require('../../includes/functions.php');
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Update Property</h1>

        <a href="/admin/index" class="yellow-button">Back</a>

        <form class="form" method="POST" action="/admin/properties/update.php" enctype="multipart/form-data">
            <input type="hidden" name="idproperty" value="<?php echo $property['id'] ?>">
            <fieldset>
                <legend>General Information</legend>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required value="<?php echo $property['title'] ?>">

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required value="<?php echo $property['price'] ?>">

                <label for="cover">Image:</label>
                <input type="file" id="cover" name="cover" accept="image/jpeg, image/jpg">
                <img src="/images/<?php echo $property['cover'] ?>" alt="<?php echo $property['title'] ?>" class="update-image-property">
                <input type="hidden" id="image" name="image" value="<?php echo $property['cover'] ?>">
                
                <label for="description">Description:</label>
                <textarea id="description" name="description" required> <?php echo $property['description'] ?> </textarea>

            </fieldset>
            <fieldset>
                <legend>Property Information</legend>
                <label for="rooms">Bedrooms:</label>
                <input type="number" id="rooms" name="rooms" required value="<?php echo $property['rooms'] ?>">

                <label for="wc">Bathrooms:</label>
                <input type="number" id="wc" name="wc" required value="<?php echo $property['wc'] ?>">

                <label for="parking">Parking Spaces:</label>
                <input type="number" id="parking" name="parking" required value="<?php echo $property['parking'] ?>">
            </fieldset>
            <fieldset>
                <legend>Seller</legend>
                <label for="seller">Select Seller:</label>
                <select id="seller" name="seller" required>
                    <option value="" disabled>-- Select --</option>
                    <?php while($seller = mysqli_fetch_assoc($sellers)): ?>
                        <?php if($seller['id'] == $property['seller_id']): ?>
                            <option value="<?php echo $seller['id']; ?>" selected><?php echo htmlspecialchars($seller['first_name']) . ' ' . htmlspecialchars($seller['last_name']); ?></option>
                        <?php else: ?>
                            <option value="<?php echo $seller['id']; ?>"><?php echo htmlspecialchars($seller['first_name']) . ' ' . htmlspecialchars($seller['last_name']); ?></option>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </select>
            </fieldset>
            <button type="submit" class="green-button"> Update Property </button>
        </form>
    </main>

<?php 
   includeTemplate('footer');
?>