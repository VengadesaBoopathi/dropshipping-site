<?php
session_start();
include('../includes/db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: /dropshipping-website/pages/login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT c.*, p.name, p.price, (c.quantity * p.price) AS total
        FROM cart c
        JOIN products p ON c.product_id = p.id
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="/dropshipping-website/assets/css/style.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container">
    <h2>Your Cart</h2>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        <?php
        $cart_total = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>$" . number_format($row['price'], 2) . "</td>";
            echo "<td>$" . number_format($row['total'], 2) . "</td>";
            echo "</tr>";
            $cart_total += $row['total'];
        }
        ?>
        <tr>
            <td colspan="3">Cart Total</td>
            <td>$<?php echo number_format($cart_total, 2); ?></td>
        </tr>
    </table>

    <?php if ($cart_total > 0): ?>
        <form action="place_order.php" method="POST">
            <button type="submit">Place Order</button>
        </form>
    <?php endif; ?>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
