<div>
<!--   echoes session user variable-->
    Welcome <?php echo $_SESSION['user']; ?> - you are logged in
    
<!--    runs reset.php-->
    <form action="<?php echo $_SESSION['webserver']; ?>fragments/reset.php">
       
        <input type="submit" value='logout'>
        
    </form>
    
</div>