<?php 
    require 'includes/app.php';

    $db = database_connect();
    $id = $_GET['id'];
    $query = "SELECT * FROM properties WHERE id=$id";
    $property = mysqli_query($db, $query);
    if($property->num_rows === 0){
        header('Location: /ads.php');
    }
    $property = mysqli_fetch_assoc($property);

    includeTemplate('header');
?>
    <main class="container section ads container-center">
        <h2><?php echo $property['title']; ?></h2>
        <div class="ad-content">
            <div class="ad-container">
                <img src="/images/<?php echo $property['cover']; ?>" alt="House 6">
                <div class="ad-info">
                    <p class="price"> $<?php echo number_format($property['price'],2); ?></p>
                    <ul class="icons-list">
                        <li>
                            <img src="src/img/icono_wc.svg" alt="img-wc">
                            <p><?php echo $property['wc']; ?></p>
                        </li>
                        <li>
                            <img src="src/img/icono_estacionamiento.svg" alt="img-parking">
                            <p><?php echo $property['parking']; ?></p>
                        </li>
                        <li>
                            <img src="src/img/icono_dormitorio.svg" alt="img-bedroom">
                            <p><?php echo $property['rooms']; ?></p>
                        </li>
                    </ul>
                    <hr>
                    <p class="description"><?php echo $property['description']; ?></p>
                </div>
            </div>
        </div>
    </main>
<?php
    includeTemplate('footer');
?>