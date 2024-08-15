<?php
session_start();
include('../includes/db.php');  // Ensure the database connection is available

if (!isset($_SESSION['user_id'])) {
    header('Location: /dropshipping-website/pages/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['user_id'];


     echo "Product ID: " . $product_id . "<br>";
     echo "Quantity: " . $quantity . "<br>";
 

    $product_check_sql = "SELECT id FROM products WHERE id = ?";
    $product_check_stmt = $conn->prepare($product_check_sql);
    $product_check_stmt->bind_param('i', $product_id);
    $product_check_stmt->execute();
    $product_check_result = $product_check_stmt->get_result();
    
    if ($product_check_result->num_rows > 0) {
        // Prepare and execute the SQL statement to insert into cart
        $sql = "INSERT INTO cart (product_id, user_id, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iii', $product_id, $user_id, $quantity);

        if ($stmt->execute()) {
            header('Location: cart.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: Product ID does not exist.";
    }
}
?>
