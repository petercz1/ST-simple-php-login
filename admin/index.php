<?php 
//copy this bit of php to all pages you want protected!!!
session_start();
if( !isset($_SESSION['user'])){
    header('LOCATION: ../index.php');
}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>admin stuff</title>
    
</head>

<body>
    <h1>Welcome super-cool peeps</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore error, iure. Nemo impedit in placeat et, vel ab vitae itaque corporis, culpa. Labore nemo provident asperiores eligendi aut harum dignissimos.</p>


</body>

</html>
