<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ob_start();
    $post_content = $_POST['content'];
    $username = $_SESSION['username'];
    echo $post_content;
    $output = ob_get_contents();
    ob_end_clean();
    $conn->query("INSERT INTO posts (content, username) VALUES ('$output', '$username')");
    header('Location: blog.php');
    exit;
}
?>

<form method="POST" action="add_post.php">
    Новий запис: <textarea name="content"></textarea><br>
    <input type="submit" value="Додати">
</form>