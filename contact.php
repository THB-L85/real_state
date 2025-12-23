<?php 
    require 'includes/functions.php';
    includeTemplate('header');
?>
    <main class="container section">
        <h1>Contact</h2>
        <img src="src/img/destacada3.jpg" alt="contact">
        <h2>Fill this form for contact with us</h2>
        <form action="" class="contact-form">
            <fieldset class="contact-form-section">
                <legend>Personal information</legend>
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Type your name" id="name">
                <label for="email">Email:</label>
                <input type="text" name="email" placeholder="Type your email" id="email">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" placeholder="Type your phone" id="phone">
                <label for="message">Message:</label>
                <textarea name="message" placeholder="Type a message"></textarea id="message">
            </fieldset>
            <fieldset class="contact-form-section">
                <legend>Propiety information</legend>
                <label for="type">Buy or Sale:</label>
                <select name="type" id="type">
                    <option value="" selected disabled> -- Choose an option --</option>
                    <option value="buy" > Buy </option>
                    <option value="sale" > Sale </option>
                </select>
                <label for="mount">Price or Presupuesto:</label>
                <input type="number" placeholder="Type a mount" id="message">
            </fieldset>
            <fieldset class="contact-form-section">
                <legend>Medio de contacto</legend>
                <div class="contact-method">
                    <span>Como desea ser contactado?</span>
                    <br>
                    <label for="phone_method">Phone</label>
                    <input type="radio" name="method" value="phone" id="phone_method">
                    <label for="email_method">Email</label>
                    <input type="radio" name="method" value="email" id="email_method">
                </div>
            </fieldset>
            <button type="submit" class="green-button">Submit</button>
        </form>
    </main>
<?php
    includeTemplate('footer');
?>