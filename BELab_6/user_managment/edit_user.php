<?php



if (isset($_POST['id']) && isset($_POST['name'])) {
    $id = $_POST['id'];
    $newName = $_POST['name'];

    // Підключення до бази даних
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "managment";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Перевірка з'єднання з базою даних
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Оновлення імені користувача в базі даних
    $sql = "UPDATE users SET name='$newName' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $response = array("success" => true, "message" => "User name updated successfully");
    } else {
        $response = array("success" => false, "message" => "Error updating user name: " . $conn->error);
    }

    $conn->close();
} else {
    $response = array("success" => false, "message" => "ID and name are required");
}

echo json_encode($response);
?>
