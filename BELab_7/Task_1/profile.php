<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

echo "Ласкаво просимо, " . $_SESSION['username'] . "!<br>";
if (isset($_SESSION['messages'])) {
    echo $_SESSION['messages'];
    unset($_SESSION['messages']);
}
?>