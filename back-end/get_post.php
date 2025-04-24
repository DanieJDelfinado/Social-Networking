<?php
require_once 'db.php';

$query = "SELECT posts.content, posts.created_at, users.username 
          FROM posts 
          JOIN users ON posts.user_id = users.id 
          ORDER BY posts.created_at DESC";

$result = $conn->query($query);

$posts = [];

while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

header('Content-Type: application/json');
echo json_encode($posts);
?>
