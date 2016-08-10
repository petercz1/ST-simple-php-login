<?php 

//makes the server php session array available
session_start();

// checks if user is set in session array, if not redirects to homepage
if(!isset($_SESSION['user'])){
     header('LOCATION: ' . $_SESSION['webserver'] . 'index.php');
}

// includes AND runs the code to connect to the SQL server
include( $_SESSION['fileserver'] . 'server/connection.php');

// simple SQL statement to grab all users sorted by email
$get_posts = 'SELECT * FROM posts ORDER BY post_date DESC';

// stuff that stops SQL injection!
// prepare statement
$conn_statement = $conn->prepare($get_posts);
// fire it off
$conn_statement->execute();

// get results
$result = $conn_statement->get_result();
// close SQL server connection
$conn_statement->close();

// keep checking for rows
while($row = $result->fetch_assoc()){
    // add row to $output array
    $output[] = $row;
}

// code it as JSON and fire it back to the browser
echo json_encode($output);
