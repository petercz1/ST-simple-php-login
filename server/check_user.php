<?php 
    // tells php to load session variable cookie
    session_start();

    // loads php to make db connection
    include('connection.php');

    // create 2 php variables ie start with a $
    // $user grabs the field labelled 'user' from the form
    $user = $_POST['user'];
    // $password grabs the field labelled 'password' from the form
    $password = $_POST['password'];

    //builds a sql string
    $sql_login_check = "SELECT * FROM users WHERE user='".$user."' AND `password` = '".md5($password)."'";
    // uncomment to check sql string
     //echo $sql_login_check.'<br>';

    // create a php variable and dump the sql results into it
    $result = $connection_to_database->query($sql_login_check);

// checks if a single row is returned
// note - at the moment doesn't check what type of user!
if( $result->num_rows == 1 ){
    
    // sets 'user' variable in session cookie to user
    $_SESSION['user'] = $user;
    
}

//header('LOCATION: ../index.php');

