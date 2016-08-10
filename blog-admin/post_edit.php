<?php

session_start();
if(!isset($_SESSION['user'])){
   header('LOCATION: ' . $_SESSION['webserver'] . 'index.php');
}

include( $_SESSION['fileserver'] . 'server/connection.php');

$post_title = $_POST['post_title'];
$post_content = $_POST['post_content'];
$post_category = $_POST['post_category'];
$post_image = $_POST['post_image'];
$id = $_POST['id'];

$sql_edit_user = "UPDATE posts SET post_title = ?, post_content = ?, post_category = ?, post_image = ? WHERE id = ?";

$conn_statement = $conn->prepare($sql_edit_user);
$conn_statement->bind_param("ssssi", $post_title, $post_content, $post_category, $post_image, $id);
$conn_statement->execute();
$conn_statement->close();

echo 'post edited';
