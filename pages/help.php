<?php
session_start();
include ('../includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Center - Dropshipping Website</title>
    <link rel="stylesheet" href="/dropshipping-website/assets/css/style.css">
</head>

<body>
    <?php include ('../includes/header.php'); ?>

    <div class="container">
        <h1>Help Center</h1>

        <section class="faq">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-item">
                <h3>How does dropshipping work?</h3>
                <p>Dropshipping is a retail fulfillment method where a store doesn't keep the products it sells in
                    stock. Instead, when a store sells a product, it purchases the item from a third party and has it
                    shipped directly to the customer.</p>
            </div>
            <div class="faq-item">
                <h3>How long does shipping take?</h3>
                <p>Shipping times vary depending on the product and the supplier. Typically, it can take anywhere from
                    7-21 days for products to arrive.</p>
            </div>
            <div class="faq-item">
                <h3>What is your return policy?</h3>
                <p>We offer a 30-day return policy for most items. Please check the specific product page for detailed
                    return information.</p>
            </div>
            <!-- Add more FAQ items as needed -->
        </section>

        <section class="contact-support">
            <h2>Need More Help?</h2>
            <p>Our customer support team is here to assist you. You can reach us through the following methods:</p>
            <ul>
                <li>Email: vengiboopathi@gmail.com</li>
                <li>Phone: 9629872219 </li>
                <li>Live Chat: Available 24/7 on our website</li>
            </ul>
        </section>

    </div>

    <?php include ('../includes/footer.php'); ?>
</body>

</html>