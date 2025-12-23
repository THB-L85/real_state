<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="src/img/bienes-raices.png" type="image/x-icon">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Real State</title>
</head>
<body>
    <header class="<?php echo $isHome ? 'inicio' : ''; ?>">
        <div class="container header-container">
            <div class="navbar">
                <a href="/" class="logo">Real<span>State</span></a>
                <img class="mobile-icon-menu" src="src/img/barras.svg" alt="barras">
                <ul class="navbar-links">
                    <li><a href="/about.php">About Us</a></li>
                    <li><a href="/ads.php">Ads</a></li>
                    <li><a href="/blog.php">Blog</a></li>
                    <li><a href="/contact.php">Contact</a></li>
                    <li><a href="#" class="dark-mode-boton"><img src="src/img/moon.png" alt=""></a></li>
                </ul>
            </div>
            <?php 
                if(isset($isHome)) {
                    echo "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>";
                }
            ?>
        </div>
    </header>