<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = isset($_SESSION['login']) ? $_SESSION['login'] : '';
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
    $city = isset($_SESSION['city']) ? $_SESSION['city'] : '';
    $favorite_games = isset($_SESSION['favorite_games']) ? $_SESSION['favorite_games'] : [];
    $about = isset($_SESSION['about']) ? $_SESSION['about'] : '';
    $photo = isset($_SESSION['photo']) ? $_SESSION['photo'] : '';


    echo "<h1>User Information:</h1>";
    echo "<p><strong>Login:</strong> $login</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>City:</strong> $city</p>";
    echo "<p><strong>Favorite Games:</strong> " . implode(", ", $favorite_games) . "</p>";
    echo "<p><strong>About:</strong> $about</p>";
    if (!empty($photo)) {
        echo "<p><strong>Photo:</strong> <img src='$photo' alt='User Photo' style='max-width: 200px;'></p>";
    }
} else {
    echo "No data submitted.";
}
?>
