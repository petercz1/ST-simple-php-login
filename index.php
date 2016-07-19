<?php 
    // tells php to load session variable cookie
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
       // if user is set in session cookie, show logout page
       // as you are logged in!!
       if( isset($_SESSION['user'])   ){
           include('login_logout/logout.php');
       }
       else{
           // not logged in so show login html
           include('login_logout/login.php');
       }
       ?>
   </header>
   
    <h1>Welcome, losers</h1>
    
    <ul>
        <li><a href="#">home</a></li>
        <li><a href="#">stuff</a></li>
        
        <?php 
        //if user variable in session cookie is set, show <li> link
        if(isset($_SESSION['user'])){  ?>
               
        <li><a href="admin/">admin page</a></li>
    
        <?php   } ?>
        
    </ul>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, magni soluta vel dolores iste libero repellendus accusantium autem, laborum, ipsum dignissimos rerum aliquam ipsa animi quis! Rerum aut voluptatem maiores.</p>
</body>
</html>