<?php 

session_start();

if(!isset($_SESSION['user'])){
     header('LOCATION: ' . $_SESSION['webserver'] . 'index.php');
}

include( $_SESSION['fileserver'] . 'server/connection.php');

$user = $_POST['user'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$role = $_POST['role'];

$sql_check_duplicate_email = "SELECT user FROM users WHERE email = ? " ;

$conn_statement = $conn->prepare($sql_check_duplicate_email);
$conn_statement->bind_param("s", $email);
$conn_statement->execute();

$result = $conn_statement->get_result();
$conn_statement->close();

if($result->num_rows > 0){
     echo 'exists';
}
else{
    
    $sql_insert_user = "INSERT INTO users VALUES(null, ?, ?, ?, ?)";
    
    $conn_statement = $conn->prepare($sql_insert_user);
    $conn_statement->bind_param("ssss", $user, $password, $email, $role);
    $conn_statement->execute();
    $conn_statement->close();
    
    echo 'added';
    
}
