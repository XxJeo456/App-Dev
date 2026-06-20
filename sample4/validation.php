<?php

    session_start();
    $captcha = $_SESSION['num1'] + $_SESSION['num2'];

    $error = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fullName = trim($_POST['fullName']);
        $userName = trim($_POST['userName']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(!preg_match("/^[a-zA-Z ]{3,50}$/", $fullName)){
            $error[] = "Only letters, white space allowed and it has to have the length of 3 or more letters.";
        }
        if(!preg_match("/^[a-zA-Z ]{5,15}$/", $userName)){
            $error[] = "User name must have the lenght of 5 upto 15 letters only.";
        } 
        if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)){
            $error[] = "Email must be a valid email address.";
        } 
        if(!preg_match("/^[a-zA-Z0-9!@#$%^&*()_+]{8,}$/", $password)){
            $error[] = "Password must have the length of 8 or more characters and it can contain letters, numbers and special characters.";
        }

        if(empty($error)){
            echo "<p>$fullName</p>";
            echo "<p>$userName</p>";
            echo "<p>$email</p>";
        } else {
            foreach($error as $err){
                echo "<p>$err</p>";
            }
        }

        if($_POST['captcha'] != $captcha){
            $error[] = "Captcha is incorrect.";
        } else {
            echo "<p>Captcha is correct.</p>";
        }
    }
?>