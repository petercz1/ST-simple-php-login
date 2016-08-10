<?php
//makes the server php session array available
session_start();

// checks if user is set in session array, if not redirects to homepage
if(!isset($_SESSION['user'])){
   header('LOCATION: ' . $_SESSION['webserver'] . 'index.php');
}

// includes AND runs the code to connect to the SQL server
include( $_SESSION['fileserver'] . 'server/connection.php');

// grab variables from $_POST array sent from browser
$user = $_POST['user'];
$email = $_POST['email'];
$role = $_POST['role'];
$id = $_POST['id'];

// FIRST SQL STATEMENT: check for existing email but NOT for current user
$sql_check_duplicate_email = "SELECT * FROM users WHERE email = ? AND id != ? " ;

// prepare, clean & bind variables, execute, grab result, close
$conn_statement = $conn->prepare($sql_check_duplicate_email);
$conn_statement->bind_param("si", $email, $id);
$conn_statement->execute();
$result = $conn_statement->get_result();
$conn_statement->close();

// if user is returned, email exists!
if($result->num_rows > 0){
     echo 'exists';
}
else{
    // SECOND SQL STATEMENT: UPDATE user
    $sql_update_user = "UPDATE users SET user = ?, email = ?, role = ? WHERE id = ?";
    
    $conn_statement = $conn->prepare($sql_update_user);
    $conn_statement->bind_param("sssi", $user, $email, $role, $id);
    $conn_statement->execute();
    $conn_statement->close();

    echo 'edited';
}
