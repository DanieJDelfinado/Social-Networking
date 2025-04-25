<?php

session_start();
require_once 'db.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Query to fetch all posts with user_id
$query = "
SELECT 
    posts.id,
    posts.user_id,  -- Make sure user_id is included in the SELECT
    posts.content,
    posts.created_at,
    users.username,
    (SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id) AS like_count,
    (SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id AND likes.user_id = ?) AS liked
FROM posts
JOIN users ON posts.user_id = users.id
ORDER BY posts.created_at DESC
";

// Prepare statement
$stmt = $conn->prepare($query);

// Check if preparation is successful
if (!$stmt) {
    echo json_encode(['error' => 'Query preparation failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("i", $user_id); // Bind user_id as parameter
$stmt->execute();

// Check for execution errors
if ($stmt->error) {
    echo json_encode(['error' => 'Query execution failed: ' . $stmt->error]);
    exit;
}

$result = $stmt->get_result();

$posts = [];

while ($row = $result->fetch_assoc()) {
    // Ensure user_id is included in the results
    $posts[] = [
        'id' => $row['id'],
        'user_id' => $row['user_id'], // Ensure user_id is fetched properly
        'username' => $row['username'],
        'content' => $row['content'],
        'created_at' => $row['created_at'],
        'like_count' => $row['like_count'],
        'liked' => $row['liked'] > 0
    ];
}

header('Content-Type: application/json');
echo json_encode($posts);

?>