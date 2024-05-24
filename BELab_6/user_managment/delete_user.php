<?php



if (isset($_POST['id'])) {
    $id = $_POST['id'];

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

    // Видалення користувача з бази даних
    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $response = array("success" => true, "message" => "User deleted successfully");
    } else {
        $response = array("success" => false, "message" => "Error deleting user: " . $conn->error);
    }

    $conn->close();
} else {
    $response = array("success" => false, "message" => "ID is required");
}

echo json_encode($response);
?>
