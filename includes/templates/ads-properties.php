<?php
    require __DIR__ . '/../config/database.php';

    $db = database_connect();

    $query = "SELECT * FROM properties";

    $result = mysqli_query($db, $query);

?>
<?php while($property = mysqli_fetch_assoc($result)): ?>
    <div class="ad-content">
        <img src="/images/<?php echo $property['cover']; ?>" alt="<?php echo $property['title']; ?>">
        <div class="ad-info">
            <h3><?php echo $property['title']; ?></h3>
            <p class="ad-description"><?php echo $property['description']; ?></p>
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
            <a href="/ad.php?id=<?php echo $property['id']; ?>" class="yellow-button">Details</a>
        </div>
    </div>
<?php endwhile; ?>