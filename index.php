<?php
    require 'includes/functions.php';
    includeTemplate('header', $isHome = true);
?>
    <main class="section about">
        <h1>About Us</h1>
        <div class="icons">
            <div class="icon-content">
                <img src="src/img/icono1.svg" alt="img_security">
                <h3 class="title">Segurity</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at est nec nisi facilisis tincidunt. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid perferendis dignissimos consequatur, voluptatibus repellat ut recusandae.</p>
            </div>
            <div class="icon-content">
                <img src="src/img/icono2.svg" alt="img_price">
                <h3 class="title">Price</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at est nec nisi facilisis tincidunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae cum harum.</p>
            </div>
            <div class="icon-content">
                <img src="src/img/icono3.svg" alt="img_time">
                <h3 class="title">On time</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at est nec nisi facilisis tincidunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Id nulla quo culpa ea, voluptatem non amet reiciendis incidunt rem similique dolorem nemo.</p>
            </div>
        </div>
    </main>
    <section class="section ads">
        <h2>Casas y Depas en Venta</h2>
        <div class="ads-container">
            <?php include 'includes/templates/ads-properties.php'; ?>
        </div>
        <div class="button-container">
            <a href="/ads.php" class="green-button">Ver Todas</a>
        </div>
    </section>
    <section class="section contact">
        <div class="contact-info">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto totam excepturi.</p>
            <a href="/contact.php" class="yellow-button">
                Contact Us
            </a>
        </div>
    </section>
    <section class="section blog">
        <div class="blog-content">
            <h3>Our blog</h3>
            <article>
                <div class="entry-image">
                    <img src="src/img/blog1.jpg" alt="img-blog1">
                </div>
                <div class="entry-info">
                    <a href="/entry.php" class="entry-link">
                        <h4>Consejos para comprar tu primera casa</h4>
                        <p>Escrito el <span class="highlight">10/05/2025</span> por <span class="highlight">Admin</span> </p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                    </a>
                </div>
            </article>
            <article>
                <div class="entry-image">
                    <img src="src/img/blog2.jpg" alt="img-blog2">
                </div>
                <div class="entry-info">
                    <a href="/entry.php" class="entry-link">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el <span class="highlight">1/05/2025</span> por <span class="highlight">Admin</span> </p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                    </a>
                </div>
            </article>
        </div>
        <div class="testimonials">
            <h3>Testimonials</h3>
            <div class="testimonals-content">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas. 
                </blockquote>
                <p> - Luis Duran </p>
            </div>
        </div>
    </section>
<?php
    includeTemplate('footer');
?>