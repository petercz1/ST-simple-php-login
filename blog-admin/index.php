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
<script src="<?php echo $_SESSION['webserver']; ?>blog-admin/js/post_select.js"></script>
<script src="<?php echo $_SESSION['webserver']; ?>blog-admin/js/post_add.js"></script>
<script src="<?php echo $_SESSION['webserver']; ?>blog-admin/js/post_delete.js"></script>
<script src="<?php echo $_SESSION['webserver']; ?>blog-admin/js/post_edit.js"></script>
<script src="<?php echo $_SESSION['webserver']; ?>blog-admin/js/javascript.js"></script>


<h1>Blog admin page</h1>

<div id='new_post_form'>

    <input type="text" id="post_title" placeholder="enter post title"><br>

    <input type="radio" name="post_category" value="info" checked>info post
    <input type="radio" name="post_category" value="cynical"> cynical
    <input type="radio" name="post_category" value="news"> news<br>

    <textarea name="" id="post_content" class="edit_this" placeholder="enter your post here..."></textarea>

    <input type="text" id="post_image" placeholder="enter optional post image"><br>

    <button id="post_add">add post</button>

</div>

<div id="posts"></div>

<h2>Add new user</h2>

<div id="error_message"></div>


<!--includes AND runs the footer php-->
<?php include($_SESSION['fileserver'] . 'fragments/footer.php'); ?>
