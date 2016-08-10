<?php 

//makes the server php session array available
session_start();

// checks if user is set in session array, if not redirects to homepage
if(!isset($_SESSION['user'])){
     header('LOCATION: ' . $_SESSION['webserver'] . 'index.php');
}

// includes AND runs the code to connect to the SQL server
include( $_SESSION['fileserver'] . 'server/connection.php');

// grab $id from $_POST array sent from browser
$id = $_POST['id'];

// SQL statement to DELETE user with specific id
$delete_post = 'DELETE FROM posts where id = ?';

// stuff that stops SQL injection!
// prepare statement with 'hole' ready for id variable where the question mark is
$conn_statement = $conn->prepare($delete_post);

// scrubs the $id variable, makes sure it is an integer, puts it into the prepared statement
$conn_statement->bind_param('i', $id);

// fire it off to the mysql server
$conn_statement->execute();

// close connection
$conn_statement->close();

// send back to the browser a response
echo 'delete';
