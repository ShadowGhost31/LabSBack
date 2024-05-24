<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $username = $_SESSION['username'];
    $conn->query("INSERT INTO orders (product_id, username) VALUES ('$product_id', '$username')");
    http_response_code(303);
    header('Location: confirmation.php');
    exit;
}
?>

<form method="POST" action="order.php">
    Оберіть товар:
    <select name="product_id">
        <?php
        $products = $conn->query("SELECT * FROM products");
        while ($product = $products->fetch_assoc()) {
            echo "<option value='{$product['id']}'>{$product['name']}</option>";
        }
        ?>
    </select>
    <input type="submit" value="Замовити">
</form>