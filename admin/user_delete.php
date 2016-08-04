<?php 

session_start();
if(!isset($_SESSION['user'])){
     header('LOCATION: ' . $_SESSION['webserver'] . 'index.php');
}

include( $_SESSION['fileserver'] . 'server/connection.php');

$id = $_POST['id'];

$delete_user = 'DELETE FROM users where id = ?';

$conn_statement = $conn->prepare($delete_user);

$conn_statement->bind_param('i', $id);

$conn_statement->execute();

$conn_statement->close();

echo 'delete';