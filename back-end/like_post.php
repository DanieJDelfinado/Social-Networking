<?php
session_start();
require_once 'db.php';

$user_id = $_SESSION['user_id'];
$post_id = $_POST['post_id'];

$query = "SELECT * FROM likes WHERE user_id = ? AND post_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ii', $user_id, $post_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Unlike
    $delete = $conn->prepare("DELETE FROM likes WHERE user_id = ? AND post_id = ?");
    $delete->bind_param('ii', $user_id, $post_id);
    $delete->execute();
    echo json_encode(['status' => 'unliked']);
} else {
    // Like
    $insert = $conn->prepare("INSERT INTO likes (user_id, post_id) VALUES (?, ?)");
    $insert->bind_param('ii', $user_id, $post_id);
    $insert->execute();
    echo json_encode(['status' => 'liked']);
}
?>
