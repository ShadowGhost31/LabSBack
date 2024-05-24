<?php



if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "managment";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Перевірка з'єднання з базою даних
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Підготовка SQL-запиту для перевірки наявності користувача з введеними даними
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    // Перевірка, чи був знайдений користувач з введеними даними
    if ($result->num_rows > 0) {
        $response = array("success" => true, "message" => "Login successful");
    } else {
        $response = array("success" => false, "message" => "Incorrect email or password");
    }

    $conn->close();
} else {
    $response = array("success" => false, "message" => "Email and password are required");
}

echo json_encode($response);
?>
