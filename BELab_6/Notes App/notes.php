<?php
include 'db.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $result = $conn->query("SELECT * FROM notes ORDER BY created_at DESC");
        $notes = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($notes);
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $title = $conn->real_escape_string($data['title']);
        $content = $conn->real_escape_string($data['content']);
        $conn->query("INSERT INTO notes (title, content) VALUES ('$title', '$content')");
        echo json_encode(['message' => 'Note added successfully']);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        $id = (int)$data['id'];
        $title = $conn->real_escape_string($data['title']);
        $content = $conn->real_escape_string($data['content']);
        $conn->query("UPDATE notes SET title='$title', content='$content' WHERE id=$id");
        echo json_encode(['message' => 'Note updated successfully']);
        break;

    case 'DELETE':
        $id = (int)$_GET['id'];
        $conn->query("DELETE FROM notes WHERE id=$id");
        echo json_encode(['message' => 'Note deleted successfully']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method not allowed']);
        break;
}
?>
