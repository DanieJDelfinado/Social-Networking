<?php
session_start();
require_once 'db.php'; // Adjust path as needed

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = trim($_POST['content']);

    if (!empty($content)) {
        $user_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("INSERT INTO posts (user_id, content) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $content);

        if ($stmt->execute()) {
            header("Location: ../front-end/home.php"); // redirect after posting
        } else {
            echo "Error posting: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Post cannot be empty.";
    }
}
?>
