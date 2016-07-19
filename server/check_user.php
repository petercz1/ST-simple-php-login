<?php 

session_start();

include('connection.php');

$user = $_POST['user'];
$password = $_POST['password'];

$sql_login_check = "SELECT * FROM users WHERE user='".$user."' AND `password` = '".md5($password)."'";

//echo $sql_login_check;

$result = $connection_to_database->query($sql_login_check);

if( $result->num_rows == 1 ){
    
    $_SESSION['user'] = $user;
    
}

header('LOCATION: ../index.php');

