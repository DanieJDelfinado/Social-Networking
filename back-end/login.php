<?php

require_once 'db.php';
session_start();

 if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ??'';

    if(empty($username) || empty($password)){
        echo "USERNAME  AND PASSWORD ARE REQUIRED,";
        exit;
 }

  $sql = "SELECT id, username, password FROM users WHERE username = ?";
  $stmt = $conn->prepare($sql);


     if($stmt){
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 1){
            $user = $result->fetch_assoc();

            if(password_verify($password, $user["password"])){

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                header('Location: ../front-end/home.php');
                exit;

        }else{
            echo 'Invalid password';
        }
      
     }else{
        echo 'no use found';
     }

     $stmt->close();

} else{
    echo 'Error: '.$conn->error;
}

 }

?>