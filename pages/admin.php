<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adminlogin.php');
    exit;
}

include ('../includes/header.php');
require 'C:\xampp\htdocs\dropshipping-website\vendor\autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Add New Product</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <main class="admin-main">
        <h2>Add New Product</h2>
        <form action="admin.php" method="post" class="admin-form">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>

            <div class="form-group">
                <label for="product_description">Product Description:</label>
                <textarea id="product_description" name="product_description" required></textarea>
            </div>

            <div class="form-group">
                <label for="product_price">Product Price:</label>
                <input type="number" id="product_price" name="product_price" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="product_image_url">Product Image URL:</label>
                <input type="url" id="product_image_url" name="product_image_url" required>
            </div>

            <input type="submit" value="Add Product" class="btn-submit">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $productName = $_POST['product_name'];
            $productDescription = $_POST['product_description'];
            $productPrice = $_POST['product_price'];
            $productImageUrl = $_POST['product_image_url'];

            include ('../includes/db.php');
            $sql = "INSERT INTO products (name, description, price, image_url) VALUES ('$productName', '$productDescription', '$productPrice', '$productImageUrl')";
            if ($conn->query($sql) === TRUE) {
                echo "<p class='success-message'>The product has been added successfully.</p>";

                $productDetails = "Name: $productName, Description: $productDescription, Price: $productPrice, Image URL: $productImageUrl" . PHP_EOL;
                $filePath = 'products.txt';
                if (file_put_contents($filePath, $productDetails, FILE_APPEND | LOCK_EX)) {
                    echo "<p class='success-message'>Product details saved to file successfully.</p>";
                } else {
                    echo "<p class='error-message'>Failed to save product details to file.</p>";
                }

                // Prepare email using PHPMailer
                $mail = new PHPMailer(true);
                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'vengiboopathi@gmail.com';  
                    $mail->Password = 'wyto oitm wdcy vkui';  
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;

                    
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    // Recipients
                    $mail->setFrom('vengiboopathi@gmail.com', 'Webmaster');
                    $mail->addAddress('vengiboopathi@gmail.com');

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = "New Product Added: " . $productName;
                    $mail->Body = "
            <html>
            <head>
            <title>New Product Details</title>
            </head>
            <body>
            <p>A new product has been added:</p>
            <table>
            <tr><th>Product Name</th><td>$productName</td></tr>
            <tr><th>Description</th><td>$productDescription</td></tr>
            <tr><th>Price</th><td>$$productPrice</td></tr>
            <tr><th>Image URL</th><td><a href='$productImageUrl'>$productImageUrl</a></td></tr>
            </table>
            </body>
            </html>
            ";

                    $mail->send();
                    echo "<p class='success-message'>Email notification sent successfully.</p>";
                } catch (Exception $e) {
                    echo "<p class='error-message'>Failed to send email notification. Mailer Error: {$mail->ErrorInfo}</p>";
                }
            } else {
                echo "<p class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
            $conn->close();
        }
        ?>
    </main>
    <?php include ('../includes/footer.php'); ?>
</body>

</html>
