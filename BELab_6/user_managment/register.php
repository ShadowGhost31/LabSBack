<?php


// Перевірка, чи всі поля заповнені
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Перевірка унікальності email та мінімальної довжини пароля
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 6) {
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

        // Перевірка наявності користувача з такою ж email-адресою в базі даних
        $check_query = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($check_query);
        if ($result->num_rows > 0) {
            $response = array("success" => false, "message" => "User with this email already exists");
        } else {
            // Збереження нового користувача в базі даних
            $insert_query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            if ($conn->query($insert_query) === TRUE) {
                $response = array("success" => true, "message" => "User registered successfully");
            } else {
                $response = array("success" => false, "message" => "Error: " . $insert_query . "<br>" . $conn->error);
            }
        }

        $conn->close();
    } else {
        $response = array("success" => false, "message" => "Invalid email or password (password should be at least 6 characters long)");
    }
} else {
    $response = array("success" => false, "message" => "All fields are required");
}

echo json_encode($response);
?>
