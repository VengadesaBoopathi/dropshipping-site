<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="/dropshipping-website/assets/css/style.css">
</head>

<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form action="adminlogin.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Login" class="btn-submit">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $validUsername = 'admin';
            $validPassword = 'password123';

            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username === $validUsername && $password === $validPassword) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header('Location: admin.php');
                exit;
            } else {
                echo "<p class='error-message'>Invalid username or password.</p>";
            }
        }
        ?>
    </div>
</body>

</html>