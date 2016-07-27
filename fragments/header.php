<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>php full-stack demo with login</title>
    
    <script src="https://code.jquery.com/jquery-3.0.0.min.js" integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0=" crossorigin="anonymous"></script>
    
</head>

<body>
    <header>

        <?php      
       // if user is set in session cookie, show logout page
       // as you are logged in!!
       if( isset($_SESSION['user'])   ){
           include('logout.php');
       }
       else{
           // not logged in so show login html
           include('login.php');
       }
       ?>
    </header>

    <ul>
        <li><a href="<?php echo $_SESSION['webserver']; ?>">home</a></li>
        <li><a href="<?php echo $_SESSION['webserver']; ?>blog/">blog</a></li>

        <?php 
        //if user variable in session cookie is set, show <li> link
        if(isset($_SESSION['user'])){  ?>

        <li><a href="<?php echo $_SESSION['webserver']; ?>admin/">admin page</a></li>

        <?php   } ?>

    </ul>
