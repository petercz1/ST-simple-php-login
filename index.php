<?php 

session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>my super secure website</title>
</head>
<body>
   <header>
     
      <?php      
       
       if( isset($_SESSION['user'])   ){
           include('login_logout/logout.php');
       }
       else{
           include('login_logout/login.php');
       }
       ?>
      
      
      
       IF (LOGGED IN) - SHOW LOGOUT STUFF
       ELSE SHOW LOGIN STUFF
   </header>
   
    <h1>Welcome, losers</h1>
    
    <ul>
        <li><a href="#">home</a></li>
        <li><a href="#">stuff</a></li>
        IF (LOGGED IN)
        <li><a href="admin/">admin page</a></li>
        END IF
    </ul>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, magni soluta vel dolores iste libero repellendus accusantium autem, laborum, ipsum dignissimos rerum aliquam ipsa animi quis! Rerum aut voluptatem maiores.</p>
</body>
</html>