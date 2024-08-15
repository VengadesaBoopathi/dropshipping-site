<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dropshipping Website</title>
    <link rel="stylesheet" href="/dropshipping-website/assets/css/style.css">
</head>

<body>
    <header>
        <div class="top-nav">
            <a href="/dropshipping-website/index.php" class="logo">
                <img src="/dropshipping-website/assets/images/logo.jpg" alt="Logo">
            </a>
            <div class="topic">
                <h1>Dropshipping Site</h1>
            </div>
            <div class="search-bar">
                <div class="input">
                    <input type="text" placeholder="Search for products">
                </div>
                <div class="Hbutton">
                    <button type="button">Search</button>
                </div>
                <div class="websocket-connection">
                    <button id="connectWebSocket">Connect to WebSocket</button>
                </div>
            </div>
            <div class="user-menu">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="/dropshipping-website/pages/cart.php">My Cart</a>
                    <a href="/dropshipping-website/pages/logout.php">Logout</a>
                <?php else: ?>
                    <a href="/dropshipping-website/pages/login.php">Login</a>
                    <a href="/dropshipping-website/pages/register.php">Register</a>
                <?php endif; ?>
            </div>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="/dropshipping-website/index.php">Home</a></li>
                <li><a href="/dropshipping-website/pages/products.php">Products</a></li>
                <li><a href="/dropshipping-website/pages/cart.php">Cart</a></li>
                <li><a href="/dropshipping-website/pages/admin.php">Admin</a></li>
                <li><a href="/dropshipping-website/pages/services.php">Services</a></li>
                <li><a href="/dropshipping-website/pages/help.php">Help</a></li>
            </ul>
        </nav>
    </header>



</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#connectWebSocket').click(function () {
            window.open('/dropshipping-website/pages/websocket.php', '_blank');
        });
    });
</script>