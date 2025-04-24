<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['post_id'];
    $new_content = trim($_POST['content']);
    $user_id = $_SESSION['user_id'];

    if (!empty($new_content)) {
        $stmt = $conn->prepare("UPDATE posts SET content = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("sii", $new_content, $post_id, $user_id);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Post updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update post']);
        }
    } else {
        echo json_encode(['message' => 'Post cannot be empty']);
    }
}
?>
