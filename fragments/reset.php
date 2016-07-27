<?php
    // tells php to load session variable cookie
    session_start();
    // unset user variable
    $_SESSION['user'] = null;

    //redirect to homepage
    header('LOCATION: ' . $_SESSION['webserver'] . 'index.php');
