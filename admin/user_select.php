<?php 

session_start();
if(!isset($_SESSION['user'])){
     header('LOCATION: ' . $_SESSION['webserver'] . 'index.php');
}

include( $_SESSION['fileserver'] . 'server/connection.php');

$get_users = 'SELECT * FROM users ORDER BY email';

$conn_statement = $conn->prepare($get_users);
$conn_statement->execute();

$result = $conn_statement->get_result();
$conn_statement->close();

while($row = $result->fetch_assoc()){
    $output[] = $row;
}

echo json_encode($output);
