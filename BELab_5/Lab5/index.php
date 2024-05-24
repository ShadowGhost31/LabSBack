<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=vt221_brv;charset=utf8', 'homeuser', 'homeuser');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h1>Товари</h1>";
    $sql = "SELECT * FROM tov";
    $result = $pdo->query($sql);

    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Cost</th>
                <th>Quantity</th>
                <th>Date</th>
            </tr>";

    foreach ($result as $row) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['cost']."</td>
                <td>".$row['kol']."</td>
                <td>".$row['date']."</td>
              </tr>";
    }

    echo "</table>";

    echo '<form method="post" action="delete.php">
            <input type="text" name="id" placeholder="ID to delete">
            <button type="submit">Delete</button>
          </form>';

    echo '<form method="get" action="insert.php">
            <button type="submit">Add Record</button>
          </form>';

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
