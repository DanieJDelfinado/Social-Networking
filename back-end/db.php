<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'practice1';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed". $conn->connect_error);  
} else {    
     // echo 'Connected successfully';  
}




?>