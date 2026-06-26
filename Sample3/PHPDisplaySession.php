<?php 
    session_start();
    if($_SESSION['logged']){
        echo "Welcome " .$_SESSION['name'];
        echo '<a href="PHPUnsetSession.php">'.$_SESSION['email'].'</a>';
        echo '<a href="PHPDeleteSession.php">Logout</a>';
    } else {
        echo '<a href="PHPSetSession.php">Login</a>';
    }

?>