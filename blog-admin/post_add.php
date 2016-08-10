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

$post_title = $_POST['post_title'];
$post_content = $_POST['post_content'];
$post_category = $_POST['post_category'];
$post_image = $_POST['post_image'];

$sql_insert_blog = "INSERT INTO posts VALUES(null, ?, ?, now(), ?, ?)";

$conn_statement = $conn->prepare($sql_insert_blog);
// cleans and binds FOUR strings
$conn_statement->bind_param("ssss", $post_title, $post_content, $post_category, $post_image);
$conn_statement->execute();
$conn_statement->close();

// send back to browser a message.
echo 'added';
