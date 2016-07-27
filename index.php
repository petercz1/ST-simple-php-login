<?php 
    // tells php to load session variable cookie
    session_start();

// use if you want to run a php file
$_SESSION['fileserver'] = $_SERVER["DOCUMENT_ROOT"] . "/login_demo/";

// use if you want to link to external file eg css, js, img, favicon etc
// echo it back to the html
$_SESSION['webserver'] = "http://" . $_SERVER["SERVER_NAME"] . "/login_demo/";
?>

<?php include ($_SESSION['fileserver'] . 'fragments/header.php'); ?>

<h1>php full-stack demo with login</h1>

<h2>DO BEFORE DEPLOY!</h2>
<p>delete local folder path from fileserver and webserver session variables above</p>

<h2>fileserver/webserver paths - for development</h2>
<p>Fileserver:</p>
<p> <?php echo $_SESSION['fileserver']; ?> </p>
<p>Webserver:</p>
<p> <?php echo $_SESSION['webserver']; ?> </p>

<?php include ($_SESSION['fileserver'] . 'fragments/footer.php'); ?>

