<?php

session_start();
if(!isset($_SESSION['user'])){
   header('LOCATION: ' . $_SESSION['webserver'] . 'index.php');
}

include( $_SESSION['fileserver'] . 'server/connection.php');

$user = $_POST['user'];
$email = $_POST['email'];
$role = $_POST['role'];
$id = $_POST['id'];

$sql_check_duplicate_email = "SELECT * FROM users WHERE email = ? AND id != ? " ;

$conn_statement = $conn->prepare($sql_check_duplicate_email);
$conn_statement->bind_param("si", $email, $id);
$conn_statement->execute();
$result = $conn_statement->get_result();
$conn_statement->close();

if($result->num_rows > 0){
     echo 'exists';
}
else{
    $sql_update_user = "UPDATE users SET user = ?, email = ?, role = ? WHERE id = ?";
    
    $conn_statement = $conn->prepare($sql_update_user);
    $conn_statement->bind_param("sssi", $user, $email, $role, $id);
    $conn_statement->execute();
    $conn_statement->close();

    echo 'edited';
}
