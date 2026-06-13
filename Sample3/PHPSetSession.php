<?php 
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['name'] = "Mark";
    $_SESSION['email'] = "Mark@gmail.com";
    header('location: PHPDisplaySession.php');
?>