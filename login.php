<?php
 $username = $_POST["username"];
 $password = $_POST["password"];
// database connection
$conn = new mysqli('localhost', 'root', '','login');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    $stmt = $conn->prepare("select * from user where username = ?");
    $stmt ->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt -> get_result();
    
    if($stmt_result -> num_rows > 0) {
        $data = $stmt_result -> fetch_assoc();
        if($data['password']===$password){
            echo"login sucessfully!";
        }

    else  {  echo"<h2> Invalid username or password";
    }
    }else {echo"<h2> Invalid username or password";
        
    }
}

?>