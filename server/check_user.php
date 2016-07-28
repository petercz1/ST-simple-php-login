<?php
// tells php to load session variable cookie
session_start();

// loads php to make db connection
include('connection.php');

// create 2 php variables ie start with a $
// $user grabs the field labelled 'user' from the form
$user = $_POST['user'];
// $password grabs the field labelled 'password' from the form
$password = md5($_POST['password']);

//builds a sql string
$sql_login_check = "SELECT * FROM users WHERE user= ? AND `password` = ?";

// prepares the sql command, sticks the variables in after cleaning, then executes
$conn_statement = $conn->prepare($sql_login_check);
$conn_statement->bind_param('ss', $user, $password);
$conn_statement->execute();

// grab results in a php variable and close the db connection
$result = $conn_statement->get_result();
$conn_statement->close();

// checks if a single row is returned
// note - at the moment doesn't check what type of user!
if ($result->num_rows == 1) {
    // sets 'user' variable in session cookie to user
    $_SESSION['user'] = $user;
}

// redirect to home page with $_SESSION['user'] set to user name
header('LOCATION: ' . $_SESSION['webserver'] . 'index.php');
