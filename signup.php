<?php
 $username = $_POST["username"];
 $password = $_POST["password"];
// database connection
$conn = new mysqli('localhost', 'root', '','login');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    $stmt = $conn->prepare("insert into user(username,password)values(?,?)");
    $stmt ->bind_param("ss", $username, $password);
    $stmt->execute();
    echo"Sign up Successfully...";
    $stmt -> close();
    $conn ->close();
}