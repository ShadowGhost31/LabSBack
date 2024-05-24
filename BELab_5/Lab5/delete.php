<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=vt221_brv;charset=utf8', 'homeuser', 'homeuser');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];

        $sql = "DELETE FROM tov WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        echo "Record deleted successfully.";
        header('Location: index.php');
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

