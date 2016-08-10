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
$password = md5($_POST['password']);
$email = $_POST['email'];
$role = $_POST['role'];

// FIRST SQL STATEMENT: check for existing email
$sql_check_duplicate_email = "SELECT user FROM users WHERE email = ? " ;

// prepare sql statement, clean & bind email, execute
$conn_statement = $conn->prepare($sql_check_duplicate_email);
$conn_statement->bind_param("s", $email);
$conn_statement->execute();

// grab results
$result = $conn_statement->get_result();
// close connection
$conn_statement->close();

// if more than 0 rows returned then email exists!
if($result->num_rows > 0){
     echo 'exists';
}
else{
    // SECOND SQL STATEMENT: if email doesn't exits then insert!
    $sql_insert_user = "INSERT INTO users VALUES(null, ?, ?, ?, ?)";
    
    $conn_statement = $conn->prepare($sql_insert_user);
    // cleans and binds FOUR strings
    $conn_statement->bind_param("ssss", $user, $password, $email, $role);
    $conn_statement->execute();
    $conn_statement->close();
    
    // send back to browser a message.
    echo 'added';
    
}
