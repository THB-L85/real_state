<?php 
    require 'includes/functions.php';
    includeTemplate('header');
?>
    <main>
        <div class="section ads">
            <h2>Casas y Depas en Venta</h2>
            <div class="ads-container">
                <?php include 'includes/templates/ads-properties.php'; ?>
            </div>
        </div>
    </main>
<?php
   includeTemplate('footer');
?>