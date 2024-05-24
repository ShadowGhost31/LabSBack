<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=vt221_brv;charset=utf8', 'homeuser', 'homeuser');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $kol = $_POST['kol'];
        $date = $_POST['date'];

        $sql = "INSERT INTO tov (name, cost, kol, date) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $cost, $kol, $date]);

        echo "Record added successfully.";
        header('Location: index.php');
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
