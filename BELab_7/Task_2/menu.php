<?php
session_start();
include 'db.php';

ob_start();

$menu_items = $conn->query("SELECT * FROM menu");

echo "<ul>";
while ($item = $menu_items->fetch_assoc()) {
    echo "<li>{$item['name']}</li>";
}
echo "</ul>";

if (isset($_POST['new_item'])) {
    $new_item = $_POST['new_item'];
    $conn->query("INSERT INTO menu (name) VALUES ('$new_item')");
    ob_clean();
    header('Location: menu.php');
    exit;
}

if (isset($_POST['delete_item'])) {
    $delete_item = $_POST['delete_item'];
    $conn->query("DELETE FROM menu WHERE name='$delete_item'");
    ob_clean();
    header('Location: menu.php');
    exit;
}

$output = ob_get_contents();
ob_end_clean();
echo $output;
?>

<form method="POST" action="menu.php">
    Додати пункт: <input type="text" name="new_item">
    <input type="submit" value="Додати">
</form>
<form method="POST" action="menu.php">
    Видалити пункт: <input type="text" name="delete_item">
    <input type="submit" value="Видалити">
</form>