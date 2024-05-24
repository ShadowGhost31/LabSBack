<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "managment";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Отримання списку користувачів
$sql = "SELECT name, email FROM users";
$result = $conn->query($sql);

$userList = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $userList[] = $row;
    }
}

$conn->close();

// Повернення списку користувачів у форматі JSON
echo json_encode($userList);
?>
