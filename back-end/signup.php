<?php

require_once ('db.php');

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';


    if(empty($username) || empty($password) || empty($email) || empty($confirm_password)) {
        echo "All fields are required.";
        exit;
    }

    if($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($sql);

      if($stmt){

        $stmt->bind_param("sss", $username, $email, $hashedPassword);
      
        if($stmt->execute()){
            echo "User registered successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();



    
    } else {    
        echo "Error: " . $conn->error;
    }
   }
?>