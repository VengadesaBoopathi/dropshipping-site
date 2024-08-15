<?php
session_start();
include ('../includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Dropshipping Website</title>
    <link rel="stylesheet" href="/dropshipping-website/assets/css/style.css">
</head>

<body>
    <?php include ('../includes/header.php'); ?>

    <div class="container">
        <h1>Our Services</h1>

        <section class="services-list">
            <h2>What We Offer</h2>
            <ul>
                <li>
                    <h3>Dropshipping Management</h3>
                    <p>We handle the entire dropshipping process for you, from order to delivery.</p>
                </li>
                <li>
                    <h3>Product Sourcing</h3>
                    <p>Access to a wide range of products from reliable suppliers.</p>
                </li>
                <li>
                    <h3>Inventory Management</h3>
                    <p>Real-time inventory tracking and automatic updates.</p>
                </li>
                <li>
                    <h3>Order Fulfillment</h3>
                    <p>Efficient processing and shipping of orders directly to your customers.</p>
                </li>
            </ul>
        </section>

        <section class="why-choose-us">
            <h2>Why Choose Our Services?</h2>
            <ul>
                <li>Experienced team of dropshipping experts</li>
                <li>Seamless integration with major e-commerce platforms</li>
                <li>24/7 customer support</li>
                <li>Competitive pricing and no hidden fees</li>
            </ul>
        </section>

        <section class="contact-us">
            <h2>Interested in Our Services?</h2>
            <p>Contact us today to learn more about how we can help grow your dropshipping business.</p>
            <a href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWrRmTWddxCqhLmLlVJTNsBxSQXxfQSKrjXbNXfSkwtcsnLSkGRlpDBbtQjZPTwWmTgSWdMFQ" class="btn">Contact Us</a>
        </section>
    </div>

    <?php include ('../includes/footer.php'); ?>
</body>

</html>