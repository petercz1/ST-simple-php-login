<!-- runs check_user.php when submitted-->
<!-- rename to login.php -->
<form action='<?php echo $_SESSION['webserver']; ?>server/check_user.php' method='post'>
    <input type='text' name='user'>
    <input type='password' name='password'>
    <input type='submit' value='login'>
</form>
