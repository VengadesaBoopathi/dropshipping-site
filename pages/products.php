<?php
include ('../includes/header.php');

class ProductHandler
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "1234";
    private $dbname = "phpproject";
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function fetchProducts()
    {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);

        echo "<section>";
        echo "<h2>Local Products</h2>";
        echo "<div class='product-cards'>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product-card'>";
                echo "<div class ='img'>";
                echo "<a href='product.php?id=" . $row['id'] . "'>";
                echo "<img src='" . $row['image_url'] . "' alt='" . $row['name'] . "'>";
                echo "</div>";
                echo "<div class='producttopic' >";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No products available.";
        }

        echo "</div>";
        echo "</section>";
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}

function fetchProductsFromApi()
{
    $query = 'sneakers';
    $url = "https://api.unsplash.com/search/photos?query=sneakers&client_id=YGeWN_Zm2xm_1y9zq7WPSb2M5-SNy6ALiyERWUEc4XE";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    curl_close($ch);

    return json_decode($response, true);
}


$productHandler = new ProductHandler();
$productHandler->fetchProducts();

$apiResponse = fetchProductsFromApi();
$apiProducts = $apiResponse['results'] ?? [];


echo "<section>";
echo "<h2>  Products From Api </h2>";
echo "<div class='product-cards'>";

if (!empty($apiProducts)) {
    foreach ($apiProducts as $product) {
        echo "<div class='product-card'>";
        echo "<a href='" . $product['links']['html'] . "' target='_blank'>";
        echo "<img src='" . $product['urls']['small'] . "' alt='" . $product['description'] . "'>";
        echo "<h3>" . $product['description'] . "</h3>";
        echo "</a>";
        echo "</div>";
    }
} else {
    echo "No products available from API.";
}

echo "</div>";
echo "</section>";

include ('../includes/footer.php');
?>