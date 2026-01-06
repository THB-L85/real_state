<?php 
    require 'includes/app.php';
    includeTemplate('header');
?>
    <main>
        <h1>About Us</h1>
        <div class="section about about-content">
            <div class="about-image">
                <picture>
                    <!-- <source srcset="src/img/about.webp" type="image/webp"> -->
                    <source srcset="src/img/about.jpg" type="image/jpeg">
                    <img loading="lazy" src="src/img/about.jpg" alt="About Us Image">
                </picture>
            </div>
            <div class="about-description">
                <blockquote>25 year of experience</blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga, esse reiciendis. Magni mollitia voluptatibus numquam excepturi nemo ut cum! Assumenda beatae rem eius inventore aspernatur aut modi id. Porro, et! Praesentium nemo officia sequi quasi, perferendis reprehenderit laudantium totam velit, error nulla ab dolores eius. Saepe sit nesciunt recusandae quam iusto similique!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam harum accusantium distinctio praesentium sint natus, id, neque aliquam explicabo laborum, expedita quasi. Veritatis facilis, eius eos suscipit hic magnam asperiores!</p>
            </div>
        </div>
    </main>
    <section class="section about">
        <h1> More About Us </h1>
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
    </section>
<?php
    includeTemplate('footer');
?>