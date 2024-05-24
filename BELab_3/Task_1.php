<?php

if (isset($_GET['size'])) {
    $size = $_GET['size'];
    switch ($size) {
        case 'large':
            $fontSize = '24px';
            break;
        case 'medium':
            $fontSize = '18px';
            break;
        case 'small':
            $fontSize = '14px';
            break;
        default:
            $fontSize = 'medium';
            break;
    }

    setcookie('fontSize', $fontSize, time() + (86400 * 30), '/');//30 днів
} else {

    $fontSize = isset($_COOKIE['fontSize']) ? $_COOKIE['fontSize'] : 'medium';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Font Size Example</title>
    <style>
        body {
            font-size: <?php echo $fontSize; ?>;
        }
    </style>
</head>
<body>
<h1>Choose Font Size:</h1>
<ul>
    <li><a href="?size=large">Large Font</a></li>
    <li><a href="?size=medium">Medium Font</a></li>
    <li><a href="?size=small">Small Font</a></li>
</ul>
</body>
</html>
