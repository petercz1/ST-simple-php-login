<?php
//fill in these details for your copy of mysql
//rename to connection.php

// mysql server variables to connect to db
$servername = "*****";
$username = "*****";
$password = "*****";
$db = '*****';

// make a sql connection object
$connection_to_database = new mysqli($servername, $username, $password, $db);

// Check connection
if ($connection_to_database->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// uncomment to check connection
//echo "Connected successfully";