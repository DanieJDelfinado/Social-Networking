<?php
session_start();
require_once 'db.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["message" => "User not logged in"]);
    exit;
}

if (isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    // Secure delete - only the owner can delete
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $post_id, $_SESSION['user_id']);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Post deleted successfully"]);
    } else {
        echo json_encode(["message" => "Failed to delete post"]);
    }

    $stmt->close();
} else {
    echo json_encode(["message" => "Invalid request"]);
}
?>
