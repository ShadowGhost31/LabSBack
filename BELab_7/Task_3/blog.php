<?php
session_start();
include 'db.php';

$posts = $conn->query("SELECT * FROM posts");

while ($post = $posts->fetch_assoc()) {
    echo "<div>";
    echo "<p>{$post['content']}</p>";
    echo "<small>Автор: {$post['username']}</small>";
    echo "</div>";
}
?>