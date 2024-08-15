<?php
session_start();
include('../includes/db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: /dropshipping-website/pages/login.php');
    exit();
}

$order_id = $_GET['order_id'];

$sql = "SELECT o.*, oi.*, p.name
        FROM orders o
        JOIN order_items oi ON o.id = oi.order_id
        JOIN products p ON oi.product_id = p.id
        WHERE o.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <link rel="stylesheet" type="text/css" href="/dropshipping-website/assets/css/style.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container">
    <h2>Order Confirmation</h2>
    <p>Thank you for your order! Here are the details:</p>

    <h3>Order ID: <?php echo $order['id']; ?></h3>

    <h3>Order Items</h3>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        <?php
        $order_total = 0;
        do {
            $total = $order['quantity'] * $order['price'];
            echo "<tr>";
            echo "<td>" . $order['name'] . "</td>";
            echo "<td>" . $order['quantity'] . "</td>";
            echo "<td>$" . number_format($order['price'], 2) . "</td>";
            echo "<td>$" . number_format($total, 2) . "</td>";
            echo "</tr>";
            $order_total += $total;
        } while ($order = $result->fetch_assoc());
        ?>
        <tr>
            <td colspan="3">Order Total</td>
            <td>$<?php echo number_format($order_total, 2); ?></td>
        </tr>
    </table>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
