<?php 

    // makes the server php session array available
    session_start();

    // checks if user is set in session array, if not redirects to homepage
    if(!isset($_SESSION['user'])){
        header('LOCATION: ' . $_SESSION['webserver'] . 'index.php');
    }

    // includes AND runs the header fragment
    include($_SESSION['fileserver'] . 'fragments/header.php'); 

?>

<!--includes all the ADMIN js-->
<script src="<?php echo $_SESSION['webserver']; ?>admin/js/user_select.js"></script>
<script src="<?php echo $_SESSION['webserver']; ?>admin/js/user_add.js"></script>
<script src="<?php echo $_SESSION['webserver']; ?>admin/js/user_delete.js"></script>
<script src="<?php echo $_SESSION['webserver']; ?>admin/js/user_edit.js"></script>
<script src="<?php echo $_SESSION['webserver']; ?>admin/js/javascript.js"></script>


<h1>Admin page</h1>

<h2>Current users</h2>

<table id="users"></table>

<h2>Add new user</h2>

<div id="error_message"></div>

<div id='new_user_form'>
    <input type="text" id="user" placeholder="user name" value="bob">
    <input type="email" id="email" placeholder="email">
    <input type="text" id="role" placeholder="role" value="admin">
    <input type="text" id="password" placeholder="password" value="bobby">
    <button id="user_add">add user</button>
</div>

<!--includes AND runs the footer php-->
<?php include($_SESSION['fileserver'] . 'fragments/footer.php'); ?>
