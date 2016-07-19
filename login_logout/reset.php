<?php
    // tells php to load session variable cookie
    session_start();
    // unset all session variables
    session_unset();

    //redirect to homepage
    header('LOCATION: ../index.php');
