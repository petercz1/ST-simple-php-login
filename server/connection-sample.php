<?php
//fill in these details for your copy of mysql
//rename to connection.php
$servername = "*****";
$username = "*****";
$password = "*****";
$db = '*****';

// Create connection
$connection_to_database = new mysqli($servername, $username, $password, $db);

// Check connection
if ($connection_to_database->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";