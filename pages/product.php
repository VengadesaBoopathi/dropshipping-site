<?php include('../includes/header.php'); ?>
<main>
    <?php
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        include('../includes/db.php');
        $sql = "SELECT * FROM products WHERE id=$productId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='product-detail'>";
                echo "<img src='" . $row['image_url'] . "' alt='" . $row['name'] . "'>";
                echo "<h2>" . $row['name'] . "</h2>";
                echo "<p>" . $row['description'] . "</p>";
                echo "<p>$" . $row['price'] . "</p>";
                echo "<form action='add_to_cart.php' method='POST'>";
                echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
                echo "<input type='number' name='quantity' value='1' min='1'>";
                echo "<button type='submit'>Add to Cart</button>";
                echo "</form>";
  
                echo "</div>";
            }
        } else {
            echo "Product not found.";
        }
        $conn->close();
    } else {
        echo "No product selected.";
    }
    ?>
</main>
<?php include('../includes/footer.php'); ?>
